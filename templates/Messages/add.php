<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Messages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="messages form content">
            <turbo-frame id="new_message" target="_top">
                <?= $this->Form->create($message, [
                    'url' => ['action' => 'create'],
                    'data-controller' => 'rooms',
                    'data-action' => 'turbo:submit-end->rooms#reset',
                ]) ?>
                <fieldset>
                    <legend><?= __('Add Message') ?></legend>
                    <?php
                    echo $this->Form->hidden('room_id');
                    echo $this->Form->control('content');
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </turbo-frame>
        </div>
    </div>
</div>
