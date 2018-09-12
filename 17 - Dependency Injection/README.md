# L'injection de dépendance

Elle consiste à éviter une dépendance directe entre deux classes, et donc de définir dynamiquement la dépendance plutôt que statiquement.

Un classe A dépend d'une autre classe B quand la classe A possède un attribut de type B, ou possède une méthode utilisant la classe B (type de paramètre, valeur de retour, variable locale, appel de méthode de la classe B)

## Comment la mettre en oeuvre?

- Créer une interface I déclarant les méthodes de la classe B utilisées par la classe A
- Déclarer la classe B comme implémentation de l'interface I
- Remplacer tout référence à la classe B par des références à l'interface I
- Si la classe A instancies des instances de B à son initialisation, alors remplacer l'instanciation par un passage d'une instance de l'interface I au constructeur de A
- Si besoin, ajouter une méthode pour spécifier l'instance de l'interface I à utiliser.

## Un peu de vocabulaire

 * Dépendance : On parle de dépendance lorsqu'une classe exige la présence de tout ou partie du code d'une autre classe.
 * Inversion de contrôle : Dans les grands framework comme Symfony, l'inversion de contrôle est le fait de donner au framework tout le contrôle sur le flot d'exécution. Le développeur délègue du pouvoir au framework afin de se simplifier la vie. Le développeur indique au framework un ensemble de paramètres (chemin vers les fichiers, préfixe de classes, plugins etc...) et c'est le framework qui gère seul l'ensemble.

## Définition Wikipedia:

    “L’injection de dépendances (Dependency Injection) est un mécanisme qui permet d’implanter le principe de l’Inversion de contrôle. Il consiste à créer dynamiquement (injecter) les dépendances entre les différentes classes en s’appuyant généralement sur une description (fichier de configuration). Ainsi les dépendances entre composants logiciels ne sont plus exprimées dans le code de manière statique mais déterminées dynamiquement à l’exécution.”

En programmation objet, et particulièrement avec les Frameworks, nous sommes souvent amenés à manipuler un grand nombre de classes d’objet différentes. Ces différents objets sont chargés de fournir une fonctionnalité ou un “service”.



Avertissement : Depuis la rédaction de cet article sur l’injection de dépendances, le coeur de Symfony2 a évolué de façon notable, en particulier certaines classes du répertoire DependencyInjection mentionnées dans cet article ont été renommées, révisées, ou refondues. Toutefois, les principes généraux décrits dans cet article restent d’actualité.
dependency injection symfony Symfony 2 Linjection de dépendances
Injection de dépendances

Cet article est le premier d’une série à venir sur Symfony 2. Pour commencer, je vous invite à télécharger la sandbox de Symfony 2. J’ai décidé de commencer par l’injection de dépendances car il s’agit d’un composant clé de Symfony 2, et que la bonne compréhension de cette nouvelle version du Framework doit forcément en passer par là. L’injection de dépendance est réellement au coeur du Framework.

Nous allons commencer par tenter d’éclaircir cette notion (ou ce design pattern), puis nous verrons plus concrètement l’implémentation qui en est faite au sein de Symfony 2. Commençons par une petite définition.

    Définition Wikipedia:

    “L’injection de dépendances (Dependency Injection) est un mécanisme qui permet d’implanter le principe de l’Inversion de contrôle. Il consiste à créer dynamiquement (injecter) les dépendances entre les différentes classes en s’appuyant généralement sur une description (fichier de configuration). Ainsi les dépendances entre composants logiciels ne sont plus exprimées dans le code de manière statique mais déterminées dynamiquement à l’exécution.”

Qu’est ce que l’injection de dépendances ?

En programmation objet, et particulièrement avec les Frameworks, nous sommes souvent amenés à manipuler un grand nombre de classes d’objet différentes. Ces différents objets sont chargés de fournir une fonctionnalité ou un “service”. Dans une application standard, nous serons par exemple amenés à manipuler :

    Un objet User, supposé représenter l’utilisateur connecté à l’application
    Un objet Session, pour la gestion de la session de l’utilisateur
    Un objet Requete, représentant la requête envoyépe par un client
    Un objet Réponse, pour la réponse que l’application va renvoyer
    Un objet Log, pour pouvoir gérer des logs
    Un objet Mailer, pour pouvoir envoyer des mails
    etc …


La nécessité de l’injecteur de dépendances provient, d’une part, du fait que certains de ces objets sont liés entre eux, ou plutôt “dépendants” les uns des autres, d’autre part, que les objets sont de plus en plus découplés et scindés en classes bien particulières. Par exemple, le service “Mailer” utilisera peut être le service “Log” pour enregistrer les mails qui sont envoyés par l’application.

L’idée de l’injection de dépendances e
st d’utiliser un fichier de configuration pour auto-générer une classe (un “container”) qui contiendra des méthodes nous permettant d’accéder à ces services ; elle contiendra l’initialisation des services (via l’instanciation de la classe qui les représente), gérera les dépendances de ces services (via les constructeurs ou l’appel de méthodes), la configuration des services, etc….