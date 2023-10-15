DKNC-IS Running and Testing the Website

Prerequisites
- XAMPP with Apache and MySQL installed.
- Composer installed.

Cloning the App
1. Run git clone DKNC-IS
2. Open XAMPP and run Apache and MySQL
3. Run composer install
4. Run cp .env.example .env
5. Run php artisan key:generate
6. php artisan storage:link
7. Run php artisan migrate
8. Run php artisan db:seed
9. Run php artisan serve
10. Go to link localhost:8000

Test Email Functionality using Mailtrap
1. Register and log in to Mailtrap.
2. In Mailtrap, go to Home -> Start testing -> Integrations.
3. Choose Laravel 9+ from the available options.
4. Configure your .env file using the provided values. For example:
    MAIL_MAILER=smtp
    MAIL_HOST=sandbox.smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=YOUR_MAILTRAP_USERNAME
    MAIL_PASSWORD=YOUR_MAILTRAP_PASSWORD

