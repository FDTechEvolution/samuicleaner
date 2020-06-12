<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success fade in" onclick="this.classList.add('hidden')">
<strong><?=__('Save success')?></strong>
<?= $message ?>
	
</div>
