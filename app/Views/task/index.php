<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<!-- Head -->
<?= $this->include('task/head');?>
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <!-- Belum Dimulai -->
                <?= $this->include('task/belum');?>
                <!-- Sedang Berlangsung -->
                <?= $this->include('task/berlangsung'); ?>
                <!-- Selesai -->
                <?= $this->include('task/selesai'); ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>