
echo ""
echo "Ejecutando script de inicio del proyecto"
echo ""
echo "Verificando lugar de trabajo: "
pwd
echo ""
echo "Ejecutando instalación de composer..."
composer install
echo ""
echo "Generando llaves..."
php artisan key:generate
echo ""
echo "Configurando cache..."
php artisan config:cache
echo "Instalación terminada :D"
