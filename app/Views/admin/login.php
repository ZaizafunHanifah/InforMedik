<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Psikotes Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-section {
            text-align: center;
            margin-bottom: 24px;
        }

        .logo-section img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .app-title {
            font-size: 22px;
            font-weight: 600;
            color: #343a40;
        }

        .login-title {
            font-size: 16px;
            color: #6c757d;
            margin-top: 4px;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
            font-weight: 500;
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-input:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        .login-button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: 0.5s;
            background-size: 200% auto;
            background-image: linear-gradient(to right, #4ce7aeff 0%, #302592ff 51%, #A8E6CF 100%);
            box-shadow: 0 4px 15px 0 rgba(170, 144, 226, 0.5);
        }

        .login-button:hover {
            background-position: right center; /* Efek animasi geser */
            transform: translateY(-2px);
            box-shadow: 0 8px 25px 0 rgba(170, 144, 226, 0.4);
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-section">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Psikotes">
            <div class="app-title">Selamat Datang di Ataraxia</div>
            <div class="login-title">Hai Ataraxianot!</div>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/admin/login') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    class="form-input"
                    placeholder="Masukkan username"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-input"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="login-button">
                Masuk ke Dashboard
            </button>
        </form>
    </div>

    <script>
        // Efek loading sederhana pada tombol submit
        document.querySelector('form').addEventListener('submit', function() {
            const button = document.querySelector('.login-button');
            button.innerHTML = 'Memproses...';
            button.disabled = true;
        });
    </script>
</body>
</html>