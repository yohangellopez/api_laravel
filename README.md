<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Desarrollador Yohangel Lopez 
Este es una API de un CRUD de tareas desarrollado el dia 6 de septiembre del 2021 en laravel v8

## PASOS PARA EJECUTAR EN ENTORNO LOCAL
1- Clonar el repositorio git.

2- Ejecutar comando composer install 

3- Ejecutar php artisan key:generate

4- Modificar el nombre del archivo .env.example por .env y cambiar el de las siguientes variables

    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    (Cada caso correspondiente a nombre de su db, usuario y contraseña)
5-Ejecutar php artisan migrate

## Rutas
post  : localhost/public/api/task/registro 
    (Recibe un json {
                        name: 'Example',
                        description: 'Example'
                    })
    y retorna ($data = array(
                'status' => 'success||error',
                'task'   => $task,
                'code'   => codigo de error, o success,
                'message'=> 'The task has been ...'
            );

get   : localhost/public/api/task/lista/{filtro?}
    (Recibe un filtro condicional, si es 0 son todas las tareas, si es 1 las completadas o puede recibir un nombre)

get   : localhost/public/api/task/task/{id}
        (Recibe un id y retorna un json con los datos de la tarea seleccionada)

put   : localhost/public/api/task/modify/{id}
    (Recibe un id y cambia su estado a completado)

put   : localhost/public/api/task/update/{id}
    (Recibe un json y un id por parametros para actualizar los datos)

delete: localhost/public/api/task/delete/{id}
    (Recibe un id y retorna un mensaje de error o success)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
