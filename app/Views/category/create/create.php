<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('task/create/head');?>
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-6">

                    <form action="<?= base_url('/category/save')?>" method="post" class="card">
                        <?= csrf_field() ?>
                        <div class=" card-body">
                            <div class="mb-3">
                                <label class="form-label required">Nama</label>
                                <div>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="emailHelp" placeholder="Masukan Nama Kategori">
                                    <small class="form-hint">Masukkan Kategori Baru</small>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <div class="d-flex">
                                    <a href="/category" class="btn btn-link">Cancel</a>
                                    <button type="submit" class="btn btn-primary ms-auto">Send data</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection();?>