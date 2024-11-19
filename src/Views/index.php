<?php
ob_start();
?>


<h1>My Todo-List PHP</h1>
<a href="/add">Ajouter une nouvelle tâche</a><br>
<ul>
    <?php foreach($todos as $todo): ?>
    <li>
        <span style="text-decoration : <?= $todo['done'] ? 'line-through' : 'none' ?>" >
            <?= htmlspecialchars($todo['task']); ?>
        </span>
        <a href="/modif?id=<?= $todo['id'] ?>"> 🖌</a>
        <a href="/toggle?id=<?= $todo['id'] ?>"> ✅</a>
        <a href="/delete?id=<?= $todo['id'] ?>"> ❌</a>
    </li>
    <?php endforeach; ?>
</ul>

<?php
$content = ob_get_clean();
?>
<?php include 'layout.php'?>