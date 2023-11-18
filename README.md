<img src="public/images/logo-ecommerce.png" alt="store logo" align="right" height="80" >

# Online store

:star: This is a small challenge, which consists of implementing an online store with the described requirements.

## Table of content
- [Requirements](#requirement)
- [Project setup](#project-setup)

## Requirement
- [PHP 7.3 | 8.0](https://www.php.net/downloads.php)
- [NodeJs 20](https://nodejs.org/en/download)
- [MySql 8.0](https://dev.mysql.com/downloads/installer/)

## Project setup
Next we clone and configure the project for Laravel in version 8.:fire:
###### 1. Clone the repository
```bash
git clone <repository_url>
```
###### 2. Navigate to directory
```bash
cd <project-directory>
```
###### 3. Install composer dependecies
```bash
composer install
```
###### 4. Create an environment file
```bash
cp .env.example .env
```
###### 5. Generate an application key
```bash
php artisan key:generate
```
###### 6. Configure database environment variables
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
Replace <your_database_name> with your database name, <your_username> and <your_password> with your mysql credentials.

###### 7. Configure your smtp environment variables
```php
MAIL_MAILER=smtp
MAIL_HOST=your_mail_host
MAIL_PORT=your_mail_port
MAIL_USERNAME=your_mail_username
MAIL_PASSWORD=your_mail_password
MAIL_ENCRYPTION=your_mail_encryption
```
Remember to replace these environment variables with your email server configuration. For your testing environment I recommend using [Mailtrap](https://mailtrap.io/).

###### 8. Set your `Mercado Pago` environment variables
```php
MP_PUBLIC_KEY=your_public_key
MP_ACCESS_TOKEN=your_access_token
```
To obtain these credentials, follow these steps:
1. Create account in Mercado pago
Visit the [Mercado Pago](https://www.mercadopago.com/) website and click `Create account` and follow in steps to register your data.
2. Create an application
Access the developer panel, click on your integrations and inside click on `Create application`, complete the information required for your application.
3. Get development credentials
Inside the created application, in the dashboard, find the `Credentials` section and get your access token for the sandbox environment.

Ready!:smile: Now you have the necessary credentials to start integrating Mercado Pago.


###### 9. Create a storage link
Being in the root of the project, enter the following commands to go into the storage directory and create the nesessary folders.
```bash
cd storage/app/public
```
```bash
mkdir images && cd images
```
```bash
mkdir logos products profiles
```
Great!:blush: now run the following command to create the storage link.
```bash
php artisan storage:link
```

## Project execution

###### 1. Run the migrations and seeders

```bash
php artisan migrate:fresh --seed
```

###### 2. Install NPM dependencies:
```bash
npm install
```

###### 3. Start the Laravel development server

```shell
php artisan serve
```

Congratulations!!:star2: :rocket: Now all you have to do is your web browser and visit `http://localhost:8000` to view the application.
