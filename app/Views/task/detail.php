<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2 mb-2"><?= esc($task['title']) ?></h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($task['title']) ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Kategori ID:
                                <?= esc($task['category_id']) ?></h6>
                            <p class="card-text"><?= esc($task['description']) ?></p>
                            <p class="card-text"><strong>Status: </strong><?= esc($task['status']) ?></p>
                            <p class="card-text"><strong>Prioritas: </strong><?= esc($task['priority']) ?></p>
                            <p class="card-text"><strong>Tanggal Jatuh Tempo: </strong><?= esc($task['due_date']) ?></p>
                            <a href="/task/edit/<?= esc($task['slug']) ?>" class="btn btn-primary">Edit</a>
                            <a href="/task" class="btn btn-success">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>