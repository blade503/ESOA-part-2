ESOA - Usefull command
======================

This project has been done for the course of enterprise software oriented architecture. This prototype gives a responses to a problem seen in class.

======================
Projet sous symfony réalisé dans le cadre d'un projet pour la matière enterprise oriented software architecture. C'est un projet pour l'entreprise BE. Engine afin de répondre à leurs divers soucis internes constaté suite à un audit de leur SI.

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
