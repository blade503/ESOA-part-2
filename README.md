ESOA - Usefull command
======================

Mis à jour du schéme de bdd

    php bin/console doctrine:schema:update --force
    
Chargement des fixtures

    php bin/console doctrine:fixtures:load
    
Generation des getters et des setters

    php bin/console doctrine:generate:entities AppBundle:EntityName