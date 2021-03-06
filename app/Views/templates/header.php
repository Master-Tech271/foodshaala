<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/header.css" type="text/css" />
    <title>FoodShaala | <?= $title?></title>
  </head>
  <body>
  <?php $uri = service('uri'); ?>
    <?php /* ===================== NAVBAR ================================*/?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url() ?>" id="brand_name_">FoodShaala</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?= ($uri->getSegment(1) == '') ? 'active' : '' ?>" aria-current="page" href="/">Home</a>
            </li>
            <?php if(!session()->get('isLoggedIn')) : ?>
            <li class="nav-item">
              <a class="nav-link <?= ($uri->getSegment(1) == 'login') ? 'active' : '' ?>" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($uri->getSegment(1) == 'register') ? 'active' : '' ?>" href="/register">Customer Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($uri->getSegment(1) == 'restaurantregister') ? 'active' : '' ?>" href="/restaurantregister">Restaurant Register</a>
            </li>
            <?php else:  ?>
            <li class="nav-item">
              <a class="nav-link <?= (($uri->getSegment(1) == 'dashboard' || $uri->getSegment(1) == 'order') && !$uri->getSegment(2) == 'orders') ? 'active' : '' ?>" href="/<?= (session()->get('type') == 'user' ? 'order' : 'dashboard' ) ?>"><?= (session()->get('type') == 'user' ? 'Orders' : 'Dashboard' ) ?></a>
            </li>
            <?php if(session()->get('type') == 'restaurant'): ?>
              <a class="nav-link <?= ($uri->getSegment(1) == 'dashboard' && $uri->getSegment(2) == 'orders') ? 'active' : '' ?>" href="/dashboard/orders">All Orders</a>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link <?= ($uri->getSegment(1) == 'profile') ? 'active' : '' ?>" href="/profile">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($uri->getSegment(1) == 'logout') ? 'active' : '' ?>" href="/logout">Logout</a>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>


