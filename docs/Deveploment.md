# Desenvolvimento

## Preparando ambiente

- Copie o aquivo `src/.env.example` para `src/.env`

- Altere as variáveis de ambiente conforme necessário

- Execute o comando `docker-compose up -d --build app`

- O app estará disponível em http://localhost

- Havera um erro pois a pasta `vendor` nao existe, execute o comando `docker-compose run --rm composer install`

- Pronto!!!
