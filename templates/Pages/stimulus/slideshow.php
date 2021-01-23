<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="column">
        <div data-controller="slideshow" data-slideshow-index-value="1">
            <button data-action="slideshow#previous"> ← </button>
            <button data-action="slideshow#next"> → </button>

            <div data-slideshow-target="slide">🐵 0</div>
            <div data-slideshow-target="slide">🙈 1</div>
            <div data-slideshow-target="slide">🙉 2</div>
            <div data-slideshow-target="slide">🙊 3</div>
        </div>
    </div>
</div>
