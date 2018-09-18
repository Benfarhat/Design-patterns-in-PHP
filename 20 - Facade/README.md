Le patron de conception façade a pour but de cacher une conception et une interface ou un ensemble d'interfaces complexes difficiles à comprendre (cette compléxité étant apparue "naturellement" avec l'évolution du sous-système en question). La façade permet de simplifier cette complexité en fournissant une interface simple du sous-systèle. Habituellement, la façade est réalisée en réduisant les fonctionalités de ce dernier mais en fournissant toutes les fonctions nécessaires à la plupart des utilisateurs.

La façade encapsule la complexité des interactions entre les objets métier participant à un workflow.

L'utilisation d'une façade a les avantages suivants:

- simplifier l'utilisation et la compréhension d'une bibliothèque logicielle car la façade possède des méthodes pratiques pour les tâches courantes.
- rendre le code source de la bibliothèque plus lisible pour la même raison
- réduire les dépendances entre les classes utilisatrices et les classes internes à la bibliothèque puisque la plupart des classes utilisatrices utilisent la façade, ce qui autorise plus de flexibilité pour le développement du système
- rassembler une collection d'API complexes en une interface particulière et doit supporter un comportement polymorphique