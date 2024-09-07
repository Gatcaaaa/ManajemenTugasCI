<div class="col-12 col-md-6 col-lg">
    <h2 class="mb-3">Belum Dimulai</h2>
    <div class="mb-4">
        <div class="row row-cards">
            <?php if (empty($not_started)) : ?>
            <p>No tasks in this category.</p>
            <?php else: ?>
            <?php foreach ($not_started as $task) : ?>
            <div class="col-12">
                <div class="card card-sm">
                    <div class="ribbon ribbon-top ribbon-bookmark 
                        <?php if ($task['priority'] == 'low') : ?>
                            bg-yellow
                        <?php elseif ($task['priority'] == 'medium') : ?>
                            bg-blue
                        <?php elseif ($task['priority'] == 'high') : ?>
                            bg-red
                        <?php endif; ?>
                        ">
                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                    </div>
                    <div class="card-status-top bg-orange"></div>
                    <div class="card-body">
                        <h3 class="card-title"><?= esc($task['title']) ?></h3>
                        <div class="list-inline-item mb-2 text-secondary">
                            <!-- Menampilkan nama kategori -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-tag">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                <path
                                    d="M3 6v5.172a2 2 0 0 0 .586 1.414l7.71 7.71a2.41 2.41 0 0 0 3.408 0l5.592 -5.592a2.41 2.41 0 0 0 0 -3.408l-7.71 -7.71a2 2 0 0 0 -1.414 -.586h-5.172a3 3 0 0 0 -3 3z" />
                            </svg>
                            <?= esc($task['category_name']) ?>
                        </div>
                        <div class="text-secondary">
                            <?= esc($task['description']) ?>
                        </div>

                        <div class="divide-y-2 mt-4">
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="avatar-list avatar-list-stacked">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="link-warning">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
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
                                    <div class="col-auto text-secondary">
                                        <a href="">
                                            <span class="badge bg-green text-green-fg">Detail</span>
                                        </a>
                                    </div>
                                    <form class="col-auto" action="<?= site_url('task/delete/' . $task['id']) ?>"
                                        method="post"
                                        onsubmit="return confirm('Are you sure you want to delete this task?');">
                                        <?= csrf_field() ?>
                                        <!-- For CSRF protection -->
                                        <button type="submit" class="badge bg-red text-red-fg">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>