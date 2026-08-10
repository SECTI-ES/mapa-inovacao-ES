# Guia de desenvolvimento

Este guia serve para os desenvolvedores entenderem os processos utilizados no desenvolvimentos deste projeto, como continuarem e, também, como fazerem suas próprias versões e dicas auxiliares.

## Pré-Requisitos e Execução

Consultar <a href="./README.md">README</a>.

## Atualizar Docker Image Version

A atualização é por TAGs do mapasculturais, desenvolvido no repo <a href="https://github.com/mapasculturais/mapasculturais">mapasculturais</a>.

A cada nova atualização, o processo utilizado é:

1. Atualizar a versão do <a href="./docker/Dockerfile">Dockerfile</a>.
2. Comparar a TAG anterior com a atualizada no github.
3. Verificar se algum dos arquivos que é sobrescrito no nosso projeto foi alterado, se sim: Incorporar a modificação no nosso arquivo mantendo a nossa modificação.
4. Rodar o sistema e fazer as verificações necessárias.

Este processo é necessário pois como sobrescrevemos alguns arquivos do sistema base dentro do container, se não os atualizarmos com as novas alterações, eles podem apresentar erros, inconsistências e outros problemas.

### To Do

Criar um script que verifica os arquivos alterados entre duas versões diferentes do sistema e analisa se esses arquivos existem no nosso projeto ou não (pois como a sobrescrita dos arquivos é baseada no nome deles, e'possível verificar isso apenas verificando os nomes).

## Dicas de desenvolvimento

### Outros projetos

Há diversos outros projetos que implementam o mapasculturais e seus diversos plugins. Assim, recomenda-se sempre ficar atento há outros projetos ativos pois podemos encontrar possíveis melhorias e exemplos de uso real para nos basearmos. Exemplo de projetos:

- <a href="https://github.com/hacklabr/mapas-ES">mapas-ES</a>
- <a href="https://github.com/hacklabr/mapas-PA">mapas-PA</a>
- <a href="https://github.com/hacklabr/mapas-PE">mapas-PE</a>

### Encontrar problemas

Como este é um projeto extenso com diversos arquivos, as vezes encontrar a origem de um problema pode ser complicado, assim, uma possível estratégia é:

1. Encontrar o menor bloco de elementos da tela que engloba o problema.
2. Encontrar um elemento com diversas classe css nesse bloco.
3. Buscar a classe no projeto mapasculturais.

Assim, você encontrou o trecho de código correspondente aquele trecho, agora basta analisar o código e entender os processos executados e arquivos/funções chamadas para, assim, encontrar a origem do problema.

## Criando seu próprio projeto

Para criar seu próprio projeto, basta copiar as pastas **db**, **docker**, **docker-data**, os arquivos **sh** da raiz e criar o seu próprio tema, aplicando as modificações necessárias nos arquivos de configuração e adicionando os plugins que se deseja utilizar.

### Criando tema

1. Crie uma pasta com o nome do tema dentro de da <a href="./themes/">pasta de temas</a>
2. Configure o tema em <a href="./docker/common/config.d/0.main.php">0.main.php</a>
3. Crie o arquivo **Theme.php** com o constructor do tema.
4. Adicione as imagens, fontes e icones na pasta assets.
5. Adicione suas modificações scss na pasta assets-src, onde eles serão integrados ao scss já existente do sistema.

Em conjunto, analise os arquivos desse e de outros projetos, além do próprio mapascultuais para identificar a melhor forma de adicionar suas próprias modificações.

### Configurando o sistema

Na pasta <a href="./docker/common/config.d">config.d</a> é possível encontrar as principais configurações do sistema.

- **0.main**: arquivo de configuração base do sistema
- **plugins**: arquivo de configuração dos plugins utilizados e ativos do sistema
- **texts**: arquivo de definição dos textos do sistema, utilizados principalmente para a home.
- **\***: arquivos de definição dos caminhos de imagens, ícones, arquivos e etc.

O arquivo **docker/production/config.d/authentication** também é importante pois serve para configurar os métodos e as variáveis para a autenticação do sistema em conjunto com o plugin MultipleLocalAuth.

Os demais arquivos podem ser copiados da forma que estão que não terá implicações negativas.

### Correções do sistema

Para implementar correções mais profundas (ou seja, que não são questões apenas de estilização) pode ser necessário fazer alterações nos arquivos internos do sistema, assim:

1. Crie a pasta correspondente ao arquivo com a solução: modules, core, etc.
2. Adicione o arquivo com o nome correspondente.
3. Adicione a linha no Dockerfile que copiará a pasta para dentro da imagem e, assim, sobrescrevendo o arquivo original e adicionando a correção.

### Modificando o domínio

Para alterar o domínio do sistema, foi necessário adicionar:

- Pasta <a href="./conf/">conf</a>, que agrupa as configurações de taxonomia e opções de valores para as entidades do sistema, alterando de "Agente Coletivo" para "Pessoa Jurídica", por exemplo.
- Sobrescrever arquivos na pasta **modules** para alterar linhas com textos no domínio cultural.
- Adicionar traduções que, na realidade, apenas trocam textos em português no domínio cultural para textos no domínio de inovação.

## Notas do README antigo (a serem validadas)

### psysh

Este ambiente roda com o built-in web server do PHP, o que possibilita que seja utilizado o [PsySH](https://psysh.org/), um console interativo para debug e desenvolvimento.

no lugar desejado, adicione a linha `eval(\psy\sh());` e você obterá um console. `Ctrl + D` para continuar a execução do código.

### Usuário super administrador da rede

O banco de dados inicial inclui um usuário de role `saasSuperAdmin` de **id** `1` e **email** `Admin@local`.
Este usuário possui permissão de criar, modificar e deletar qualquer objeto do banco.

- **email**: `Admin@local`
- **senha**: `mapas123`
