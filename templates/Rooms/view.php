<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<div class="row">
    <div class="column-responsive column">
        <div class="rooms view content">
            <turbo-frame id="room">
                <turbo-stream action="append" target="messages">
                    <template>
                        View is loaded
                    </template>
                </turbo-stream>
                <h3><?= h($room->name) ?></h3>
                <?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id], ['class' => 'side-nav-item']) ?>
                <table>
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($room->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($room->id) ?></td>
                    </tr>
                </table>
            </turbo-frame>
            <div class="related" id="messages">
                <h4><?= __('Related Messages') ?></h4>
                <?php if (!empty($room->messages)) : ?>
                    <?php foreach ($room->messages as $message) :
                        echo $this->element('message', ['message' => $message]);
                    endforeach; ?>
                <?php endif; ?>
            </div>
            <turbo-frame id="new_message" src="/messages/add?room_id=<?= h($room->id) ?>" target="_top"></turbo-frame>
        </div>
    </div>
</div>
