<?php 
    if(session()->getFlashdata('error') != null){
        $err = session()->getFlashData('error');
    }
?>
<?= $this->extend('layouts/template'); ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Produk</li>
                <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('error-header')){  ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error-header') ?>
                </div>
            <?php } ?>
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
                            <h3 class="card-title">General</h3>
                            <a href="<?= url_to('produk') ?>" class="btn btn-sm btn-light text-primary float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                        </div>
                        <?php if(current_url() == url_to('store.produk')): ?>
                            <form action="<?= url_to('store.produk') ?>" method="POST" enctype="multipart/form-data">
                        <?php else: ?>
                            <form action="<?= url_to('update.produk', $produk['id']) ?>" method="POST" enctype="multipart/form-data">
                        <?php endif ?>
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Nama Produk <span class="text-danger">* Harus Diisi</span></label>
                                    <input type="text" id="nama" class="form-control <?= isset($err['nama']) ? $err['nama'] ? 'is-invalid' : '' : ''; ?>" name="nama" placeholder="Nama Produk" value="<?= old('nama') ? old('nama') : $produk['nama'] ?>" >
                                    <?php  if(isset($err['nama'])){  ?>
                                        <div class="invalid-feedback">
                                            <?=  $err['nama']; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Kategori Produk <span class="text-danger">* Harus Diisi</span></label>
                                    <select name="kategori" id="kategori" class="form-control <?= isset($err['kategori']) ? $err['kategori'] ? 'is-invalid' : '' : ''; ?>">
                                        <option value="" class="text-center">Pilih Produk</option>
                                        <option value="Pakan Kucing" <?= (old('kategori') ? old('kategori') : $produk['kategori']) == 'Pakan Kucing' ? 'selected' : '' ?>>Pakan Kucing</option>
                                        <option value="Aksesoris Kucing" <?= (old('kategori') ? old('kategori') : $produk['kategori']) == 'Aksesoris Kucing' ? 'selected' : '' ?>>Aksesoris Kucing</option>
                                        <option value="Obat Kucing" <?= (old('kategori') ? old('kategori') : $produk['kategori']) == 'Obat Kucing' ? 'selected' : '' ?>>Obat Kucing</option>
                                        <option value="Pakan Burung" <?= (old('kategori') ? old('kategori') : $produk['kategori']) == 'Pakan Burung' ? 'selected' : '' ?>>Pakan Burung</option>
                                        <option value="Pakan Ayam" <?= (old('kategori') ? old('kategori') : $produk['kategori']) == 'Pakan Ayam' ? 'selected' : '' ?>>Pakan Ayam</option>
                                        <option value="Pakan Ikan" <?= (old('kategori') ? old('kategori') : $produk['kategori']) == 'Pakan Ikan' ? 'selected' : '' ?>>Pakan Ikan</option>
                                    </select>
                                    <?php  if(isset($err['kategori'])){  ?>
                                        <div class="invalid-feedback">
                                            <?=  $err['kategori']; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Netto Produk <span class="text-danger">* Harus Diisi</span></label>
                                    <input type="text" id="netto" class="form-control <?= isset($err['netto']) ? $err['netto'] ? 'is-invalid' : '' : ''; ?>" name="netto" placeholder="Netto Produk" value="<?= old('netto') ? old('netto') : $produk['netto'] ?>" >
                                    <?php  if(isset($err['netto'])){  ?>
                                        <div class="invalid-feedback">
                                            <?=  $err['netto']; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Satuan Produk <span class="text-danger">* Harus Diisi</span></label>
                                    <input type="text" id="satuan" class="form-control <?= isset($err['satuan']) ? $err['satuan'] ? 'is-invalid' : '' : ''; ?>" name="satuan" placeholder="Satuan Produk" value="<?= old('satuan') ? old('satuan') : $produk['satuan'] ?>" >
                                    <?php  if(isset($err['satuan'])){  ?>
                                        <div class="invalid-feedback">
                                            <?=  $err['satuan']; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Stok Produk<span class="text-danger">* Harus Diisi</span></label>
                                    <input type="number" min="0" id="stok" class="form-control <?= isset($err['stok']) ? $err['stok'] ? 'is-invalid' : '' : ''; ?>" name="stok" placeholder="Stok Produk" value="<?= old('stok') ? old('stok') : $produk['stok'] ?>" >
                                    <?php  if(isset($err['stok'])){  ?>
                                        <div class="invalid-feedback">
                                            <?=  $err['stok']; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Harga Produk<span class="text-danger">* Harus Diisi</span></label>
                                    <input type="number" min="0" id="harga" class="form-control <?= isset($err['harga']) ? $err['harga'] ? 'is-invalid' : '' : ''; ?>" name="harga" placeholder="Harga Produk" value="<?= old('harga') ? old('harga') : $produk['harga'] ?>" >
                                    <?php  if(isset($err['harga'])){  ?>
                                        <div class="invalid-feedback">
                                            <?=  $err['harga']; ?>
                                        </div>
                                    <?php } ?>
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