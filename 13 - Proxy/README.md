# Proxy Pattern

The proxy design pattern builds an object that is positioned transparently within two other objects in order to intercept or proxy the communication or access.

Le Proxy est un design pattern de structure.

Il est similaire au Décorateur qui lui va ajouter des fonctionalités à l'objet décoré, alors que le proxy va effectuer un contrôle d'accès à l'objet.
Le Proxy va se positionner entre nous et un autre objet, la condition sine qua non pour qu'il puisse se substituer à lui, est que le proxy et l'objet devant lequel il s'intercale, implémente la même interface.

On peut également utiliser le lazy loading pour différé le chargement de l'objet, pendant ce temps, c'est le proxy qui prend le relai