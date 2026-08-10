# Guia de desenvolvimento

Este guia apresenta instruções e o passo a passo dos processos utilizados no desenvolvimento deste projeto, além de orientações para sua manutenção, criação de novas versões e outras dicas úteis.

## Índice

- [Pré-requisitos e execução](#pré-requisitos-e-execução)
- [Atualizar Docker Image Version](#atualizar-docker-image-version)
- [Dicas de desenvolvimento](#dicas-de-desenvolvimento)
  - [Outros projetos](#outros-projetos)
  - [Encontrar problemas](#encontrar-problemas)
  - [Criando seu próprio projeto](#criando-seu-próprio-projeto)
  - [Criando tema](#criando-tema)
  - [Configurando o sistema](#configurando-o-sistema)
  - [Correções do sistema](#correções-do-sistema)
  - [Modificando o domínio](#modificando-o-domínio)

## Pré-requisitos e execução

Consultar o [README](./README.md).

## Atualizar Docker Image Version

A atualização do sistema é realizada utilizando as **tags** do [Mapas Culturais](https://github.com/mapasculturais/mapasculturais).

A cada nova atualização, o processo utilizado é:

1. Atualizar a versão no [Dockerfile](./docker/Dockerfile).
2. Comparar a tag anterior com a nova versão no GitHub.
3. Verificar se algum dos arquivos sobrescritos pelo nosso projeto foi alterado. Caso tenha sido, incorporar as modificações ao nosso arquivo, preservando as alterações específicas deste projeto.
4. Executar o sistema e realizar as verificações necessárias.

Esse processo é necessário porque alguns arquivos do sistema base são sobrescritos dentro do container. Caso essas alterações não sejam incorporadas às novas versões, podem ocorrer erros, inconsistências e outros problemas.

### To Do

Criar um script que verifique os arquivos alterados entre duas versões diferentes do sistema e identifique quais desses arquivos também existem no nosso projeto.

Como a sobrescrita dos arquivos é baseada em seus nomes, essa verificação pode ser realizada comparando os nomes dos arquivos alterados na nova versão com os arquivos existentes no projeto.

## Dicas de desenvolvimento

### Outros projetos

Há diversos outros projetos que implementam o Mapas Culturais e seus respectivos plugins. Recomenda-se ficar atento a outros projetos ativos, pois eles podem apresentar possíveis melhorias e exemplos de uso real que podem servir como referência.

Alguns exemplos:

- [mapas-ES](https://github.com/hacklabr/mapas-ES)
- [mapas-PA](https://github.com/hacklabr/mapas-PA)
- [mapas-PE](https://github.com/hacklabr/mapas-PE)

### Encontrar problemas

Como este é um projeto extenso, com diversos arquivos, às vezes encontrar a origem de um problema pode ser complicado. Uma possível estratégia é:

1. Encontrar o menor bloco de elementos da tela que engloba o problema.
2. Encontrar um elemento com diversas classes CSS nesse bloco.
3. Buscar a classe no projeto [Mapas Culturais](https://github.com/mapasculturais/mapasculturais).

Assim, é possível encontrar o trecho de código correspondente àquele elemento. A partir daí, basta analisar o código e entender os processos executados e os arquivos e funções chamados para encontrar a origem do problema.

## Criando seu próprio projeto

Para criar seu próprio projeto, basta copiar as pastas **db**, **docker** e **docker-data**, além dos arquivos `.sh` da raiz, criar seu próprio tema e aplicar as modificações necessárias nos arquivos de configuração, adicionando também os plugins desejados.

### Criando tema

1. Crie uma pasta com o nome do tema dentro da [pasta de temas](./themes/).
2. Configure o tema em [0.main.php](./docker/common/config.d/0.main.php).
3. Crie o arquivo **Theme.php** com o construtor do tema.
4. Adicione as imagens, fontes e ícones na pasta **assets**.
5. Adicione suas modificações SCSS na pasta **assets-src**, onde serão integradas ao SCSS já existente do sistema.

Em conjunto, analise os arquivos deste e de outros projetos, além do próprio [Mapas Culturais](https://github.com/mapasculturais/mapasculturais), para identificar a melhor forma de adicionar suas próprias modificações.

### Configurando o sistema

Na pasta [config.d](./docker/common/config.d) estão algumas das principais configurações do sistema.

- **0.main**: arquivo de configuração base do sistema.
- **plugins**: arquivo de configuração dos plugins utilizados e ativos no sistema.
- **texts**: arquivo de definição dos textos do sistema, utilizados principalmente na página inicial.
- **\***: arquivos de definição dos caminhos de imagens, ícones, arquivos etc.

O arquivo **docker/production/config.d/authentication** também é importante, pois configura os métodos e as variáveis utilizados para a autenticação do sistema em conjunto com o plugin **MultipleLocalAuth**.

Os demais arquivos normalmente podem ser copiados sem necessidade de alterações adicionais.

### Correções do sistema

Para implementar correções mais profundas, ou seja, alterações que não sejam apenas questões de estilização, pode ser necessário sobrescrever arquivos internos do sistema.

Nesse caso:

1. Identifique a pasta correspondente ao arquivo que será sobrescrito, como **modules**, **core**, etc.
2. Adicione ao projeto o arquivo com o mesmo caminho e nome do arquivo original.
3. Adicione a instrução correspondente ao [Dockerfile](./docker/Dockerfile) para copiar o arquivo para dentro da imagem, sobrescrevendo o arquivo original e adicionando a correção.

### Modificando o domínio

Para adaptar o sistema ao domínio de inovação, foi necessário adicionar:

- A pasta [conf](./conf/), que agrupa as configurações de taxonomia e opções de valores para as entidades do sistema, alterando, por exemplo, "Agente Coletivo" para "Pessoa Jurídica".
- Arquivos sobrescritos na pasta **modules** para alterar textos e comportamentos relacionados ao domínio cultural.
- Traduções que, na prática, substituem textos do domínio cultural por textos adequados ao domínio de inovação.

## Notas do README antigo (a serem validadas)

### psysh

Este ambiente roda com o built-in web server do PHP, o que possibilita que seja utilizado o [PsySH](https://psysh.org/), um console interativo para debug e desenvolvimento.

no lugar desejado, adicione a linha `eval(\psy\sh());` e você obterá um console. `Ctrl + D` para continuar a execução do código.

### Usuário super administrador da rede

O banco de dados inicial inclui um usuário de role `saasSuperAdmin` de **id** `1` e **email** `Admin@local`.
Este usuário possui permissão de criar, modificar e deletar qualquer objeto do banco.

- **email**: `Admin@local`
- **senha**: `mapas123`
