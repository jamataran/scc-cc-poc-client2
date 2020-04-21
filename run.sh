#!/usr/bin/env bash
echo 'Recogiendo la configuración'
curl http://localhost:9191/application2/production/master/application2.properties > application.properties
echo 'Configuración correcta'
echo 'Lanzando aplicación'
/usr/local/Cellar/php@5.6/5.6.40/bin/php -S localhost:8123 -t .
echo 'Ya puedes acceder => http://localhost:8123'