> An example app using Laravel 9, InertiaJS and spatie/laravel-permissions

## Install and setup

- Before running the commands, copy the `.env.example` file to `.env` and change the database settings

```bash
$ composer install
$ npm install
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed --class=PermissionSeeder
```

## Accounts
Admin:
```
username: admin@example.com
password: password 
```
Manager:
```
username: manager@example.com
password: password 
```
Member:
```
username: member@example.com
password: password 
```

## License

Copyright (c) 2022 Jason Napolitano

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit
persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
