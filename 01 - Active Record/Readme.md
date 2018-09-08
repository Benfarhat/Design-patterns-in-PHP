# Active Record

The active-record pattern is a simple data-access method that maps a database table or view into an object.

The fields map one to one, usually without modification. 

This is powered by ORM 

Prevent duplication and centralize access


L'enregistrement actif

Active Record est une approche pour lire les données d'une base de données. Les attributs d'une table ou d'une vue sont encapsulés dans une classe. Ainsi l'objet, instance de la classe, est lié à un tuple de la base. Après l'instanciation d'un objet, un nouveau tuple est ajouté à la base au moment de l'enregistrement. Chaque objet récupère ses données depuis la base; quand un objet est mis à jour, le tuple auquel il est lié l'est aussi. La classe implémente des accesseurs pour chaque attribut. 

En PHP, les ORM Propel et Eloquent utilisent ce patron de conception

