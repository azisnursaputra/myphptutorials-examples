<?php
require_once __DIR__.'/cek-akses.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="keranjang.php">Keranjang</a>
            </li>
            <?php
            if (hasLogin()) {
            ?>
            <?php if (hasAccess('lihatDaftarPesanan')) {?>
            <li class="nav-item">
            <a class="nav-link" href="pesanan.php">Pesanan</a>
            </li>
            <?php }?>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <?php } else {?>
            <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
            </li>
            <?php }?>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
</nav>