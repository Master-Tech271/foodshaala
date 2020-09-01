<div class="container">
    <div class="row">
        <div class="col-12  text-center">
            <h1 class="text-success">Admin</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <div class="card mx-auto my-3">
                <div class="card-header text-left h3 text-primary">
                    Add Items
                </div>
                <div class="card-body">
                    <?php if(session()->get('success')): ?>
                        <div class="alert-success mt-1 p-1 text-info">
                            <?= session()->get('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php echo form_open('/addItem', 'enctype="multipart/form-data"'); ?>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="itemname" class="form-label">Item Name</label>
                            <input type="text" class="form-control" name="itemname" id="itemname" placeholder=""/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="itemunit" class="form-label">Item Unit(Piece)</label>
                            <input type="text" class="form-control" id="itemunit" name="itemunit" placeholder=""/>
                            <span class="text-info">Ex-: 1kg or 1 piece</span>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="itemprice" class="form-label">Item Price</label>
                            <input type="number" class="form-control" id="itemprice" name="itemprice" placeholder=""/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="itemimage" class="form-label">Item Image</label>
                            <input type="file" name="itemimage" class="form-control"/>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="itemstatus" class="form-label">Item Status</label>
                            <select name="itemstatus" id="type" class="form-control">
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                            <button class="btn btn-outline-primary shadow-lg">Add</button>
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