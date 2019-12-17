This is a knowledge base project that allows you to categorize your articles together. This was built with <a href="https://laravel.com/docs/5.8/installation" target="_blank">laravel 6</a> and PHP version 7.2, you must have these installed along with  <a href="https://www.mamp.info/en/downloads/" target="_blank">MAMP installed</a>

1. Clone the project
```html
git clone https://github.com/marcmaccaferri/knowledge-base.git
```
2. Install all dependencies 
```html 
npm install
composer install
```
5.  Open MAMP
6.  Go to MAMP prefrences 
7.  Select Ports
8.  Change MySQL port to ```8889```
9.  On Mac download and install <a href="https://www.sequelpro.com" target="_blank">Sequal Pro</a>
    On PC download and install <a href="https://www.heidisql.com/download.php" target="_blank">HeidiSQL</a>
10. Connect by using: 
    ```html
    Host: 127.0.0.1
    Username: root
    Password: root
    Port: 8889
    ```
11. Create a new database titled ```knowledge_base```
12. Make a copy of <a href="https://github.com/laravel/laravel/blob/master/.env.example" target="_blank">.env.example</a> and rename it to .env in the root of the directory. 
13. Change the following information in .env:
    ```html
    DB_CONNECTION=mysql
    DB_PORT=8889
    DB_USER=root
    DB_PASSWORD=root
    DB_DATABASE=knowledge_base
    ```
14. Generate key
```html
php artisan key:generate
```
15. Setup tables in the database
```html
php artisan migrate
```
16. Serve the app
```html 
php artisan serve
```


# Using the App:
To start using the app you must first create an administrative user, this currently has to be done manually in the database. Create a user with a role of ```1```. Once you visit the homepage of the app you will see where you can manage articles, categories, and users. To create your first article you must first create a sub category. 

## Creating A Category:
Create a name for your category and click add. To create a sub category you follow the same steps but select a parent category. Once you have a sub category created you can create your first article. Once new sub categories are created, and have an article assigned to them, they will appear with the articles on the homepage.

## Creating An Article: 
You must have a title, and a body for your article, along with a sub category. As of now this can only be text, functionality for adding photos will be added later. 








<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
