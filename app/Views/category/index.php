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
                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-simple">
                            <?= $c['name'] ?>
                        </a>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi beatae delectus deleniti
                    dolorem eveniet facere fuga iste nemo nesciunt nihil odio perspiciatis, quia quis reprehenderit sit
                    tempora totam unde.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>