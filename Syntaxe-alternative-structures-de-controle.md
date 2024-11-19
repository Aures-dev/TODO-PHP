# La syntaxe alternative des structures de constrôle en PHP

PHP propose **deux syntaxes différentes** pour ses structures de contrôle comme `if`, `for`, `while`, etc.
1. **Syntaxe classique**
- Utilise des accolades `{}` pour définir les blocs de code à exécuter.
2. **Syntaxe alternative**
- utilise des mots-clés spécifiques (comme `endif`, `endfor`, `endwhile` etc) au lieu des accolades.

## Syntaxe classique
La syntaxe classique est celle que vous utilisez probablement le plus souvent. Elle fonctionne bien pour tout type de projet.
### Exemple:

```php
if ($condition) {
    echo "Condition vraie";
} else {
    echo "Condition fausse";
}
```

## Syntaxe alternative
La syntaxe alternative est souvent utilisée dans des fichiers PHP imbriqués dans des documents HTML. Elle rend le code plus lisible dans ce contexte.
### Exemple avec if:

```php
<?php if($condition): ?>
    <p>Condition vrai !</p>
<?php else: ?>
    <p>Condition fausse !</p>
<?php endif; ?>
```
### Exemple avec while:

```php
<?php while($i < 10): ?>
    <p>Compteur : <?= $i ?></p>
    <?php $i++; ?>
<?php endwhile; ?>
```

## Quand utiliser la syntaxe alternative ?
1. Dans les fichiers HTML/PHP:
- si votre fichier contient beaucoup de balises HTML et un mélange de PHP, la syntaxe alternative peut améliorer la lisibilité.
2. Dans les templates
- utilisée fréquemment dans les moteurs de temps personnalisés ou pour des rendus dans des fichiers HTML, où le style est plus épuré.

## Structures supportées par la syntaxe alternative

|----------------------|-----------------------------------|
|Structure             |Mot clé de fin                     |
|----------------------|-----------------------------------|
|  if                  |   endif                           |
|  while               |   endwhile                        |
|  for                 |   endfor                          |
|  foreach             |   endforeach                      |
|  switch              |   endswitch                       |
|----------------------|-----------------------------------|
