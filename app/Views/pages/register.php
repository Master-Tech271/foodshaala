<?php $uri = service('uri'); ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <div class="card mx-auto my-3">
                <div class="card-header text-left h3 text-primary">
                <?= ($uri->getSegment(1) == 'restaurantregister') ? 'Restaurant' : 'Customer' ?> Registration
                </div>
                <div class="card-body">
                    <?php if($uri->getSegment(1) == 'restaurantregister'): ?>
                            <?php  echo form_open('/restaurantregister'); ?>
                        <?php else : ?>
                            <?php  echo form_open('/register'); ?>
                    <?php endif; ?>                    
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder=""/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder=""/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <div class="col-6 mb-3">
                            <label for="cpassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="cpassword" />
                        </div>
                        <div class="col-6 mb-3 <?= ($uri->getSegment(1) == 'register') ? 'd-block' : 'd-none' ?>" id="preference_">
                            <label for="preference" class="form-label">Preference</label>
                            <select name="preference" id="preference" class="form-control">
                                <option value="veg">Veg</option>
                                <option value="non-veg">Non-Veg</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                            <button class="btn btn-outline-primary shadow-lg">Register</button>
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