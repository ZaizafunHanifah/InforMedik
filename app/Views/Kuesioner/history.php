<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Kuesioner - Ataraxia</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Roboto', sans-serif;
            background-color: #F7F9FC;
            color: #2C3E50;
        }

        .header-nav {
            background-color: #302592ff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-logo {
            display: flex;
            align-items: center;
        }

        .header-logo img {
            width: 60px;
            height: 60px;
            margin-right: 15px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
        }

        .header-logo h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 600;
            color: #ffffff;
        }

        .logout-btn {
            background-color: rgba(255, 255, 255, 0.2);
            border: 2px solid white;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .main-content {
            padding: 30px 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .main-content h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            margin-bottom: 28px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #302592ff;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .history-table th,
        .history-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .history-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #302592ff;
        }

        .level-normal { color: #28a745; font-weight: 500; }
        .level-light { color: #ffc107; font-weight: 500; }
        .level-moderate { color: #fd7e14; font-weight: 500; }
        .level-severe { color: #dc3545; font-weight: 500; }
        .level-extreme { color: #6f42c1; font-weight: 500; }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        .empty-state h3 {
            color: #302592ff;
            margin-bottom: 10px;
        }

        .back-btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #302592ff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            margin-top: 20px;
        }

        .back-btn:hover {
            background-color: #241f7a;
        }

        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: 1fr;
            }
            .history-table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <header class="header-nav">
        <div class="header-logo">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo">
            <h2>Ataraxia History</h2>
        </div>
        <a href="<?= base_url('/logout') ?>" class="logout-btn">Logout</a>
    </header>

    <main class="main-content">
        <h1>📊 Riwayat Kuesioner</h1>

        <?php if (empty($rows)): ?>
            <div class="card">
                <div class="empty-state">
                    <h3>Belum Ada Riwayat</h3>
                    <p>Anda belum mengisi kuesioner DASS-21. Silakan isi kuesioner terlebih dahulu untuk melihat riwayat hasil Anda.</p>
                    <a href="<?= site_url('kuesioner') ?>" class="back-btn">Isi Kuesioner</a>
                </div>
            </div>
        <?php else: ?>
            <div class="card-grid">
                <div class="card">
                    <h3>Tren Skor Depresi</h3>
                    <canvas id="depressionChart"></canvas>
                </div>
                <div class="card">
                    <h3>Tren Skor Kecemasan</h3>
                    <canvas id="anxietyChart"></canvas>
                </div>
                <div class="card">
                    <h3>Tren Skor Stres</h3>
                    <canvas id="stressChart"></canvas>
                </div>
            </div>

            <div class="card">
                <h3>Detail Riwayat</h3>
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Depresi</th>
                            <th>Kecemasan</th>
                            <th>Stres</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $depressionData = [];
                    $anxietyData = [];
                    $stressData = [];
                    $labels = [];

                    foreach ($rows as $r):
                        $date = date('d/m/Y H:i', strtotime($r['created_at']));
                        $labels[] = $date;
                        $depressionData[] = $r['skor_depresi'];
                        $anxietyData[] = $r['skor_kecemasan'];
                        $stressData[] = $r['skor_stress'];
                    ?>
                        <tr>
                            <td><?= $date ?></td>
                            <td>
                                <strong><?= $r['skor_depresi'] ?></strong>
                                <span class="level-<?= strtolower($r['depresi_level']) ?>"> (<?= $r['depresi_level'] ?>)</span>
                            </td>
                            <td>
                                <strong><?= $r['skor_kecemasan'] ?></strong>
                                <span class="level-<?= strtolower($r['kecemasan_level']) ?>"> (<?= $r['kecemasan_level'] ?>)</span>
                            </td>
                            <td>
                                <strong><?= $r['skor_stress'] ?></strong>
                                <span class="level-<?= strtolower($r['stres_level']) ?>"> (<?= $r['stres_level'] ?>)</span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <a href="<?= site_url('dashboard') ?>" class="back-btn">&larr; Kembali ke Dashboard</a>
    </main>

    <?php if (!empty($rows)): ?>
    <script>
        const labels = <?= json_encode($labels) ?>;
        const depressionData = <?= json_encode($depressionData) ?>;
        const anxietyData = <?= json_encode($anxietyData) ?>;
        const stressData = <?= json_encode($stressData) ?>;
        const colorPalette = ['#4ce7aeff', '#302592ff', '#ffd3b6'];

        // Chart configurations
        const chartOptions = {
            responsive: true,
            scales: { y: { beginAtZero: true } },
            plugins: { legend: { display: false } }
        };

        new Chart(document.getElementById('depressionChart'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Depresi',
                    data: depressionData,
                    borderColor: '#302592ff',
                    backgroundColor: 'rgba(170, 144, 226, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: chartOptions
        });

        new Chart(document.getElementById('anxietyChart'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Kecemasan',
                    data: anxietyData,
                    borderColor: '#4ce7aeff',
                    backgroundColor: 'rgba(168, 230, 207, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: chartOptions
        });

        new Chart(document.getElementById('stressChart'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Stres',
                    data: stressData,
                    borderColor: '#ffd3b6',
                    backgroundColor: 'rgba(255, 211, 182, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: chartOptions
        });
    </script>
    <?php endif; ?>
</body>
</html>