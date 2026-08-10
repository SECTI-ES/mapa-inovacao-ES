# Mapa de Inovação do Espírito Santo

Repositório do Mapa de Inovação do Espírito Santo.

Este projeto se baseia no projeto do Mapa Cultural, porém, além das modificações esperadas de estilização, há também modificações referentes ao domínio e escopo do projeto, atendendo agora a programas, eventos e outras iniciativas relacionados a inovação no estado do Espírito Santo.

A pasta **modules** é um dos maiores diferenciais deste projeto em comparação com os demais que utilizam a imagem docker do [mapasculturais](https://github.com/mapasculturais/mapasculturais) como base. Ela sobrescreve arquivos com o mesmo nome no sistema base para realizar pequenas correções e/ou adequações ao domínio específico deste projeto.

## Índice

- [Estrutura do repositório](#estrutura-do-repositório)
- [Executar](#executar)
  - [Pré-requisitos](#pré-requisitos)
  - [Comandos](#comandos)
  - [Script](#script)
- [Contribuição](#contribuição)
- [Licença](#licença)

## Estrutura do repositório

- **.vscode**
  - **settings.json**: arquivo com configurações básicas da IDE VSCode

- **conf**
  - **csv**: pasta com arquivos csv que armazenam áreas de atuação de ocupação definidas pelo governo federal
  - **\*-types e taxonomies**: arquivos de definição/configuração dos tipos das entidades, necessários devido à mudança de domínio do sistema

- **db**
  - **dump**: arquivo de dump sql padrão

- **docker**
  - **common** - arquivos comuns dos ambientes de desenvolvimento e produção
  - **local** - arquivos exclusivamente para o ambiente local de desenvolvimento
  - **production** - arquivos exclusivamente para o ambiente de produção

- **docker-data**
  - **certbot** - arquivo de configuração do certbot
  - **nginx** - arquivo de configuração do nginx

- **em-breve**
  - **\*** - arquivos usados para indicar que o site está em manutenção

- **modules**
  - **\*** - arquivos a serem sobrescritos para ajustar o sistema ao novo domínio e/ou corrigir erros do sistema base. Alguns apenas atualizam os nomes das entidades no novo domínio, outros corrigem links do breadcrumb, etc

- **plugins** - pasta com os plugins desenvolvidos para o sistema

- **themes** - pasta com o tema desenvolvido exclusivamente para este projeto
  - **MapaInovacao** - tema deste projeto. Função principal de armazenar as imagens e modificações de estilização

- **translations**
  - **replacements** - arquivo com pseudo traduções, servem para trocar palavras do domínio cultural e trocar para o domínio de inovação (Ex. Agente Individual -> Pessoa Física)

- **mapasculturais.sample.env** - arquivo de exemplo com variáveis de ambiente

As pastas **conf**, **modules** e **translations** possuem a função de modificação do domínio do sistema (além de pequenas correções), as demais pastas e arquivos são padrão na implementação do mapasculturais.

## Executar

> Guia pensado para executar no Ubuntu 24.04

### Pré-requisitos

> Projeto desenvolvido majoritariamente no Ubuntu.

| Ferramenta     | Versão |
| -------------- | ------ |
| Docker         | 29.6.2 |
| Docker Compose | 5.3.1  |

### Comandos

```bash
git clone https://github.com/SECTI-ES/mapas-ES
cd mapas-ES
```

```bash
chmod +x ./docker/local/menu.sh
```

### Script

Com todos os pré-requisitos configurados, utilize o bash script [menu.sh](./docker/local/menu.sh):

```bash
./docker/local/menu.sh
```

> Pode ser necessário utilizar sudo devido aos volumes docker e permissões do docker, caso seu usuário não esteja no grupo docker.

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

Você pode acessar o sistema em: [http://localhost:80](http://localhost:80)

## Contribuição

### Equipe

- **[David Propato](https://github.com/Propato)**
- **[Salim Suhet](https://github.com/salimsuhet)**

### Antigos colaboradores

- **[Pedro Henrique](https://github.com/PhenBD)**

## Licença

- Consulte o arquivo [LICENSE](./LICENSE) na raiz do projeto para termos de licença.
