Le pattern Observer ou comment ecouter ses objets

Le principe

il existe un objet observé et d'autres qui l'observent
Lorsqu'une certaine action arrive, alors l'observé va prévenir les observateurs

On va se baser sur la bibliothèque standard PHP "SPL", cette bibliothèque est une collection d'interfaces et de classes qyu ont été créers afin de résoudre les problèmes communs

SPL fournit:

- des structures de données, 
- un ensemble d'itérateurs pour traverser les objets (via les méthodes next, current, rewind, seek, ...), 
- des interfaces (Countable, OuterIterator, RecursiveIterator, SeekableIterator), 
- un ensemble d'exceptions standards, 
- des fonctions SPL (spl_autoload_register, ...), 
- un certain nombre de classes pour travailler avec des fichiers (SplFileInfo, SpliFileObject, ...)
- ainsi qu'un certains nombres de classes et interfaces diverses (ArrayObject, SplObserver, SplSubject)

On va dans le patron de conception utiliser la classe SplSubject pour l'observé et SplObserver pour les observateurs
Au niveau de l'observé nous aurons:

- SplSubject::attach(SplObserver $observer) — Attache un SplObserver
- SplSubject::detach(SplObserver $observer) — Détache un observateur
- SplSubject::notify() — Notifie un ou des observateurs que quelque chose s'est produit

Alors qu'au niveau des observateurs nous aurons:

- SplObserver::update(SplSubject $subject) — Réception d'une mise à jour depuis un sujet

Il y a deux modes:
    - Push: C'est l'observé qui informent ceux qui observent
    - Pull: L'observé envoi le strict minimum et laisse les observateurs se renseigner sur les changements d'états