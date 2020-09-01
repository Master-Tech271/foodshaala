<?php /* ======================= Items ============================== */ ?>
<?php foreach($items as  $item): ?>
    <div class="container-fluid my-3">
        <div class="row w-100 text-center m-0 p-0">
            <div class="col-md-4 col-sm-6 col-12 mt-3">
                <div class="card border-0 shadow d-inline-block">
                    <div class="card-img">
                        <img src="./assets/itemimages/<?= $item['itemimage'] ?>" alt="item_image" class="img-fluid" style="height:15rem;" >
                    </div>
                    <div class="card-title h3 text-primary ml-3">
                        <?= $item['itemname'] ?>
                    </div>
                    <div class="card-body">
                        <span class="text-info h5">Price </span>: <span class="text-primary h5"> <?= $item['itemprice'] ?> </span>
                        <br/>
                        <span class="text-info h5">Unit </span>: <span class="text-primary h5"> <?= $item['itemunit'] ?> </span>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success shadow-lg">
                            Add To Cart
                        </button>
                    </div>
                </div>
            </div>   
            <!--  -->
            <!--  -->
        </div>
    </div>
<?php endforeach; ?>