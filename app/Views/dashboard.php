<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ataraxia</title>
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
            max-width: 1600px;
            margin: 0 auto;
        }

        .main-content h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            margin-bottom: 28px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .grid-col-span-2 {
            grid-column: span 2;
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
        }

        .stats-card {
            padding: 20px;
            align-self: start;
        }

        .stats-card h3 {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .stats-card p {
            font-size: 14px;
            line-height: 1.8;
            display: flex;
            justify-content: space-between;
        }

        .stats-card strong {
            color: #302592ff;
            font-size: 16px;
        }

        .actions-card a {
            display: block;
            padding: 12px;
            margin: 10px 0;
            background-color: #302592ff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
        }

        .actions-card a:hover {
            background-color: #241f7a;
        }

        /* Untuk responsivitas di layar kecil */
        @media (max-width: 1200px) {
            .card-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: 1fr;
            }
            /* Reset span agar tidak error di mobile */
            .grid-col-span-2 {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>

    <header class="header-nav">
        <div class="header-logo">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo">
            <h2>Ataraxia Dashboard</h2>
        </div>
        <a href="<?= base_url('/logout') ?>" class="logout-btn">Logout</a>
    </header>

    <main class="main-content">
        <h1>📊 Dashboard Pengguna</h1>

        <?php if (session()->getFlashdata('kuesioner_result')): ?>
            <?php $result = session()->getFlashdata('kuesioner_result'); ?>
            <div style="background: #e8f4fd; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #4ce7aeff;">
                <h3 style="color: #302592ff; margin-top: 0;">Hasil Kuesioner Terbaru (<?= $result['tanggal'] ?>)</h3>
                <p><strong>Depresi:</strong> <?= $result['dep_score'] ?> (<?= $result['dep_level'] ?>)</p>
                <p><strong>Kecemasan:</strong> <?= $result['anx_score'] ?> (<?= $result['anx_level'] ?>)</p>
                <p><strong>Stres:</strong> <?= $result['str_score'] ?> (<?= $result['str_level'] ?>)</p>
            </div>
        <?php endif; ?>

        <div class="card-grid">

            <div class="card">
                <h3>Skor Terbaru</h3>
                <canvas id="latestScoresChart"></canvas>
            </div>
            <div class="card">
                <h3>Rata-rata Skor Anda</h3>
                <canvas id="avgScoresChart"></canvas>
            </div>
            <div class="card">
                <h3>Level Kesehatan Mental</h3>
                <canvas id="levelsChart"></canvas>
            </div>

            <div class="card grid-col-span-2">
                <h3>Tren Skor (30 Hari Terakhir)</h3>
                <canvas id="trendChart"></canvas>
            </div>
            <div class="card stats-card">
                <h3>Skor Terbaru</h3>
                <p><span>Stres:</span> <strong><?= number_format($latest_result['skor_stress'] ?? 0, 2) ?></strong></p>
                <p><span>Kecemasan:</span> <strong><?= number_format($latest_result['skor_kecemasan'] ?? 0, 2) ?></strong></p>
                <p><span>Depresi:</span> <strong><?= number_format($latest_result['skor_depresi'] ?? 0, 2) ?></strong></p>
                <div class="actions-card" style="margin-top: 20px;">
                    <a href="<?= site_url('kuesioner') ?>">Ambil Kuesioner</a>
                    <a href="<?= site_url('kuesioner/history') ?>">Riwayat Kuesioner</a>
                </div>
            </div>

        </div>
    </main>

    <script>
        const latestResult = <?= json_encode($latest_result) ?>;
        const avgScores = <?= json_encode($avg_user_scores) ?>;
        const trenUser = <?= json_encode($tren_user) ?>;
        const colorPalette = ['#4ce7aeff', '#302592ff', '#ffd3b6', '#ffaaa5', '#2C3E50'];

        // Chart skor terbaru (bar)
        if (latestResult) {
            new Chart(document.getElementById('latestScoresChart'), {
                type: 'bar',
                data: {
                    labels: ['Stres', 'Kecemasan', 'Depresi'],
                    datasets: [{
                        label: 'Skor',
                        data: [latestResult.skor_stress, latestResult.skor_kecemasan, latestResult.skor_depresi],
                        backgroundColor: colorPalette.slice(0, 3),
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } }
                }
            });
        }

        // Chart rata-rata skor (bar)
        if (avgScores) {
            new Chart(document.getElementById('avgScoresChart'), {
                type: 'bar',
                data: {
                    labels: ['Stres', 'Kecemasan', 'Depresi'],
                    datasets: [{
                        label: 'Rata-rata Skor',
                        data: [parseFloat(avgScores.avg_stress || 0), parseFloat(avgScores.avg_kecemasan || 0), parseFloat(avgScores.avg_depresi || 0)],
                        backgroundColor: colorPalette.slice(0, 3),
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } }
                }
            });
        }

        // Chart level kesehatan mental (pie)
        if (latestResult) {
            const levels = [latestResult.stres_level, latestResult.kecemasan_level, latestResult.depresi_level];
            new Chart(document.getElementById('levelsChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Stres: ' + levels[0], 'Kecemasan: ' + levels[1], 'Depresi: ' + levels[2]],
                    datasets: [{
                        label: 'Level',
                        data: [1, 1, 1], // dummy data for pie
                        backgroundColor: colorPalette.slice(0, 3),
                        borderColor: '#ffffff',
                        borderWidth: 4
                    }]
                },
                options: { responsive: true, plugins: { legend: { position: 'top' } } }
            });
        }

        // Chart tren skor
        if (trenUser && trenUser.length > 0) {
            new Chart(document.getElementById('trendChart'), {
                type: 'line',
                data: {
                    labels: trenUser.map(d => d.tanggal),
                    datasets: [
                        { label: 'Stres', data: trenUser.map(d => d.skor_stress), borderColor: '#302592ff', backgroundColor: 'rgba(170, 144, 226, 0.1)', fill: true, tension: 0.4 },
                        { label: 'Kecemasan', data: trenUser.map(d => d.skor_kecemasan), borderColor: '#4ce7aeff', backgroundColor: 'rgba(168, 230, 207, 0.1)', fill: true, tension: 0.4 },
                        { label: 'Depresi', data: trenUser.map(d => d.skor_depresi), borderColor: '#ffd3b6', backgroundColor: 'rgba(255, 211, 182, 0.1)', fill: true, tension: 0.4 }
                    ]
                },
                options: { responsive: true, scales: { y: { beginAtZero: true } } }
            });
        }
    </script>
</body>
</html>