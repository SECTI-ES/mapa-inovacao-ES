#!/bin/bash
# Habilita modo verbose (mostra os comandos) e exit-on-error
# set -x
set -e

# ==============================================================================
# 1. BLOCO DE ESPERA DO BANCO DE DADOS (CRÍTICO)
# ==============================================================================
# Ajuste as variáveis abaixo conforme seu .env (DB_HOST, DB_USER, etc)
echo "🐘 [Mapas] Aguardando conexão com o Banco de Dados..."

# Usamos um one-liner PHP para testar a conexão real, pois é mais confiável que netcat/ping
# Loop de até 60 segundos
for i in {1..30}; do
    if php -r "try { new PDO('pgsql:host=${DB_HOST:-db};dbname=${DB_NAME:-mapas}', '${DB_USER:-mapas}', '${DB_PASS:-mapas}'); echo 'OK'; } catch (PDOException \$e) { exit(1); }" > /dev/null 2>&1; then
        echo "✅ [Mapas] Banco de Dados conectado com sucesso!"
        break
    fi
    echo "⏳ [Mapas] Banco indisponível. Tentando novamente em 2s..."
    sleep 2
done

# ==============================================================================
# 2. CONFIGURAÇÃO DE DIRETÓRIOS E PERMISSÕES
# ==============================================================================
echo "📂 [Mapas] Configurando permissões de diretórios..."
mkdir -p /var/www/var/DoctrineProxies /var/www/var/logs
mkdir -p /var/www/public/entity-table-columns

# Garante que o arquivo existe antes de mudar permissão
touch /var/www/var/logs/app.log
chown -R www-data:www-data /var/www/var/DoctrineProxies/ /var/www/var/logs/

# Criar estrutura de diretórios necessária
mkdir -p /var/www/public/files/distributionslog
mkdir -p /var/www/var/private-files
# mkdir -p /var/www/private-files

# Ajustar permissões
chown -R www-data:www-data /var/www/public/
chown -R www-data:www-data /var/www/var/private-files/
chown -R www-data:www-data /var/www/var/sessions/
chown -R www-data:www-data /var/www/src/themes/
chmod -R 775 /var/www/public/entity-table-columns

# Permissões padrão para diretórios (755) e arquivos (644)
find /var/www/public -type d -exec chmod 755 {} \;
find /var/www/public -type f -exec chmod 644 {} \;

# ==============================================================================
# 3. ATUALIZAÇÕES DE BANCO E SCHEMA
# ==============================================================================
echo "🔄 [Mapas] Executando scripts de atualização de banco..."

# Dica: Adicione "|| true" se você quiser que o container suba mesmo se o update falhar
sudo -E -u www-data /var/www/scripts/db-update.sh
sudo -E -u www-data /var/www/scripts/mc-db-updates.sh

# ==============================================================================
# 4. COMPILAÇÃO
# ==============================================================================
echo "⚙️ [Mapas] Compilando SASS e Proxies..."
sudo -E -u www-data /var/www/scripts/compile-sass.sh
sudo -E -u www-data /var/www/src/tools/doctrine orm:generate-proxies

# Verifica se a pasta destino existe antes de copiar
mkdir -p /var/www/var/private-files/
cp /var/www/version.txt /var/www/var/private-files/deployment-version


echo "⚙️ [Mapas] Atualizando e instalando libs composer..."
sh /var/www/composer.sh

echo "⚙️ [Mapas] Compilando PNPM..."
chown -R www-data:www-data /var/www/public/assets/

cd /var/www/src

pnpm store prune
pnpm install --recursive

if [ "$APP_MODE" = "production" ]; then
    echo "🚀 [Mapas] APP_MODE=production detectado. Compilando para produção..."
    pnpm run build
else
    echo "⚡ [Mapas] APP_MODE=development detectado. Compilando para desenvolvimento..."
    pnpm run dev
fi
cd / # Volta para raiz para segurança

# ==============================================================================
# 5. CRONS E PROCESSO PRINCIPAL
# ==============================================================================
echo "⏰ [Mapas] Inicializando CRONs..."

sudo -E -u www-data /jobs-cron.sh > /proc/1/fd/1 2>&1 &
sudo -E -u www-data /recreate-pending-pcache-cron.sh > /proc/1/fd/1 2>&1 &

touch /mapas-ready

echo "🚀 [Mapas] Iniciando processo principal..."
exec "$@"