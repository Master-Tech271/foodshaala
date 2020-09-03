<?php /* ======================= show orders ============================== */ ?>
    <div class="container-fluid my-3">
        <div class="row w-100 text-center m-0 p-0">
            <?php foreach($items as $item): ?>                
                <?php foreach($item as  $order): ?>
                    <div class="col-md-4 col-sm-6 col-12 mt-3">
                        <div class="card border-0 shadow">
                            <div class="card-img">
                                <img src="<?= base_url() ?>/assets/itemimages/<?= $order['itemimage'] ?>" alt="item_image" class="img-fluid" style="height:15rem;" >
                            </div>
                            <div class="card-title h3 text-primary ml-3">
                                <?= $order['itemname'] ?>
                            </div>
                            <div class="card-body">
                                <span class="text-info h5">Price </span>: <span class="text-primary h5"> <?= $order['itemprice'] ?> </span>
                                <br/>
                            </div>
                        </div>
                    </div> 
                <?php endforeach; ?>  
            <?php endforeach; ?>  
        </div>
    </div>
