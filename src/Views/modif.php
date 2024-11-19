<?php 
ob_start();
$task = $_SESSION['toUpdate'];
?>
<h1>Modifier une tâche</h1>
<form action="" method="post">
<input type="text" name="modifiation" value="<?= $task['task'] ?>" required>
<button type="submit">Modifier</button>
</form>

<?php 
$content = ob_get_clean();
?>
<?php 
include "layout.php"
?>