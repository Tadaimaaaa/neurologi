<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Neurologi RS Bhayangkara Padang</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-wrapper {
            width: 100%;
            max-width: 420px;
        }
        .login-card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }
        .login-header {
            background-color: #1a6faf;
            color: white;
            padding: 24px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .login-header h4 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
        }
        .login-header p {
            margin: 4px 0 0;
            font-size: 0.85rem;
            opacity: 0.85;
        }
        .login-body {
            padding: 28px;
            background: white;
            border-radius: 0 0 8px 8px;
        }
        .btn-login {
            background-color: #1a6faf;
            border-color: #1a6faf;
            color: white;
            width: 100%;
            padding: 10px;
        }
        .btn-login:hover {
            background-color: #155a8a;
            border-color: #155a8a;
            color: white;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card card">
            <div class="login-header">
                <i class="fas fa-hospital fa-2x mb-2"></i>
                <h4>Sistem Informasi Neurologi</h4>
                <p>RS Bhayangkara Padang</p>
            </div>
            <div class="login-body">
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show py-2" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success py-2" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('login') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user text-muted"></i></span>
                            <input type="text" class="form-control" id="username" name="username"
                                   value="<?= old('username') ?>" placeholder="Masukkan username" required autofocus>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Masukkan password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-login">
                        <i class="fas fa-sign-in-alt me-2"></i> Masuk
                    </button>
                </form>

                <hr class="my-3">
                <div class="text-center text-muted" style="font-size: 0.8rem;">
                    <small>&copy; <?= date('Y') ?> Sistem Informasi Neurologi RS Bhayangkara Padang</small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
