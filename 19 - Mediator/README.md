Le patron de conception mediateur fournit une interface unifiée pour un ensemble d'interfaces d'un sous-système. Il est utilisé pour réduire les dépendances entre plusieurs classes.

Lorsqu'un logiciel est composé de plusieurs classes, les traitements et les données sont répartis entre toutes ces classes. Plus il y a de classes, plus le problème de communication entre celles-ci peut devenir complexe. En effet, plus les classes dépendent des méthodes des autres classes, plus l'architecture devient complexe. Cela ayant des impacts sur la lisibilité du code et sa maintenabilité dans le temps.

Le modèle de conception Médiateur résout ce problème. Pour ce faire, le Médiateur est la seule classe ayant connaissance des interfaces des autres classes. Lorsqu'une classe désire interagir avec une autre, elle doit passer par le médiateur qui se chargera de transmettre l'information à la ou les classes concernées.

Le médiateur permet de s'interposer entre des classes qui seront appelées des collègues

ALors que le médiateur offre des échanges réciproques avec les interfaces des autres classes, la façade (un autre patron de conception) consiste plutôt à une communication unidirectionnelle puisqu'elle offreune simplification d'un système plus complexe.


