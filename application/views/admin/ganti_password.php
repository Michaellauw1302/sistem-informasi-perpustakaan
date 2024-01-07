<div class="container mt-5">
    <div class="page-header">
        <h3>Ganti Password</h3>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "berhasil") {
                    echo '<div class="alert alert-success">Password Berhasil Diagnati</div>';
                }
            }
            ?>

            <form action=" <?= base_url() . 'admin/ganti_password_act' ?>  " method="post">
                <div class="form-group mb-3">
                    <label for="new_pass">Password Baru</label>
                    <input type="text" class="form-control" name="new_pass" id="new_pass">
                    <?= form_error('new_pass') ?>
                </div>
                <div class="form-group mb-3">
                    <label for="ulang_pass">Ulangi Password Baru</label>
                    <input type="password" class="form-control" name="ulang_pass" id="ulang_pass">
                    <?= form_error('ulang_pass') ?>
                </div>
                <input type="submit" class="btn btn-primary btn-sm" value="simpan">
            </form>
        </div>
    </div>
</div>