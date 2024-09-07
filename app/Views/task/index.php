<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('task/head')?>
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
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

            <div class="row">
                <!-- Belum Dimulai -->
                <?= $this->include('task/belum'); ?>

                <!-- Sedang Berlangsung -->
                <?= $this->include('task/berlangsung'); ?>

                <!-- Selesai -->
                <?= $this->include('task/selesai'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>