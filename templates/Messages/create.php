<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
?>
<turbo-stream action="append" target="messages">
    <template>
        <?= $this->element('message', ['message' => $message]) ?>
    </template>
</turbo-stream>
