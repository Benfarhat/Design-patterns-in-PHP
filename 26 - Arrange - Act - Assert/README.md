we use AAA in unit test

Arrange: All necessary preconditions and inputs

Act: on the object or method under test

Assert: That the expected results have occured

-----------------

Un test automatisé est un programme qui se découpe en trois étapes dites AAA pour Arrange, Act, Assert

Arrange
    La mise en place de l'environnement : création et initialisation des objets nécessaires à l'execution du test.

Act
    Le test proprement dit

Assert
    La vérification des résultats obtenus par le test

Le sous-système (l'ensemble des objets) éprouvé par le test est parfois appelé SUT (System Under Test).

On distingue différentes catégories de tests :

    Tests unitaires : testent une partie (une unité) d'un système afin de s'assurer qu'il fonctionne correctement (build the system right)
    Tests d'acceptation : testent le système afin de s'assurer qu'il est conforme aux besoins (build the right system)
    Tests d'intégration : testent le système sur une plate-forme proche de la plate-forme cible
    Tests de securité : testent que l'application ne contient pas de failles de sécurité connues (injection de code, attaque XSS, ...)
    Tests de robustesse : testent le comportement de l'application au limite des ressources disponibles (mémoire, CPU, ...) sur la plate-forme
  
source: https://spoonless.github.io/epsi-poe-201703/javaee/a3_tests.html