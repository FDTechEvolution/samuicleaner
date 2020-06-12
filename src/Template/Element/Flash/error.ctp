<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
    if ($message == '') {
        $message = 'Could not be saved. Please, try again.';
    }
}
?>
<div class="row" onclick="this.classList.add('hidden');">
    <div class="col-md-4 col-md-offset-4">
        <div class="alert alert-danger fade in text-center" ><?= $message ?></div>
    </div>
</div>

