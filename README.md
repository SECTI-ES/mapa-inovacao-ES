# Mapa de Inovação do Espírito Santo

Repositório do Mapa de Inovação do Espírito Santo.

Este projeto de baseia no projeto do Mapa Cultural, porém, além das modificações esperadas de estilização, há também modificações refentes ao domínio e escopo do projeto, atendendo agora há programas, eventos e etc relacionados a inovação no estado do Espírito Santo.

A pasta **modules** é um dos maiores diferenciais deste projetos em comparação com os demais que utilizam a imagem docker do <a href="https://github.com/mapasculturais/mapasculturais">mapasculturais</a> como base. Ele sobrescreve os arquivos com o mesmo nome no sistema base para realizar pequenas correções e/ou adequações ao domínio específico deste projeto.

## Estrutura de arquivos

- **.vscode**
  - **settings.json**: arquivo com configurações básicas da IDE VSCode.

- **conf**
  - **csv**: pasta com arquivos csv que armazenam areas de atuação de ocupação definidas pelo governo federal.
  - **\*-types e taxonomies**: arquivos de definição/configuração dos tipos das entidades, necessário devido mudança de domínio do sistema.

- **db**
  - **dump**: arquivo de dump sql padrão.

- **docker**
  - **common** - arquivos comuns dos ambientes de desenvolvimento e produção
  - **local** - arquivos exclusivamente para o ambiente local de desenvolvimento
  - **production** - arquivos exclusivamente para o ambiente de produção

- **docker-data**
  - **certbot** - arquivo de configuração do certbot
  - **nginx** - arquivo de configuração do nginx

- **em-breve**
  - **\*** - arquivos usados para indicar que o site esta em manutenção

- **modules**
  - **\*** - arquivos a serem sobrescritos para ajustar o sistema ao novo domínio e/ou corrigir erros do sistema base. Alguns apenas atualizam os nomes das entidades no novo domínio, outros corrigem links do breadcrumb, etc.

- **plugins** - pasta com os plugins desenvolvidos para o sistema

- **themes** - pasta com o tema desenvolvido exclusivamente para este projeto
  - **MapaInovacao** - tema deste projeto. Função principal de armazenar as imagens e modificações de estilização.

- **Translations**
  - **replacements** - arquivo com pseudo traduções, servem para trocar palavras do domínio cultural e trocar para o domínio de inovação (Ex. Agente Individual -> Pessoa Física)

As pastas **conf**, **modules** e **translations** possuem a função de modificação do domínio do sistema (além de pequenas correções), as demais pastas e arquivos são padrão na implementação do mapasculturais.

## Guia rápido para rodar o projeto localmente

> > Guia pensado para executar no Ubuntu 24.04

### Pré-requisitos

> > Projeto desenvolvido majoritariamente no Ubuntu.

| Ferramenta     | Versão |
| -------------- | ------ |
| Docker         | 29.6.2 |
| Docker Compose | 5.3.1  |

### Script

Com todos os pré-requisitos configurados, utilize o script sh <a href="./docker/local/menu.sh">menu.sh</a>:

```bash
sudo ./docker/local/menu.sh
```

> > Recomenda-se o sudo caso seu usuário não esteja no grupo docker e para facilitar a construção e utilização dos volumes.

Assim, será aberto um menu com as opções:

1. `Start Ambiente Local`
2. `Build Ambiente Local`
3. `Exibir Logs`
4. `Acessar Container`
5. `Parar Containers`
6. `Apagar Containers`
7. `Apagar Ambiente Local`
8. `Sair`

Basta selecionar a opção desejada e ela será executada.

Você pode acessar o sistema em: <a href="http://localhost:80">localhost</a>
