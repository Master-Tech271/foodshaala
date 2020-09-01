<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mx-auto my-3" style="width:20rem;">
            <?php if(session()->get('success')): ?>
                <div class="alert-success mt-1">
                    <?= session()->get('success'); ?>
                </div>
            <?php endif; ?>
            <?php if(isset($validation)): ?>
                <div class="alert-danger mt-1">
                    <?= $validation->listErrors(); ?>
                </div>
            <?php endif; ?>
                <div class="card-header text-left h3 text-primary">
                    Login
                </div>
                <div class="card-body">
                    <?php echo form_open('/login'); ?>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"/>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-outline-primary shadow-lg">Login</button>
                            <a href="/register"  class="nav-link float-right">?Register</a>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>