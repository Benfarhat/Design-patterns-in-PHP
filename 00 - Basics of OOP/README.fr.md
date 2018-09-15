# Quelques notes avant de commencer

Dans le monde du développement web, les choses évoluent très rapidement, nous ne sommes plus du temps ou nous devions mettre en place un site vitrine, très souvent statique basé sur de la présentation (avec bien sur les moyens de bord de l'époque). Aujourd'hui de plus gros défits entre en jeux, et demain en viendront de plus imposants. Et c'est qui à mon sens fait la signature d'un développment dans son expérience, par exemple si on a appris a contruire un appartement, on va bien sur subdiviser cette construction en allant plus bas dans la construction et en commencant par une chambre, puis une autre et encore une autre sans bien sur oublier les éléments communs qui devront bien évidemment s'emboiter (comme l'éléctricité, le chauffage centrale, la ventilation, le cablage réseau et tv, l'eau, les évacuations ect...). Quelques soit l'importance de cette appartement on finira par le faire et on validera en vérifiant que si j'allume la lumière dans une chambre ca fonctionne, que cela ne cause pas de problème avec l'allumage d'une autre chambre, que l'eau de la salle de bain s'il fonctionne, ne va pas (trop) diminuer le débit de celui d'une autre salle de bain ou de la cuisine. Tout cela se fera en développement par des tests.
L'expérience fait en sorte que celui qui aura tout un batiment à contruire, verra son défit à faire plusieurs appartements (la subdivision des éléments d'un appartement étant déjà acquis et il ne perdra pas de temps a comprendre comment faire).

En developpement web, l'introduction des objets a été une grande révolution, car rappelez vous, dans nos chambres construites il y a des éléments qui se répète et donc de la réutilisation dans la méthode de construction. il vaut dire, aller j'ai une chambre de base que j'utilise, ensuite je n'ai plus qu'à modifier certains propriétés comme la couleur, le nombre de prise éléctrique etc ..., que tout refaire à chaque fois, l'orienté objet offre cette même logique.

- La définition d'un objet c'est une CLASSE, définit par le mot clé class
- le fait d'utiliser une classe pour créer un nouvel objet se nomme l'INSTANCIATION, on reconnait une instanciation par le mot clé new
- un objet a des PROPRIETES et des METHODES, la valeur d'une propriété varie d'un objet à un autre mais pas le fonctionnement d'une méthode
- lorsqu'on veut avoit une propriété identique pour tous les objets d'une même classe on peut utiliser des CONSTANTES

- Il est possible lors de vos developpement il est possible d'avoir un même nom de classe, pour apporter une solution aux conflits on utilise les espaces de nom via le mot clé NAMESPACE.
- Dans ce même contexte, si on a besoin d'appelé une classe et non un objet, il est possible de faire une résolution de nom (qui comprendra donc le nom et le namespace permettant de résoudre les soucis de conflits de nom), via le mot clé CLASS en utilisant Classname::class. Et donc si le namespace change nous n'avons plus besoin de modifier notre code.
- Même chose, les constantes \_\_NAMESPACE\_\_ et \_\_CLASS\_\_ renseignant respectivement le nom du namespace courant et le nom de la classe courante, nous le verrons plus loin, \_\_CLASS\_\_ equivaut également à self::, il existe également le mot clé static:: (proposé par le LSB ou LATE STATE BUILDING), la nuance entre les deux est assez simple et nous l'expliquerons par l'exemple suivant:

```
class Vehicule {
    public static function a() {
        echo '<pre>' . __CLASS__ . '</pre>';    // Etape 3
    }
    public static function b() {
        self::a();   // Etape 2 : PHP 5.2 => "self"
    }
}
class Voiture extends Vehicule {
    public static function a() {
        echo '<pre>' . __CLASS__ . '</pre>';
    }
}
Voiture::b(); // Etape 1
```

Cela affichera Vehicule car le self est défini dans Vehicule bien qu'il soit appelé indirectement via Voiture, le self définit la classe au sein de laquelle il est défini.

Pour répondre à ce souci, viens à la rescousse le LATE STATE BINDING

```
class Vehicule {
    public static function a() {
        echo '<pre>' . __CLASS__ . '</pre>';
    }
    public static function b() {
        static::a();   // Etape 2 : PHP 5.3 LSB => "static"
    }
}
class Voiture extends Vehicule {
    public static function a() {
        echo '<pre>' . __CLASS__ . '</pre>';    // Etape 3
    }
}
Voiture::b(); // Etape 1

```

Cela affichera grace au mot clé static, "Voiture"


- il existe des methodes dites MAGIQUES que l'on trouvent partout et qui nous faciliteront la tache, elles sont généralement identifiable par leur nom qui commencent par "\_\_"
- le CONSTRUCTEUR est la méthode magique (\_\_construct) lancée lors d'une instanciation, par contre, lorsqu'on ne veut plus aucune référence à un objet, on utilise un DESTRUCTEUR (\_\_destruct) 
- L'une des méthodes magiques les plus utiles est la méthode \_\_call qui est appelée avant d'exécuter une tout autre méthode, elle permet par exemple de faire ce que l'on retrouve sur symfony ou cakephp, des méthodes de recherche dynamique du genre FindByName qui va découper la partie après By pour mettre en minuscule et supposer qu'il s'agit d'une recherche sur un champ nous donnant ainsi une infinité de fonction. Ainsi FindByCode(10) reviendra en arrière plan a retourné le résultat de "SELECT * FROM {$this->tableName} WHERE code = 1", 

 
voici un extrait du code de l'orm de cakephp:

