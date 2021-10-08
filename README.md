# Boilerplate-Laravel

[![PyPi license](https://badgen.net/pypi/license/pip/)](https://pypi.com/project/pip/)
Boilerplate para se usado em projetos laravel simples, um modo facil e rapido de comecar seus projetos laravel sem a necessidade de instalar suas dependencias na sua maquina, ou configurar servidores e programas.

- Requisitos
  - [Docker](https://www.docker.com/products/docker-desktop)
- Requisitos Opcionais
  - [yarn](https://classic.yarnpkg.com/lang/en/docs/install/#mac-stable) ou npm

## Iniciando o projeto

Para iniciar o projeto tenha certeza de que voce tem o docker instalado, se estiver usando windows o wsl2 tabem se torna obrigatorio uma vez que o docker necessita dele.

_todos os comandos utilizados estarao no package.json caso queira um atalho usando o yarn_

Abra o terminal na pasta onde este repositorio foi clonado e construa apenas o primeiro container contendo o servidor web nginx, para isso rode o seguinte comando `docker-compose up -d --build app`.
Abra o terminal na pasta onde este repositorio foi clonado e construa apenas o primeiro container contendo o servidor web nginx, o php e banco postgres, para isso rode o seguinte comando `docker-compose up -d --build app`.

Entre na pasta `src` e apague o arquivo `README.md`, mova seu projeto laravel para esta pasta ou crie um novo com o comando `docker-compose run --rm composer create-project laravel/laravel .`

Construindo apenas o primeiro container `app` ao inves de apenas usar `docker-compose up -d` faz com que os outros containers nao sejam construidos, pois nao serao necessarios ha todo momento.
Os container terao as seguintes portas expostas:

- nginx: `:80`
- posgres: `:5432`
- npm: `:3000` e `:3001`

  Caso voce ja tenha os aquivos do projeto e nao tenha as dependencias instaladas o seguinte erro pode ocorrer

  `Warning: require(/var/www/html/public/../vendor/autoload.php): Failed to open stream: No such file or directory in /var/www/html/public/index.php on line 34`

  para corrigir isso faca o download das depencias com o comando:

- `docker-compose run --rm composer update`
  para rodar o script de desenvolvimento do `npm` utilize o seguinte comando:
- `docker-compose run --rm npm run dev`
  para criar migrations:
- `docker-compose run --rm artisan migrate`

## Problemas com permissoes

Caso tenha problemas compermissoes siga o seguinte procedimento:

- remova os containers com o comando `docker-compose down`
- no arquivo `.env` modigique os valores para que o usuario e o grupo sejam os mesmos do proprietario da pasta `src`
- suba container denovo: `docker-compose build --no-cache`

## Hot Reload

Caso queira usar o hotreload do webpack adicione a seguinte configuracao no aquivo `webpack.mix.js`:
`.browserSync({ proxy: 'nginx', open: false, port: 3000, });`
no terminal inicie o watch-mode do npm com o seguinte comando:
`docker-compose run --rm --service-ports npm run watch`
