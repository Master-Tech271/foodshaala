<div class="alert m-0 <?= session()->has('success') ? 'd-block' : 'd-none' ?> alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> <?= session()->get('success') ?>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
