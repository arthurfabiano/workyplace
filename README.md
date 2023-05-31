# Setup para o projeto teste Win.ai

### Passo a passo

Informativo sobre
```sh
Na pasta doc dentro do projeto possui um arquivo do postman onde poderá importar para fazer uso da API. 
Nome: Wins.ai.postman_collection.json
```

Clone Repositório
```sh
git clone https://github.com/arthurmasterdevelop/winx.git
```

Entre na pasta do projeto
```sh
cd winx/
```

Crie o arquivo .env
```sh
.env
```

Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME="Winai"
APP_URL=http://localhost:8989

DB_HOST=host
DB_PORT=3306
DB_DATABASE=name_banco
DB_USERNAME=user_banco
DB_PASSWORD=password_banco

CACHE_DRIVER=redis
QUEUE_CONNECTION=database
SESSION_DRIVER=redis

REDIS_HOST=redis

MAIL_MAILER=smtp
MAIL_HOST=host_mail
MAIL_PORT=port
MAIL_USERNAME=user
MAIL_PASSWORD=password
MAIL_ENCRYPTION=encryption
```

Instalar as dependências do projeto
```sh
Composer install
```

Suba os containers do projeto
```sh
Docker compose up -d
```

Acessar o container
```sh
Docker compose exec app bash
```

Rode o comando para gerar a KEY do laravel
```sh
Php artisan key:generate
```

Rode as migrations
```sh
Php artisan migrate —seed
```

Na pasta do projeto rode
```sh
npm install
npm run dev
```

Acessar o projeto
[http://localhost:8989](http://localhost:8989)
