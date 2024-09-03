<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('task/head');?>
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-xl-12">
                                    <div class="mb-3">
                                        <label class="form-label">Text</label>
                                        <input type="text" class="form-control" name="example-text-input"
                                            placeholder="Input placeholder">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Textarea <span
                                                class="form-label-description">56/100</span></label>
                                        <textarea class="form-control" name="example-textarea-input" rows="6"
                                            placeholder="Content..">Oh! Come and see the violence inherent in the system! Help, help, I'm being repressed! We shall say 'Ni' again to you, if you do not appease us. I'm not a witch. I'm not a witch. Camelot!</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label">Select</div>
                                        <select class="form-select">
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Datepicker</label>

                                        <div class="input-icon mb-2">
                                            <input class="form-control " placeholder="Select a date"
                                                id="datepicker-icon" value="2020-06-20" />
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
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
                                        <div class="mb-3">
                                            <label class="form-label">Simple selectgroup</label>
                                            <div class="form-selectgroup">
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="name" value="HTML"
                                                        class="form-selectgroup-input" checked>
                                                    <span class="form-selectgroup-label">HTML</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="name" value="CSS"
                                                        class="form-selectgroup-input">
                                                    <span class="form-selectgroup-label">CSS</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="name" value="PHP"
                                                        class="form-selectgroup-input">
                                                    <span class="form-selectgroup-label">PHP</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="name" value="JavaScript"
                                                        class="form-selectgroup-input">
                                                    <span class="form-selectgroup-label">JavaScript</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection();?>