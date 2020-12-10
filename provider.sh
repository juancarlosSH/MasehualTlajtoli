echo ""
echo "Ejecutando script de inicio del proyecto"
echo ""
echo "Ejecutando instalación de composer..."
composer install
echo ""
echo "Generando llaves..."
php artisan key:generate
echo ""
echo "Configurando cache..."
php artisan config:cache
echo ""
echo "Creando migraciones..."
php artisan migrate:fresh --seed
echo "Instalación terminada :D"
