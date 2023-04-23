## Banko

This is a web application for banking management built using the Laravel framework. It provides a platform for managing bank accounts, transactions, and customer information.

## Installation
To install the application, follow these steps:

1. Clone the repository
```bash
git clone https://github.com/thekontinet/the-bank-project.git
```

2. Install dependencies using Composer:
```bash
composer install
```

3. Rename `.env.example` to `.env` and fill the required parameters listed below:
```env
APP_NAME=
APP_CONTACT_ADDRESS=
APP_PHONE=
APP_EMAIL=

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=

# cryptocompare.com api key
CRYPTO_API_KEY=

# tidio livechat url
LIVE_CHAT_URL=
```

4. Run migrations to create the database schema:
```bash
php artisan migrate --seed
```

5. Generate App Key
```bash
php artisan key:generate
```

6. Start the server
```bash
php artisan serve
```

## Features
This application has the following features:

- User authentication and authorization
- User Blocking
- Forgot Password
- Crypto Deposit, Domestic and Wire Transfer
- Account management
- Joint Account System
- Transaction history
- Generate Random Transaction
- Captcha Check
- Google Translator
- Multiple Currencies
- KYC Verification
- Transaction Token Verification
- Mailing
- Multi Frontpage Design Feature

## Usage
To use the application, follow these steps:

- Login with email: admin@email.com, password: password
- Click on admin panel button on the dashboard
- Click on the wallet menu in the admin dashboar
- Add a crypto wallet
- You're good to go

You can always change your email and password in the admin section

## Credits
This application was built by thekontinet.

## License
This application is licensed under the MIT License.
