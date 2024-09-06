<div class="col-12 col-md-6 col-lg">
    <h2 class="mb-3">Belum Dimulai</h2>
    <div class="mb-4">
        <div class="row row-cards">
            <?php if (empty($tasks)) : ?>
            <p>No tasks in this category.</p>
            <?php else: ?>
            <?php foreach ($tasks as $task) : ?>
            <div class="col-12">
                <div class="card card-sm">
                    <div class="card-status-top bg-orange"></div>
                    <div class="card-body">
                        <h3 class="card-title"><?= esc($task['title']) ?></h3>
                        <div class="text-secondary">
                            <?= esc($task['description']) ?>
                        </div>
                        <div class="mt-4">
                            <!-- Add more details or actions here -->
                            <a href="#" class="link-warning">
                                <!-- SVG icon -->
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
                                <?= esc($task['due_date']) ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>