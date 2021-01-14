![Laravel](https://github.com/juancarlosSH/MasehualTlajtoli/workflows/Laravel/badge.svg)
![Docker container](https://github.com/juancarlosSH/MasehualTlajtoli/workflows/Docker%20container/badge.svg)
# Masehualtlajtoli
Masehualtlajtoli es una aplicacion web que busca hacer un poco de conciencia y mostrar al publico en general lo importante que es el salvaguardar nuestras lenguas indigenas en México.
## Herramientas
* [Docker y Docker-compose](https://www.docker.com/products/docker-desktop)
* [Git](https://git-scm.com/downloads)
* [Composer](https://getcomposer.org/)
* [Node](https://nodejs.org/en/)
## Herramientas opcionales
Solo si se desea desarrollar
* php 7.4
* [Laravel](https://laravel.com/docs/8.x)
## Instalación
* Clonamos el repositorio
```bash
git clone https://github.com/juancarlosSH/MasehualTlajtoli.git
```
* Nos movemos dentro de la carpeta del repositorio
```bash
cd MasehualTlajtoli
```
* Ejecutamos el comando que nos genera la carpeta vendor
```bash
composer install
```
* Ejecutamos el comando que nos genera los modulos de node
```bash
npm install
```
* Levantamos los contenedores, ATENCION: antes de esto debes de tener tu archvio .env con su configuración, el archivo .env.example no es valido
```bash
./vendor/bin/sail up -d
```
* Ejecutamos el comando para levantar la base de datos
```bash
./vendor/bin/sail artisan migrate:fresh --seed
```
* Por utlimo visita localhost en tu navegador

[localhost](http://localhost)
## Creditos
Universidad Veracruzana

Proyecto desarrollado por:
* Rafael Andrade Mendéz
* Juan Carlos Suarez Hernández

Para la experiencia educativa:
* Desarrollo de sistemas web

Profesor:
* Juan Carlos Pérez Arriaga