```
        public function \_\_call($method, $args)
        {
            ...
            if (preg\_match('/^find(?:\w+)?By/', $method) > 0) {
                return $this->\_dynamicFinder($method, $args);
            }
            throw new BadMethodCallException(
                sprintf('Unknown method "%s"', $method)
            );
        }
```

Et celui de l'ORM de symfony (Doctrine):

```
    public function \_\_call($method, $arguments)
    {
        if (strpos($method, 'findBy') === 0) {
            return $this->resolveMagicCall('findBy', substr($method, 6), $arguments);
        }
        if (strpos($method, 'findOneBy') === 0) {
            return $this->resolveMagicCall('findOneBy', substr($method, 9), $arguments);
        }
        if (strpos($method, 'countBy') === 0) {
            return $this->resolveMagicCall('count', substr($method, 7), $arguments);
        }
        throw new \BadMethodCallException(
            sprintf(
                "Undefined method '%s'. The method name must start with either findBy, findOneBy or countBy!",
                $method
            )
        );
    }
```
- La méthode \_\_call est un "intercepteur", d'autre existent également comme \_\_get ou \_\_set \_\_isset, \_\_unset ou encore \_\_callStatic
- une classe est dite parent si elle permet de mettre en place une classe dite fille, c'est ce qu'on appelle l'HERITAGE, on peut par exemple créer une classe "modèle de chambre" et faire d'autres classe telle que "salon", "salle à manger", "bureau", "chambre à coucher" qui hériteront de la classe parent "modèle de chambre".
- L'héritage se fait grâce au mot clé EXTENDS
- Pour avoir accès à un élément de la classe parent on utilise le mot clé parent, par contre pour avoir accès à la classe en cours on utilise self (pour la classe) et $this (pour l'objet)
- Si une méthode d'une classe parente et redéfinie dans la classe fille, alors on parle de SURCHARGE
- Si on veut interdire la surcharge d'une méthode ou l'héritage d'une classe on utilise le mot clé FINAL
- les propriétés et les méthodes d'une classe ont une visibilité qui peut être à PUBLIC, PRIVATE ou PROTECTED, si on ne définit aucune visibilité, c'est PUBLIC qui sera prise en compte.
- PUBLIC est visible partout, PRIVATE n'est visible que dans la classe en cours et PROTECTED est visible au niveau de la "famille" à savoir la classe parente et les classes filles. En gros tout le monde peut toucher aux propriétés publics, par contre pour toucher aux propriétés privées, il faut passer par l'objet qui lui decide ou non s'il veut exposer cette propriété, si c'est le cas on ajoutera dans la classe des methodes dites GETTER et SETTER
- Les Setters permettent de changer la valeur d'une propriété privée ou protected, alors que les getters permettent de les récupérer. On peut par exemple supposer au niveau des setters, qu'avant d'enregistrer un mot de passe on le hashera et que pour des raisons de sécurité il n'y a aucun getter pour cette propriété.
- Si on veut attacher une propriété ou méthode à la classe et non à l'objet alors on la déclare statique avec le mot clé STATIC, pour comprendre cela, imaginer que vous mettez un compteur static et que dans le constructeur vous l'incrémentiez de 1 et dans le destructeur vous le décrémenter de 1. Cela vous permettra d'avoir en tant réel le nombre d'instance de cette classe. Même chose si vous avez besoin  d'une fonction dans une classe qui ne necessite pas d'instance, comme par exemple le calcul d'une puissance, alors il suffit de déclarer la fonction static.
- On accède au élement static (et au constante) via l'opérateur de résolution de porté "::"
- Notez qu'avec une propriété static on utilise toujours le $, par exemple si l'age est une propriété public on l'appelera comme ci dans le code: `$this->age` par contre s'il est static on mettra le $ avant le nom de la propriété `$this::$age`


- Si on veut qu'une classe ne puisse pas être instanciée mais seulement héritée, alors on l'a déclare abstraite via le mode clé ABSRACT
- L'abstraction facilite les choses car on définit deja nos méthode, si on ne veut pas le faire et juste décire quelles seront les méthodes à implémenter avec leur signature (les arguments en entrés et le type de retour), alors on utilise une interface déclaré par le mot clé INTERFACE et utilisé dans une classe par le mot clé IMPLEMENTS. Notez que tous les méthodes doivent explicitement être déclarées (même celle que vous n'utiliserait pas). 
- Lorsqu'on veut créer de l'héritage multiple en ajoutant par exemple des fonctionalités qui seront regroupés dans des classes, alors on utilise les traits définis par le mot clé TRAIT et utilisé par le mot clé USE.
- Si dans deux traits différents, il existe des méthodes portant le même nom, alors on résoud le conflit soit via INSTEADOF pour dire laquelle sera utilisée, soit en renommant (aliasing) l'une d'entre elle via le mot clé AS.

```
?php
trait A {
    public function smallTalk() {
        echo 'a';
    }
    public function bigTalk() {
        echo 'A';
    }
}

trait B {
    public function smallTalk() {
        echo 'b';
    }
    public function bigTalk() {
        echo 'B';
    }
}

class Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }
}

class Aliased\_Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
        B::bigTalk as talk;
    }
}
?>
```

- Il est possible de créer des classes dit anonymes (sans nom de classe) en faisant lors de l'instanciation `new class { /.../}`


# Attention

En tant que développeur PHP il est intéressant de suivre l'évolution de PHP dont notamment la version 8.0 qui au moment de l'écriture de cette page est en cours de discussion, ainsi nous avons une vision plus claire sur ce qui sera déprécié (comme mcrypt utilisé en sécurité ou uniqid), mais également sur les éventuelles nouveautés