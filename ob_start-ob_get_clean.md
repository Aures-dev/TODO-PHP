# ob_start() et ob_get_clean() en PHP

Les fonctions `ob_start` et `ob_get_clean` font partie du système de gestion du tampon de sortie (en: output buffering) en PHP. En terme simple, elles permettent de capturer le contenu qui aurait normalement été envoyé directement au navigateur et de la manipuler avant de l'envoyer ou de l'utiliser.

## Comment ça marche !
1. `ob_start()`:
   - Démarre un tampon de sortie
   - Tout ce qui est affiché ensuite (via echo, HTML direct, etc) est stocké dans le tampon au lieu d'être immédiatement envoyé au navigateur
2. `ob_get_clean()`:
   - Récupère le contenu du tampon courant (sous forme de chaîne de caractère) et le vide.
   -  Cela signifie que le contenu ne sera pas affiché directement, mais peut être utilisé dans une variable ou manipulé avant d'être affiché.

```php

<?php ob_start(); ?>
// Ici, tout ce qui est écrit entre ob_start() et ob_get_clean() est capturé dans le tampon
<h1>Ma Todo List</h1>
<a href="">Ajouter une nouvelle tâche</a>
<ul>
    <li>
        <span>Apprendre HTML</span>
        <a href="">✅</a>
        <a href="">❌</a>
    </li>
</ul>

<?php $content = ob_get_clean(); ?>

<?= htmlspecialchars($content); ?>
```