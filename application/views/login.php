<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo
                                                    base_url() . 'assets/css/bootstrap.css' ?>">
</head>

<body>
    <div class="container mt-5">
        <div class="container">
            <center>
                <h1 class="fw-bold">login</h1>
                <h5 class="">Sistem Informasi Perpustakaan</h5>
            </center>
        </div>
        <br>
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "<div class='alert alert-danger'>Login
                gagal! Username dan password salah.</div>";
            } else if ($_GET['pesan'] == "logout") {
                echo "<div class='alert alert-success'>Anda telah logout</div>";
            } else if ($_GET['pesan'] == "belumlogin") {
                echo "<div class='alert alert-warning'>Anda belum login</div>";
            }
        }
        ?>
        <form method="post" action=" <?= base_url() . 'welcome/login' ?> ">
            <div class="form-group">
                <input type="text" name="username" placeholder="username" class="form-control">
                <?php echo form_error('username') ?>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="password" class="form-control">
                <?php echo form_error('password') ?>
            </div>
            <input type="submit" value="Login" class="btn btn-primary">
        </form>

    </div>

</body>

</html>