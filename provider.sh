#
echo ""
echo "Ejecutando script de inicio del proyecto"
echo ""
echo "Ejecutando instalación de composer..."
composer install
echo ""
echo "Creando migraciones..."
php artisan migrate:fresh --seed
echo ""
echo "Preparando ambiente de producción..."
composer install --optimize-autoloader --no-dev
echo ""
echo "Generando llaves..."
php artisan key:generate
echo ""
echo "Configurando cache..."
php artisan config:cache
echo ""
echo "Optimizando rutas...."
php artisan route:cache
echo ""
echo "Optimizando vistas..."
php artisan view:cache
echo ""
echo "Instalación terminada :D"
