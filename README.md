ESOA - Usefull command
======================

Mis à jour du schéme de bdd

    php bin/console doctrine:schema:update --force
    
Chargement des fixtures

    php bin/console doctrine:fixtures:load
    
Generation des getters et des setters

    php bin/console doctrine:generate:entities AppBundle:EntityName
    
    
Warmup afin d'avoir la version de prod fonctionnel en local (évite le 404) 

    php bin/console cache:warmup --env=prod --no-debug
    
Vider le cache de la version de prod 

    php bin/console --env=prod cache:clear