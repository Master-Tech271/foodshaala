<?php if(isset($message)) : ?>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-capitalize display-4  text-success">
                <?= $message ?> <?= session()->has('rname') ? session()->get('rname') : '' ?>
            </div>
        </div>
    </div>
<?php endif; ?>