<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <div class="card mx-auto my-3">
            <?php if(session()->get('success')): ?>
                <div class="alert-success mt-1">
                    <?= session()->get('success'); ?>
                </div>
            <?php endif; ?>
                <div class="card-header text-left h3 text-primary">
                    <h3><?= $user['firstname'] . ' ' . $user['lastname'] ?></h3>
                </div>
                <div class="card-body">
                    <?php echo form_open('/profile'); ?>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="" value="<?= set_value('firstname', $user['firstname']) ?>"/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" value="<?= set_value('lastname', $user['lastname']) ?>"/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" readonly value="<?= $user['email']?>"/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="type" class="form-label">Choose Type</label>
                            <input type="text" name="type" id="type" class="form-control" readonly value="<?= $user['type'] ?>" />
                        </div>
                        <div class="col-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <div class="col-6 mb-3">
                            <label for="cpassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="cpassword" />
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                            <button class="btn btn-outline-primary shadow-lg">Update</button>
                    </div>                    
                        <?php if(isset($validation)): ?>
                            <div class="card-footer shadow">
                                <div class="alert-danger">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>