# Desenvolvimento

## Preparando ambiente

- Copie o aquivo `src/.env.example` para `src/.env`

- Altere as variáveis de ambiente conforme necessário

- Execute o comando `docker-compose up -d --build app`

- O app estará disponível em http://localhost

- Havera um erro pois a pasta `vendor` nao existe, execute o comando `docker-compose run --rm composer install`

- Pronto!!!

# Autenticação

Agora com o sistema de autenticação funcionando, caso você não tenha uma chave privada, execute o comando `docker-compose run --rm artisan key:generate` para gerar uma no seu `.env`

# HotReload

Caso queira utilizar o recurso BrowserSync do mix para que ao alterar um arquivo, o mesmo seja atualizado automaticamente no navegador, sertifique-se que as dependencias node estao instaladas e execute o comando `docker-compose run --rm --service-ports npm run watch`, o servidor estará disponível em http://localhost:3000

- instalar dependencias node `docker-compose run --rm node install`

`docker-compose run --rm`
