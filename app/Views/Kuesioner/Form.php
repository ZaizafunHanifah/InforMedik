<form method="post" action="/kuesioner/submit">
    <h3>Isi kuesioner DASS-21</h3>
    <?php foreach(['D1','D2','D3','D4','D5','D6','D7','A1','A2','A3','A4','A5','A6','A7','S1','S2','S3','S4','S5','S6','S7'] as $kode): ?>
        <label><?= $kode ?>: <input type="number" name="<?= $kode ?>" min="0" max="3" required></label><br>
    <?php endforeach; ?>
    <button type="submit">Kirim</button>
</form>
