<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('task/create/head'); ?>
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-6">
                    <form class="card" action="<?= base_url('/task/update/' . $task['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="slug" value="<?= $task['slug']; ?>">
                        <div class="card-header">
                            <h3 class="card-title">Edit Task</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Title</label>
                                <div>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="<?= old('title', $task['title']) ?>">
                                    <small class="form-hint">Edit Task Title</small>
                                    <div class="invalid-feedback"><?= $validation->getError('title'); ?></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Description</label>
                                <div>
                                    <textarea type="text" name="description"
                                        class="form-control"><?= old('description', $task['description']) ?></textarea>
                                    <small class="form-hint">Edit Task Description</small>
                                    <div class="invalid-feedback"><?= $validation->getError('description'); ?></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Kategori</label>
                                <div>
                                    <select class="form-select" name="category_id">
                                        <?php foreach ($categories as $c) : ?>
                                        <option value="<?= $c['id'] ?>"
                                            <?= old('category_id', $task['category_id']) == $c['id'] ? 'selected' : '' ?>>
                                            <?= $c['name'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-hint">Edit Task Category</small>
                                    <div class="invalid-feedback"><?= $validation->getError('category_id'); ?></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Status</label>
                                <div>
                                    <select class="form-select" name="status">
                                        <option value="not_started"
                                            <?= old('status', $task['status']) == 'not_started' ? 'selected' : '' ?>>Not
                                            Started</option>
                                        <option value="in_progress"
                                            <?= old('status', $task['status']) == 'in_progress' ? 'selected' : '' ?>>In
                                            Progress</option>
                                        <option value="completed"
                                            <?= old('status', $task['status']) == 'completed' ? 'selected' : '' ?>>
                                            Completed</option>
                                    </select>
                                    <small class="form-hint">Edit Task Status</small>
                                    <div class="invalid-feedback"><?= $validation->getError('status'); ?></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Priority</label>
                                <div>
                                    <select class="form-select" name="priority">
                                        <option value="low"
                                            <?= old('priority', $task['priority']) == 'low' ? 'selected' : '' ?>>Low
                                        </option>
                                        <option value="medium"
                                            <?= old('priority', $task['priority']) == 'medium' ? 'selected' : '' ?>>
                                            Medium</option>
                                        <option value="high"
                                            <?= old('priority', $task['priority']) == 'high' ? 'selected' : '' ?>>High
                                        </option>
                                    </select>
                                    <small class="form-hint">Edit Task Priority</small>
                                    <div class="invalid-feedback"><?= $validation->getError('priority'); ?></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Due Date</label>
                                <div class="input-icon mb-2">
                                    <input class="form-control" placeholder="Select a date" id="datepicker-icon"
                                        name="due_date" value="<?= old('due_date', $task['due_date']) ?>" />
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M4 11h16" />
                                            <path d="M11 15h1" />
                                            <path d="M12 15v3" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="invalid-feedback"><?= $validation->getError('due_date'); ?></div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="/task" class="btn btn-link">Cancel</a>
                                <button type="submit" class="btn btn-primary ms-auto">Update Task</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>