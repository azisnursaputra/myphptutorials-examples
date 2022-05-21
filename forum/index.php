<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Forum PHP</title>
  </head>
  <body>
      <?php
      $__menuAktif = 'home';
      include 'menu.php';
      ?>
      <div class="container">
        <h1>
          <?php
          if (isset($_SESSION['user'])) {
            echo $_SESSION['user']['nama'];
          }
          ?>
          Selamat Datang di Forum PHP
        </h1>
        <?php
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
          $pdo = require 'koneksi.php';
          $sql = "SELECT judul, tanggal, nama FROM topik
          INNER JOIN users ON topik.id_user = users.id
          ORDER BY tanggal DESC";
          $query = $pdo->prepare($sql);
          $query->execute();
        ?>
        <h3 class="mt-5">Daftar Topik</h3>
        <hr/>
        <?php
        while($data = $query->fetch()) {
        ?>
        <figure>
          <blockquote class="blockquote">
            <p>
              <a href="#"><?php echo htmlentities($data['judul']);?></a>
            </p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Dari: <?php echo htmlentities($data['nama']);?>
            - <?php echo date('d M Y H:i', strtotime($data['tanggal']));?>
          </figcaption>
        </figure>
        <?php }?>
        <?php }?>
      </div>
    <script src="boostrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>