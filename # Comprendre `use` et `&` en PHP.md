# Comprendre `use` et `&` en PHP

## Introduction
En PHP, les fonctions anonymes (ou closures) et les références permettent d'ajouter des comportements avancés dans le code.
- `use` est utilisé pour importer des variables dans une fonction anonyme.
- `&` permet de travailler des références, affectant directement la variable d'origine.

## `use`: Capturer des variables externes dans une closure

Les closures **n'accèdent pas directement** aux variables définies à l'extérieur. Le mot-clé `use` permet d'importer des variables externes dans une fonction anonyme.

### Exemple
```php
$message = "Bonjour";
$maClosure = function() {
    echo $message; // ce code génère une erreur
} // closure ou fonction anonyme

$maClosure();
function maClosure() {} // fonction normale
```

```php
$message = "Bonjour";
$maClosu = function() use($message) {
    echo $message; // correct !
};
```

## `&`: Travailller avec des références
Le symbole `&` est utilisé pour manipuler les variables **par référence**.
Cela signifie que toute modification apportée à une variable affecte directement la variable d'origine.

```php
$a = 10;
$b = &$a; // $b devient une référence à $a
$b = 20;

echo $a; // affiche 20
```