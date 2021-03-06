<?php /* ======================= Items ============================== */ ?>
    <div class="container-fluid my-3 mb-5">
        <div class="row w-100 text-center m-0 p-0">
        <?php foreach($items as  $item): ?>
            <div class="col-md-4 col-sm-6 col-12 mt-3">
                <div class="card border-0 shadow">
                    <div class="card-img">
                        <img src="<?= base_url() ?>/assets/itemimages/<?= $item['itemimage'] ?>" alt="item_image" class="img-fluid" style="height:15rem;" >
                    </div>
                    <div class="card-title h3 text-primary ml-3">
                        <?= $item['itemname'] ?>
                    </div>
                    <div class="card-body">
                        <span class="text-info h5">Item Type  </span>: <span class="text-primary h5"> <?= (isset($item['itemtype'])) ? $item['itemtype'] : 'Veg' ?> </span> <br/>
                        <span class="text-info h5">Price </span>: <span class="text-primary h5"> <?= $item['itemprice'] ?> </span>
                        <br/>
                        <span class="text-info h5">Unit </span>: <span class="text-primary h5"> <?= $item['itemunit'] ?> </span>
                       <br/>
                       <span class="text-info h5">Restaurant </span>: <span class="text-primary h5"> <?= isset($item['rname']) ? $item['rname'] :'FoodShaala' ?> </span>
                    </div>
                    <div class="mb-3">
                        <a class="btn btn-success shadow-lg <?= (session()->get('type') == 'restaurant') ? 'disabled' : '' ?>" type="button" href="<?= (session()->get('type') == 'user') ? '/order' : '/login' ?>/<?= (session()->get('type') == 'user') ? $item['id'] : '' ?>">
                            Order
                        </a>
                    </div>
                </div>
            </div> 
            <?php endforeach; ?>  
        </div>
    </div>
