<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Riwayat Kuesioner</title>
  <style>
    body{font-family:system-ui,Arial;margin:20px;background:#f7f7f7}
    .wrap{max-width:900px;margin:0 auto;background:#fff;padding:16px;border-radius:8px;box-shadow:0 1px 4px rgba(0,0,0,.06)}
    table{width:100%;border-collapse:collapse}
    th,td{padding:8px;border-bottom:1px solid #eee;text-align:left}
    .empty{padding:20px;color:#666}
    a.back{display:inline-block;margin-top:12px;color:#007bff;text-decoration:none}
  </style>
</head>
<body>
  <div class="wrap">
    <h2>Riwayat Kuesioner</h2>

    <?php if (empty($rows)): ?>
      <div class="empty">Belum ada riwayat kuesioner.</div>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Depresi (skor / level)</th>
            <th>Kecemasan (skor / level)</th>
            <th>Stres (skor / level)</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $r): ?>
          <tr>
            <td><?= esc($r['created_at']) ?></td>
            <td><?= esc($r['depresi_score']) ?> / <?= esc($r['depresi_level']) ?></td>
            <td><?= esc($r['kecemasan_score']) ?> / <?= esc($r['kecemasan_level']) ?></td>
            <td><?= esc($r['stres_score']) ?> / <?= esc($r['stres_level']) ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

    <a class="back" href="<?= site_url('dashboard') ?>">&larr; Kembali</a>
  </div>
</body>
</html>