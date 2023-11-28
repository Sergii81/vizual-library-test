- laravel 10.10
- php 8.1
- mysql

## Installation

- git clone https://github.com/Sergii81/vizual-library-test.git
- cd vizual-library-test
- composer install
- set db credentials in .env
    - DB_CONNECTION=mysql
    - DB_HOST=host
    - DB_PORT=3306
    - DB_DATABASE=db_base_name
    - DB_USERNAME=db_user_name
    - DB_PASSWORD=db_password
- php artisan migrate
- php artisan db:seed
- for local installation

  - php artisan serv
  - api url http://127.0.0.1:8000/api/v1/
  - api documentation url http://127.0.0.1:8000/api/documentation

## How to use
1. Login in api 
- POST http://127.0.0.1:8000/api/v1/login

       {
            "email" : "pablisher1@example.com",
            "password" : "password"
       }
    - response

          {
              "status": true,
              "message": "User Logged In Successfully",
              "token": "1|CdFUyTDmUkUvX2sHyhVP1CBMacse12cgsGUoSVpY7e7ff088"
          }

2. Set Authorization

            Authorization: Bearer 1|CdFUyTDmUkUvX2sHyhVP1CBMacse12cgsGUoSVpY7e7ff088


