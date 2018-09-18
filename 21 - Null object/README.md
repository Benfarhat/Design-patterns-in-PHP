Quand une fonction ou une méthode retourne une référence à un objet, celle-ci peut être nulle (aucun objet concret référencé). Il faut alors tester la référence retournée afin de ne pas provoquer une erreur dans le programme.

Au lieu de retourner une référence nulle, il est possible de créer une sous classe ou une classe d'implémentation d'interface spécifique dont les méthodes ne font rien. La fonction ou méthode retourne alors une instance de cette classe.

Les appels de méthodes avec un objet nul sont alors possible, ce qui n'est pas le cas avec une référence nulle.
Comme l'état interne de cet objet ne change pas (les méthodes ne faisant rien), il est possible d'avoir une instance unique d'un tel objet (pattern singleton).