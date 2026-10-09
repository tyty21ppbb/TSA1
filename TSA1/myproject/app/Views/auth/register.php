<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Task Manager</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-dark text-light d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <!-- Optional Error/Flash Message Display -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="card bg-secondary bg-opacity-10 border border-secondary p-4 rounded-4 shadow-lg">
                    <h3 class="text-center fw-bold text-white mb-4">Create Account</h3>

                    <form action="<?= base_url('register') ?>" method="POST">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="full_name" class="form-label text-secondary small">Full Name</label>
                            <input type="text" name="full_name" id="full_name" class="form-control bg-dark text-light border-secondary" placeholder="Enter your full name" value="<?= old('full_name') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label text-secondary small">Username</label>
                            <input type="text" name="username" id="username" class="form-control bg-dark text-light border-secondary" placeholder="Choose a username" value="<?= old('username') ?>" required>
                        </div>

                        <!-- ADDED EMAIL FIELD -->
                        <div class="mb-3">
                            <label for="email" class="form-label text-secondary small">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control bg-dark text-light border-secondary" placeholder="Enter your email" value="<?= old('email') ?>" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-secondary small">Password</label>
                            <input type="password" name="password" id="password" class="form-control bg-dark text-light border-secondary" placeholder="Choose a password" required>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-success py-2 fw-semibold">Sign Up</button>
                        </div>

                        <div class="text-center mb-2">
                            <span class="text-secondary small">Already have an account? </span>
                            <a href="<?= base_url('login') ?>" class="text-decoration-none text-info small fw-semibold">Sign In</a>
                        </div>

                        <div class="text-center">
                            <a href="<?= base_url('/') ?>" class="text-decoration-none text-secondary small">← Back to Home</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>