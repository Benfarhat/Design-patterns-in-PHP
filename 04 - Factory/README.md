# Factory

The Problem:

Various implementations


## Factory Pattern

Allows us to create an object without needing direct access to the creation logic

### Standardizing Interfaces

Drawbacks

Refactoriing to use this can be painful

Subclasses may have a lot of boilerplate

---

Le design pattern Fabrique (Fabric Method) définit une interface pour la création d'un objet en déléguant à ses sous-classes le choix des classes à instancier.

Description du problème:

Il est fréquent de devoir concevoir une classe qui va instancier différents types d'objets suivant un paramètre fourni. Par exemple une usine va fabrique des produits en fonction du modèle qu'on lui indique.

L'idée la plus simple pour répondre à ce besoin est d'écrire une succession de conditions qui suivant le modèle demandé, instancie et retourne l'objet correspondant.

Le problème avec cette implémentation, c'est que la classe correspondant à l'usine va être fortement couplée à tous les produits qu'elle peut instancier car elle fait appel à leur type concret.
Or ce code va être amené à évoluer régulièrement lors de l'ajout de nouveaux produits à fabriquer ou de la suppression de certains produits obsolètes.

De plus il est fort probable que l'instanciation des différents produits soit également réalisée dans d'autres classes par exemple pour présenter un catalogue des produits fabriqués.

On se retrouve alors avec du code fortement couplé, qui risque d'être dupliqué à plusieurs endroits de l'application.


La première solution est de regrouper l'instanciation de tous les produits dans une seule classe chargée uniquement de ce rôle. On évite alors la duplication de code et on facilite l'évolution au niveau de la gamme des produits.

Cette solution appelée Fabrique Simple est une bonne pratique de conception mais pas un design pattern. En effet le design pattern Fabrique est plus évolué et offre plus de flexibilité, donc atttention à ne pas confondre. Pour autant cette bonne pratique est régulièrement utilisée et s'avère efficace dans les cas les plus simples

Définition de la solution:

Le créateur contient toutes les méthodes permettant de manipuler les produits exceptée la méthode créerProduit qui est abstraite. Les créateurs concrets implémentent la méthode créerProduit qui instancie et retourne les produits.
Chaque créteur concret peut donc créer des produits dont il a la responsabilité. Pour finir tous les produits implémentent la même interface afin que les classes utilisant les produits (comme le créateur) puissent s'y référer sans connaître les types concrets.

# Abstract Factory VS Factory Method

La méthode d'usine (Factory method) est une méthode simple utilisée pour créer des objets dans une classe.
L'usine abstraite (abstract factory) offre plusieurs fabriques et plusieurs types d'objets. On va donc instancier des familles de produits dépendant les uns des autres sans qu'il soit necessaire de préciser leur type concret