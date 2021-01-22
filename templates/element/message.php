<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
echo '<div id="message_' . h($message->id) . '"><p>';
echo $this->Time->nice($message->created) . ': ' . h($message->content);
echo '</p></div>';
