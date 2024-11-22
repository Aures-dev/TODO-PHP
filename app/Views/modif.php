<?php 
var_dump($taskToModif);
ob_start();
?>
<h1>Modifier une tâche</h1>
<form action="" method="post">
<input type="text" name="modifiation" value = "<?= $taskToModif[0]['task'] ?>" >
<button type="submit">Modifier</button>
</form>

<?php 
$content = ob_get_clean();
?>
<?php 
include "layout.php"
?>