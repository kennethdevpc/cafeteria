<p align='left'>
    <img src='https://raw.githubusercontent.com/kenpulicorre/countries_proyect/main/client/src/images/bandera.gif' </img>
</p>

# Projecto Laravel E-commerce, Cafeteria

## Objetivos del Proyecto

-   Construir una App utlizando Larave,Node y su Blade.
-   Debe utilizar programación orientada a objetos (Clases).
-   Es obligatorio utilizar los cinco tipos de campos (Text, Textarea, Select, Radio,
    Checkbox).
-   Validar datos de entrada con JavaScript en el cliente y con php en el servidor.
-   Manejar mensajes de error y confirmación cuando se crea, modifica o elimina un
    registro.
-   Controlar errores en tiempo de ejecución.

## Descripcion complementaria
se necesita para una cafetería una plataforma de gestion de producto, que permita
almacenar y gestionar el inventario de sus productos. Este software debe permitir:
- la creación de productos,
- la edición de los productos,
- la eliminación de productos
- listar todos los productos registrados en el sistema.

Los datos que debe tener cada producto son:

- ID
- Nombre de producto: OBLIGATORIO
- Referencia: OBLIGATORIO
- Precio: ENTERO OBLIGATORIO
- Peso: ENTERO: OBLIGATORIO
- Categoría: OBLIGATORIO
- Stock, (Cantidad del producto en bodega) ENTERO: OBLIGATORIO
- Fecha de creación: date OBLIGATORIO

Adicionalmente se debe contar con un módulo que permita realizar la venta de un producto, el cual recibirá el
id del producto como parámetro y la cantidad del producto vendido. El software debe actualizará el campo de
stock restando la cantidad del producto vendido y registrar en una tabla la venta realizada (si el producto no
cuenta con stock mayor a cero debe mostrar un mensaje informando que no es posible realizar la venta).

Para finalizar se deben realizar 2 consultas directas en base de datos:
- Realizar una consulta que permita conocer cuál es el producto que más stock tiene.
- Realizar una consulta que permita conocer cuál es el producto más vendido.

## Comenzando

1.  Clonar el repositorio en sus computadoras para comenzar a trabajar

Tendrán un `boilerplate unico` con la estructura general tanto del servidor como de cliente.

**IMPORTANTE:** Es necesario contar minimamente con la última versión estable de Node y NPM. Asegurarse de contar con ella para poder instalar correctamente las dependecias necesarias para correr el proyecto. es necesario tener instalado Composer

Actualmente las versiónes necesarias son:

-   **Node**: 12.18.3 o mayor
-   **NPM**: 6.14.16 o mayor
-   **Laravel Framework**: 10.3.3
-   **node**: v18.10.0
-   **composer** : version 2.4.2
-   **PHP**: 8.1.2-1ubuntu2.11
-   **Se utilizo un servdor apache con Xampp y se utilizo mysql como base de datos**

**importante2:** debes colocar en el archivo `.env`,como este ejemplo:
se proporciona la base de datos adjunta en este repositorio, si desea probar el ejercicio de manera mas dinamica, es importante que cree su base de datos con el mismo nombre `cafeteria`

         DB_CONNECTION=mysql
         DB_HOST=127.0.0.1
         DB_PORT=3306
         DB_DATABASE=cafeteria
         DB_USERNAME=root
         DB_PASSWORD=

donde `DB_PORT` asegurese que sea el indicado usualmente se utiliza: `3306`

## BoilerPlate

Adicionalmente será necesario que creen desde Mysql una base de datos llamada `cafeteria` si desea usar nuestra fuente de base de datos sino puede colocar la deseada.

-   En el proyecto se encuentra la base de datos que se utilizo, puede usarla si desea, se encuentra en la carpeta:

```
./BaseDeDatosEjemplo
```

## Enunciado

-   el proyecto se construyo con laravel, en este sentido debe de instalar dependencias de node y las respectivas dependencias de composer. por lo tanto ejecute:

#### Tecnologías necesarias:

-   [ ] Laravel
-   [ ] Composer
-   [ ] Node
-   [ ] PHP
-   [ ] MYSQL

## Comandos de ejecucion :
**Nota:**
se crearon usuarios por defecto para que puede ejecutar las pruebas 
esto se realizo en los "seeders"

Usuario aministrator: puede ver todo, y ejecutar acciones en Usuarios y productos
```
'name' => 'Admin Konecta',
'email' => 'admin_principal_konecta@gmail.com',
'password' => Hash::make(12345678),

```

Usuario author: puede ver todo pero no ejecutar acciones en usuarios ni en productos
```
'name' => 'Kenneth Puliche',
'email' => 'kennethdevpc@gmail.com',
'password' => Hash::make(12345678),

```
El resto de usuarios que se crearon son solo usuarios "clientes", los cuales solo pueden ver la tienda y carrito de compras si estan logueados

para ejecutar el archivo solo debe de instalar las dependencias, debe de dirijirse a la carpeta desde la terminal y ejecutar :

Para instalar el composer

```
sudo Composer install
```

para dependencias adicionales:

```
sudo npm install
```

para dependencias si no permite con el anterior comando:

```
sudo npm install --force
```

y una vez se tengan instaladas las dependencias ejecutar la aplicacion,

```
npm run dev
```

si desea ejecutarlo en el servidor local ejecute:

```
php artisan serv
```

si por algun motivo le exije instalar una key, ejectute el sigueinte comando (y vuelva a jecutar el comando anterior (php artisan serv)):

```
 php artisan key:generate
```

de esta manera se podra redirijir a donde el servidor lo deje, generalmente aparece algo como:

```
 INFO  Server running on [http://127.0.0.1:8000].
```

asi que si va a su navegador con este link [http://127.0.0.1:8000] va a tener acceso al proyecto, en donde debe registrarse y luego loguearse

---

**forma2**
-para visualizar el proyecto se ejectuto la siguinte ruta en el nevegador (de esta manera se realiza cuando se coloca en la carpeta `htdocs`):

```
http://localhost:82/cafeteria/public/product
```

Donde `cafeteria` es el nombre de la carpeta donde se guarda el proyecto, sin embargo si lo descarga desde este repositorio va a tener un nombre similar a `cafeteria-master.zip`

nota: para ejecutar se utilizo la herramienta xampp y se creo el proyecto en nuestra carpeta htdocs puede buscarla con el comando: `cd /opt/lampp/htdocs`
path de referencia:
`/opt/lampp/htdocs/{nombre del proyecto descargado}`.

<hr/>

---

## **AUTOR**

**kenneth E. Puliche Correa**

### <h3> 🤝🏻 &nbsp;Connect with Me </h3>

Email: **kennethdevpc@gmail.com**

Wpp: **<a href="https://wa.link/2rl3qe"> +573184484423 </a>**

## 🌐 Socials:

[![LinkedIn](https://img.shields.io/badge/LinkedIn-%230077B5.svg?logo=linkedin&logoColor=white)](https://www.linkedin.com/in/kennethe-p-813311225/)
</br>

---

```

```

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
