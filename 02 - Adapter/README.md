# Adapter Pattern (wrapper)

The problem: Pieces don't fit -> We need translation

The adapter pattern adjusts the interface of one class to match that of another

# Drawbacks

- You're just hiding a bad design


Objectif:
    Convertir l'interface d'une classe en l'interface attendue de la part d'un client. Il faut résoudre un problème d'incompatibilité d'interfaces

Utilisation:
    Lorsque l'on veut normaliser l'utilisation d'anciennes classes sans pour autant les modifier;
    Adaptation d'une API tiers dont la signature des opérations ne convient pas.

Avantage:
    Permet d'intégrer des objets existants dans de nouvelles structures de classes sans être limité par leur interface.
Inconvénients:
    Surcoût en taille de code et en temps de calcul dû à l'appel des opérations intermédiaires

Un Adaptateur peut faire dérivé l'interface d'une classe en modifiant les méthodes qui ne correspondent pas aux besoins du client.

