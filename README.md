
# Setup Project




Clone the project

```bash
  git clone https://github.com/BagusFary/LaravelBioskopNew
```

Go to the project directory copy .env.example to your local .env

```bash
  cd LaravelBioskopNew 
```
Copy .env.example to your local .env

```bash
  cp .env.example .env 
```
Install dependencies

```bash
  composer install
```
Generate application encryption key

```bash
  php artisan key:generate
```
Migrate database

```bash
  php artisan migrate
```
Storage Link

```bash
  php artisan storage:link
```
Seed database

```bash
  php artisan db:seed
```

Start the server

```bash
  php artisan serve
```

