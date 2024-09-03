<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <title>Login</title>
    <!-- CSS files -->
    <link href="<?= base_url('dist/css/tabler.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('dist/css/tabler-flags.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('dist/css/tabler-payments.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('dist/css/tabler-vendors.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('dist/css/demo.min.css') ?>" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="<?= base_url('/') ?>" class="navbar-brand navbar-brand-autodark">
                    <img src="<?= base_url('logo.svg') ?>" width="110" height="32" alt="Logo"
                        class="navbar-brand-image">
                </a>
            </div>
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

            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form action="<?= base_url('/login/action'); ?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email"
                                class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>"
                                name="email" placeholder="your@email.com" value="<?= old('email'); ?>">
                            <div id="validationJudul" class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Password</label>
                            <div class="input-group input-group-flat">
                                <input type="password"
                                    class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>"
                                    name="password" placeholder="Your password" value="<?= old('password'); ?>">
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary toggle-password" title="Show password"
                                        data-bs-toggle="tooltip">
                                        <!-- Icon Mata -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="12" r="2" />
                                            <path
                                                d="M22 12c-2.5 4 -5.5 6 -10 6s-7.5 -2 -10 -6s5.5 -6 10 -6s7.5 2 10 6" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                            <div id="validationJudul" class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" />
                                <span class="form-check-label">Remember me on this device</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" name="login" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
                <div class="text-center text-muted mt-3">
                    Don't have an account? <a href="<?= base_url('register') ?>">Sign up</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('dist/js/tabler.min.js') ?>" defer></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const togglePassword = document.querySelector('.toggle-password');
        const passwordField = document.querySelector('input[name="password"]');

        if (togglePassword && passwordField) {
            togglePassword.addEventListener('click', function(e) {
                e.preventDefault();
                const type = passwordField.type === "password" ? "text" : "password";
                passwordField.setAttribute('type', type);
                // Update icon if necessary
            });
        }
    });
    </script>
</body>

</html>