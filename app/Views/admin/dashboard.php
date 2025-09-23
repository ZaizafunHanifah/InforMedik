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
            align-self: start; /* <-- Tambahkan baris ini */
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
            <h2>Ataraxia Control Center </h2>
        </div>
        <a href="<?= base_url('/admin/logout') ?>" class="logout-btn">Logout</a>
    </header>

    <main class="main-content">
        <h1>📊 Monitoring & Insight</h1>

        <div class="card-grid">

            <div class="card">
                <h3>Distribusi Depresi</h3>
                <canvas id="depressionChart"></canvas>
            </div>
            <div class="card">
                <h3>Distribusi Stres</h3>
                <canvas id="stressChart"></canvas>
            </div>
            <div class="card">
                <h3>Distribusi Kecemasan</h3>
                <canvas id="anxietyChart"></canvas>
            </div>
            
            <div class="card grid-col-span-2"> <h3>Tren Rata-rata Skor (30 Hari Terakhir)</h3>
                <canvas id="trendChart"></canvas>
            </div>
            <div class="card stats-card"> <h3>Rata-rata Skor</h3>
                <p><span>Stres:</span> <strong><?= number_format($avg_scores['avg_stress'] ?? 0, 2) ?></strong></p>
                <p><span>Kecemasan:</span> <strong><?= number_format($avg_scores['avg_kecemasan'] ?? 0, 2) ?></strong></p>
                <p><span>Depresi:</span> <strong><?= number_format($avg_scores['avg_depresi'] ?? 0, 2) ?></strong></p>
            </div>

        </div>
    </main>

    <script>
        // Data JavaScript tidak berubah
        const distribusiStres = <?= json_encode($distribusi_stress) ?>;
        const distribusiKecemasan = <?= json_encode($distribusi_kecemasan) ?>;
        const distribusiDepresi = <?= json_encode($distribusi_depresi) ?>;
        const trenWaktu = <?= json_encode($tren_waktu) ?>;
        const colorPalette = ['#4ce7aeff', '#302592ff', '#ffd3b6', '#ffaaa5', '#2C3E50'];

        const createPieChart = (ctx, data, label) => { new Chart(ctx, { type: 'doughnut', data: { labels: data.map(d => d.level), datasets: [{ label: label, data: data.map(d => d.jumlah), backgroundColor: colorPalette, borderColor: '#ffffff', borderWidth: 4 }] }, options: { responsive: true, plugins: { legend: { position: 'top' } } } }); };
        createPieChart(document.getElementById('stressChart'), distribusiStres, 'Stres');
        createPieChart(document.getElementById('anxietyChart'), distribusiKecemasan, 'Kecemasan');
        createPieChart(document.getElementById('depressionChart'), distribusiDepresi, 'Depresi');

        new Chart(document.getElementById('trendChart'), { type: 'line', data: { labels: trenWaktu.map(d => d.tanggal), datasets: [{ label: 'Rata-rata Skor Stres', data: trenWaktu.map(d => d.avg_stress), borderColor: '#302592ff', backgroundColor: 'rgba(170, 144, 226, 0.1)', fill: true, tension: 0.4 }, { label: 'Rata-rata Skor Kecemasan', data: trenWaktu.map(d => d.avg_kecemasan), borderColor: '#4ce7aeff', backgroundColor: 'rgba(168, 230, 207, 0.1)', fill: true, tension: 0.4 }] }, options: { responsive: true, scales: { y: { beginAtZero: true } } } });
    </script>
</body>
</html>