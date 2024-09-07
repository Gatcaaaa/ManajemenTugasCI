<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<?= $this->include('category/head.php') ?>
<div class="page-wrapper">
    <div class="page-body">
        <div class="container">
            <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">

                    <div class="btn-list">
                        <?php foreach ($categories as $c): ?>
                        <!-- Assign a unique ID for each modal trigger -->
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-<?= $c['id'] ?>">
                            <?= $c['name'] ?>
                        </a>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Dynamically generate modals for each category -->
    <?php foreach ($categories as $c): ?>
    <div class="modal modal-blur fade" id="modal-<?= $c['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title"><?= $c['name'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus kategori <strong><?= $c['name'] ?></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Batal</button>
                    <a href="/category/delete/<?= $c['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="/category/delete/<?= $c['id'] ?>" class="btn btn-danger">Hapus</a>

                </div>
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>
</div>

<?= $this->endSection(); ?>