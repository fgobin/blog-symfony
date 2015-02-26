To export fixures to database:

(if schema is not created)
php app/console doctrine:schema:create

(export to database)
php app/console doctrine:fixtures:load