![Laravel](https://github.com/juancarlosSH/MasehualTlajtoli/workflows/Laravel/badge.svg)
![Docker CI](https://github.com/juancarlosSH/MasehualTlajtoli/workflows/Docker%20CI/badge.svg)
# Masehualtlajtoli
Masehualtlajtoli es una aplicacion web que busca hacer un poco de conciencia y mostrar al publico en general en especial lo importante que es el salvaguardar nuestras lenguas indigenas en México.
## Herramientas
* Docker y Docker-compose
* Git
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
* Levantamos los contenedores
```bash
docker-compose up -d
```
* Obtenemos el ID del contenedor Laravelapp
```bash
docker ps
```
* Entramos con el comando bash en el contenedor
```bash
docker exec -it id bash
```
* Ejecutamos el siguiente script que ejecutara los comandos necesarios para poder ver la aplicación, ATENCION: antes de esto debes de tener tu archvio .env con su configuración, el archivo .env.example no es valido
```bash
./provider.sh
```
Por utlimo visita localhost en tu navegador
## Creditos
Universidad Veracruzana

Proyecto desarrollado por:
* Rafael Andrade Mendéz
* Juan Carlos Suarez Hernández

Para la experiencia educativa:
* Desarrollo de sistemas web

Profesor:
* Juan Carlos Pérez Arriaga
