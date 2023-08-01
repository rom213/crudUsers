# Proyecto Laravel

Este es un proyecto desarrollado con el framework Laravel. A continuación, se detallan los pasos para ejecutarlo en tu entorno local.

## Requisitos previos

Asegúrate de tener instalados los siguientes componentes:

- PHP (versión 7.4 o superior)
- Composer
- Base de datos compatible con Laravel (por ejemplo, MySQL, PostgreSQL)

Puedes instalar xampp al hacer esto te instala

- PHP (versión 7.4 o superior)
- MySQL

tienes que instalar composer.

## Pasos de configuración

1. Clona este repositorio en tu máquina local o descárgalo como archivo ZIP y descomprímelo.
2. Abre una terminal y navega hasta el directorio del proyecto.

## Instalación de dependencias

Ejecuta el siguiente comando para instalar las dependencias del proyecto utilizando Composer:

- composer install

## Configuración del entorno

1. Copia el archivo .env.example y renómbralo como .env.
2. Abre el archivo .env y configura las variables de entorno, como la conexión a la base de datos y las     credenciales SMTP si es necesario.

## Generación de clave de aplicación

Ejecuta el siguiente comando para generar una clave de aplicación única:

- php artisan key:generate

## Ejecución de migraciones y semillas

Para configurar la base de datos, ejecuta las migraciones y los seeders con el siguiente comando:

- php artisan migrate --seed

Esto creará las tablas necesarias en la base de datos y las poblará con datos de prueba si existen semillas configuradas.

## Iniciar servidor de desarrollo

Finalmente, puedes iniciar el servidor de desarrollo de Laravel con el siguiente comando:

- php artisan serve

¡Ahora puedes acceder al proyecto Laravel en tu entorno local a través del servidor de desarrollo!


