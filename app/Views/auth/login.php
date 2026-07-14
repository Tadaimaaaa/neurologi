<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portal Neurologi RS Bhayangkara Padang</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --font-heading: 'Plus Jakarta Sans', sans-serif;
            --font-body: 'Inter', sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: #0F172A;
            background-image: 
                radial-gradient(at 15% 15%, rgba(37, 99, 235, 0.22) 0px, transparent 50%),
                radial-gradient(at 85% 85%, rgba(6, 182, 212, 0.18) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(15, 23, 42, 0.9) 0px, transparent 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 1.5rem;
        }

        /* Decorative ambient rings */
        .ambient-ring-1 {
            position: absolute;
            top: -120px;
            right: -120px;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.14) 0%, transparent 70%);
            pointer-events: none;
        }

        .ambient-ring-2 {
            position: absolute;
            bottom: -100px;
            left: -100px;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .login-wrapper {
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 10;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 24px;
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.35),
                0 0 0 1px rgba(255, 255, 255, 0.15);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            box-shadow: 
                0 30px 60px -12px rgba(0, 0, 0, 0.45),
                0 0 0 1px rgba(255, 255, 255, 0.25);
        }

        .login-header {
            background: linear-gradient(135deg, #1E40AF 0%, #1E293B 100%);
            color: white;
            padding: 2.2rem 2rem 1.8rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
        }

        .header-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            padding: 0.35rem 0.85rem;
            border-radius: 9999px;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 1rem;
            color: #E2E8F0;
        }

        .header-badge .pulse-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #38BDF8;
            box-shadow: 0 0 8px #38BDF8;
        }

        .login-header h4 {
            font-family: var(--font-heading);
            margin: 0;
            font-size: 1.35rem;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .login-header p {
            margin: 6px 0 0;
            font-size: 0.88rem;
            color: #94A3B8;
            font-weight: 400;
        }

        .login-body {
            padding: 2.2rem;
        }

        .form-label {
            font-size: 0.84rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.45rem;
        }

        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-group-custom .icon-prefix {
            position: absolute;
            left: 14px;
            color: #64748B;
            font-size: 0.95rem;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .input-group-custom .form-control {
            padding: 0.72rem 1rem 0.72rem 2.6rem;
            border-radius: 12px;
            border: 1.5px solid #E2E8F0;
            font-size: 0.92rem;
            font-weight: 500;
            color: #0F172A;
            transition: all 0.2s ease;
            background: #F8FAFC;
        }

        .input-group-custom .form-control:focus {
            background: #FFFFFF;
            border-color: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        .input-group-custom .form-control:focus ~ .icon-prefix {
            color: #2563EB;
        }

        .password-toggle {
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            color: #64748B;
            font-size: 0.95rem;
            cursor: pointer;
            padding: 0;
            transition: color 0.2s ease;
        }

        .password-toggle:hover {
            color: #1E40AF;
        }

        .btn-login {
            font-family: var(--font-heading);
            background: linear-gradient(135deg, #2563EB 0%, #1E40AF 100%);
            border: none;
            color: white;
            width: 100%;
            padding: 0.82rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            box-shadow: 0 8px 20px -4px rgba(37, 99, 235, 0.4);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #1D4ED8 0%, #1E3A8A 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 12px 25px -4px rgba(37, 99, 235, 0.5);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .alert-custom {
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            border: none;
            padding: 0.85rem 1rem;
        }

        .alert-danger-custom {
            background-color: #FFF1F2;
            color: #BE123C;
            border-left: 4px solid #E11D48;
        }

        .alert-success-custom {
            background-color: #ECFDF5;
            color: #047857;
            border-left: 4px solid #10B981;
        }

        .footer-text {
            font-size: 0.75rem;
            color: #64748B;
            text-align: center;
            margin-top: 1.5rem;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="ambient-ring-1"></div>
    <div class="ambient-ring-2"></div>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div class="header-badge">
                    <span class="pulse-dot"></span>
                    <span>Portal Klinis Terpadu</span>
                </div>
                <h4>Sistem Neurologi RS</h4>
                <p>RS Bhayangkara Padang</p>
            </div>

            <div class="login-body">
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-custom alert-danger-custom mb-4 d-flex align-items-center justify-content-between" role="alert">
                        <div>
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <?= session()->getFlashdata('error') ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-custom alert-success-custom mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username / NIP</label>
                        <div class="input-group-custom">
                            <input type="text" class="form-control" id="username" name="username"
                                   value="<?= old('username') ?>" placeholder="Masukkan username Anda" required autofocus>
                            <i class="fas fa-user icon-prefix"></i>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group-custom">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Masukkan password Anda" required>
                            <i class="fas fa-lock icon-prefix"></i>
                            <button type="button" class="password-toggle" id="togglePassword" title="Tampilkan/Sembunyikan password">
                                <i class="fas fa-eye-slash" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">
                        <span>Masuk ke Sistem</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>

                <div class="footer-text">
                    &copy; <?= date('Y') ?> RS Bhayangkara Padang &bull; Divisi Pelayanan Neurologi
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Interactive show/hide password toggle
        document.getElementById('togglePassword')?.addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });
    </script>
</body>
</html>
