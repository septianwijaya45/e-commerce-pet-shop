
<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('success')){  ?>
                <div class="alert alert-warning" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php }else if(session()->getFlashdata('error')){ ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit My Profile</h3>
                        </div>
                        <form action="<?= url_to('update.profile', $user->id) ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Nama <span class="text-danger">* Required</span></label>
                                    <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama" value="<?= old('nama') ? old('nama') : ($profil ?  $profil['nama'] : '') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Nomor Telepon <span class="text-danger">* Required</span></label>
                                    <input type="text" id="no_telepon" class="form-control" name="no_telepon" placeholder="Nomor Telepon" value="<?= old('no_telepon') ? old('no_telepon') : ($profil ?  $profil['no_telepon'] : '') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Alamat <span class="text-danger">* Required</span></label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Alamat"><?= old('alamat') ? old('alamat') : ($profil ?  $profil['alamat'] : '') ?></textarea>
                                </div>
                                <br><hr>
                                <div class="form-group">
                                    <label for="inputName">Email <span class="text-danger">* Required</span></label>
                                    <input type="text" id="email" class="form-control" name="email" placeholder="Email" value="<?= old('email') ? old('email') : $user->email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Username <span class="text-danger">* Required</span></label>
                                    <input type="text" id="username" class="form-control" name="username" placeholder="Username" value="<?= old('username') ? old('username') : $user->username ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Password</label>
                                    <input type="password" id="password" class="form-control  <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" placeholder="Password" value="<?= old('password') ?>">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">Simpan</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
<?= $this->section('footer') ?>
    <script>
        $(document).ready(function() {
            $('#jenis_kelamin').select2();
            $('#nis-walisantri').select2();
        });
    </script>
<?= $this->endSection() ?>