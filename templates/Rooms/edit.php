<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $room->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $room->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Rooms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <turbo-frame id="room">
        <div class="rooms form content">
            <?= $this->Form->create($room) ?>
            <fieldset>
                <legend><?= __('Edit Room') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
        </turbo-frame>
    </div>
</div>
