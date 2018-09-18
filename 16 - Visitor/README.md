Comment ajouter une action sur un objet sans modifier sa classe?

On séparer la logique ou les algorithmes (Visitor/Visiteur) de la structure des données (Visitable).

Dans le visitable il y a une méthode accept (imposée par une interface)
Et dans notre classe Visitor, nous devons implémenter la méthode visit (également imposée par une interface)

Ainsi grace à un double dispatch, les objets visiteurs peuvent avoir des comportements différents en fonction des objets qu'il visite