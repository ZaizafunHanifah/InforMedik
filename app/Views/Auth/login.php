<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ataraxia</title>
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:system-ui,Arial,Helvetica,sans-serif;background:#f8f9fa;min-height:100vh;display:flex;align-items:center;justify-content:center}
        .card{background:#fff;padding:36px;border-radius:14px;max-width:420px;width:100%;box-shadow:0 10px 30px rgba(0,0,0,.08)}
        .brand{text-align:center;margin-bottom:18px}
        .brand h1{font-size:20px;color:#343a40;margin-bottom:6px}
        .brand p{color:#6c757d;font-size:13px}
        .form-group{margin-bottom:16px}
        label{display:block;margin-bottom:6px;color:#495057;font-weight:500;font-size:14px}
        input[type="text"],input[type="password"]{width:100%;padding:12px 14px;border:1px solid #dee2e6;border-radius:10px;font-size:15px}
        .btn{width:100%;padding:14px;border-radius:12px;border:0;color:#fff;font-weight:600;cursor:pointer;background-image:linear-gradient(90deg,#4ce7ae 0%,#302592 51%);transition:transform .15s ease}
        .btn:active{transform:translateY(1px)}
        .msg{margin-bottom:14px;padding:10px;border-radius:8px;font-size:14px}
        .msg.error{background:#f8d7da;color:#721c24;border:1px solid #f5c6cb}
        .link-row{margin-top:12px;text-align:center;color:#6c757d;font-size:14px}
    </style>
</head>
<body>
    <div class="card">
        <div class="brand">
            <h1>Selamat Datang — Ataraxia</h1>
            <p>Masuk untuk mengisi kuesioner</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="msg error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="msg" style="background:#d4edda;color:#155724;border:1px solid #c3e6cb"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('/login') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="<?= old('nama') ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn">Masuk</button>
        </form>

        <div class="link-row">
            Belum punya akun? <a href="<?= base_url('/register') ?>">Register</a>
        </div>
    </div>

    <script>
    document.querySelector('form').addEventListener('submit', function(e){
        const btn = document.querySelector('.btn');
        btn.textContent = 'Memproses...';
        btn.disabled = true;
    });
    </script>
</body>
</html>