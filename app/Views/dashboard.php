<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Dashboard</title>
  <style>
    body{font-family:system-ui,Arial;margin:0;background:#f7f7f7;display:flex;justify-content:center;align-items:center;height:100vh}
    .card{background:#fff;padding:20px;border-radius:8px;box-shadow:0 1px 6px rgba(0,0,0,.08);width:340px;text-align:center}
    .btn{display:block;padding:10px;margin:10px 0;border-radius:6px;text-decoration:none;color:#fff}
    .btn-primary{background:#007bff}
    .btn-secondary{background:#6c757d}
    .small{font-size:13px;color:#555;margin-top:8px}
  </style>
</head>
<body>
  <div class="card">
    <h2 style="margin:0 0 8px 0">Halo, <?= esc(session()->get('nama') ?? 'Pengguna') ?></h2>

    <a class="btn btn-primary" href="<?= site_url('kuesioner') ?>">Ambil Kuesioner</a>
    <a class="btn btn-secondary" href="<?= site_url('kuesioner/history') ?>">Riwayat Kuesioner</a>

    <div class="small">
      <a href="<?= site_url('logout') ?>">Logout</a>
    </div>
  </div>
</body>
</html>