Le design pattern Buider est un modèle de conception qui sépare le processus de construction de l'objet de sa représentation finale.
En d'autres termes, cela signifie que le processus de construction est identique mais que le produit finit peut varier.

Un cas d'usage simple

Supposez que vous devez à partir d'un logiciel de comptabilité, extraire vos dépenses mensuelles. Vous souhaitez pouvoir obtenir un rapport de dépenses sous la forme d'un tableau et aussi sous la forme d'un graphe.
le processus de création sera probablement identique lorsqu'il va s'agir de construire le rapport (extraire les données de la base, ajouter des dépenses au rapport);, mais le produit final ne sera pas du tout le même.

Le mauvais reflexe consiste à developper plusieurs méthode en dur qui exploiteront les données en dupliquant ainsi les efforts.

Avec un monteur builder, on fera en sortes que chaque éléments du rapport sera traité à part puis regrouper à la demande

[source](http://www.croes.org/gerald/blog/le-design-pattern-monteur-builder-en-php/687/)