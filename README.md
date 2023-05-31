# Setup para o projeto teste Win.ai

### Passo a passo

Clone Repositório
```sh
git clone https://github.com/arthurfabiano/workyplace.git
```

Entre na pasta do projeto
```sh
cd workyplace/
```

Checkout branch DEV
```sh
git checkout dev
```

Crie o arquivo .env
```sh
.env
```

Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME="Worky place"
APP_URL=http://localhost

DB_HOST=host
DB_PORT=3306
DB_DATABASE=workyplace
DB_USERNAME=sail
DB_PASSWORD=password

CACHE_DRIVER=redis
QUEUE_CONNECTION=database
SESSION_DRIVER=redis

REDIS_HOST=redis

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="contato@workyplace.com"
MAIL_FROM_NAME="${APP_NAME}"
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
./vendor/bin/sail artisan key:generate
```

Rode as migrations
```sh
./vendor/bin/sail artisan migrate 
```

Incializar a fila (Deixe o terminal aberto)
```sh
./vendor/bin/sail artisan queue:work database --queue=high,default
```

Acessar o projeto
[http://localhost](http://localhost)

Acessar servidor de email
[http://localhost:8025](http://localhost:8025)
