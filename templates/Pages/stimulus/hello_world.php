<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="column">
        <div data-controller="hello">
            <p>Example of basic <a href="https://stimulus.hotwire.dev/">Stimulus</a> usage.</p>
            <input data-hello-target="name" type="text">

            <button data-action="click->hello#greet">
                Greet
            </button>

            <p><span data-hello-target="output"></span></p>
        </div>
    </div>
    <div class="column">
        <div data-controller="clipboard">
            PIN: <input data-hello-target="source" type="text" value="1234" readonly>
            <button data-action="clipboard#copy">Copy to Clipboard</button>
        </div>
        <div data-controller="clipboard">
            Another PIN: <input data-clipboard-target="source" type="text" value="3737" readonly>
            <button data-action="clipboard#copy" class="clipboard-button">Copy to Clipboard</button>
        </div>
    </div>
</div>
