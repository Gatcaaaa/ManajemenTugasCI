<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign up - Tabler</title>
    <!-- CSS files -->
    <link href="<?= base_url('dist/css/tabler.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('dist/css/tabler-flags.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('dist/css/tabler-payments.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('dist/css/tabler-vendors.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('dist/css/demo.min.css'); ?>" rel="stylesheet" />
    <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }
    </style>
</head>

<body class="d-flex flex-column">
    <script src="<?= base_url('dist/js/demo-theme.min.js'); ?>"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark">
                    <img src="<?= base_url('logo.svg'); ?>" width="110" height="32" alt="Tabler"
                        class="navbar-brand-image">
                </a>
            </div>
            <form class="card card-md" action="<?= base_url('/register/action'); ?>" method="post" autocomplete="off">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Create new account</h2>

                    <?php if ($errors = session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                        <p><?= esc($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <?php if ($validation = session()->getFlashdata('validation')): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($validation as $error): ?>
                        <p><?= esc($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>


                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="<?= old('name'); ?>"
                            placeholder="Enter name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value="<?= old('email'); ?>"
                            placeholder="Enter email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
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
                                        <path d="M22 12c-2.5 4 -5.5 6 -10 6s-7.5 -2 -10 -6s5.5 -6 10 -6s7.5 2 10 6" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" required />
                            <span class="form-check-label">Agree to the <a href="#" tabindex="-1">terms and
                                    policy</a>.</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Create new account</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-secondary mt-3">
                Already have an account? <a href="<?= base_url('login'); ?>" tabindex="-1">Sign in</a>
            </div>
        </div>
    </div>
    <!-- Tabler Core -->
    <script src="<?= base_url('dist/js/tabler.min.js'); ?>" defer></script>
    <script src="<?= base_url('dist/js/demo.min.js'); ?>" defer></script>
    <script>
    document.querySelector('.toggle-password').addEventListener('click', function(e) {
        e.preventDefault();
        const passwordField = document.querySelector('input[name="password"]');
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.querySelector('svg').setAttribute('stroke', type === 'password' ? 'currentColor' : 'transparent');
    });
    </script>
</body>

</html>