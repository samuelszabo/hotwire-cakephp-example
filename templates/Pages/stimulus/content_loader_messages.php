<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\I18n\Time;

$this->layout = 'ajax';
?>
<ol>
    <li>New Message: Stimulus Launch Party</li>
    <li>Overdue: Finish Stimulus 1.0</li>
    <li><?= Time::now()->format('H:i:s') ?></li>
</ol>
