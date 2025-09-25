<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuesioner DASS-21</title>
    <style>
        body {
            font-family: 'Poppins', 'Roboto', sans-serif;
            background-color: #F7F9FC;
            color: #2C3E50;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }
        h1 {
            text-align: center;
            color: #302592ff;
            margin-bottom: 10px;
        }
        h2 {
            color: #302592ff;
            border-bottom: 2px solid #302592ff;
            padding-bottom: 10px;
            margin-top: 30px;
        }
        .question {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #302592ff;
        }
        .question-code {
            font-weight: bold;
            color: #302592ff;
        }
        .question-text {
            margin: 10px 0;
            font-size: 16px;
        }
        .options {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }
        .option {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        input[type="radio"] {
            margin: 0;
        }
        .submit-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #302592ff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 30px;
        }
        .submit-btn:hover {
            background-color: #241f7a;
        }
        .instructions {
            background: #e8f4fd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #4ce7aeff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kuesioner DASS-21</h1>
        <p style="text-align: center; font-size: 18px; margin-bottom: 20px;">Daftar Pertanyaan DASS-21 (Versi Indonesia)</p>

        <div class="instructions">
            <strong>Petunjuk:</strong> Baca setiap pernyataan dan pilih opsi yang paling sesuai dengan pengalaman Anda selama seminggu terakhir. Gunakan skala berikut:
            <br><br>
            0 = Tidak sama sekali<br>
            1 = Sesuai sebagian atau kadang-kadang<br>
            2 = Sesuai cukup besar atau sering<br>
            3 = Sangat sesuai atau hampir setiap saat
        </div>

        <form method="post" action="/kuesioner/submit">

            <h2>Dimensi Depresi (D1–D7)</h2>

            <div class="question">
                <div class="question-code">D1</div>
                <div class="question-text">Saya sama sekali tidak dapat merasakan perasaan positif (contoh: merasa gembira, bangga, dsb).</div>
                <div class="options">
                    <label class="option"><input type="radio" name="D1" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="D1" value="1"> 1</label>
                    <label class="option"><input type="radio" name="D1" value="2"> 2</label>
                    <label class="option"><input type="radio" name="D1" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">D2</div>
                <div class="question-text">Saya merasa sulit berinisiatif melakukan sesuatu.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="D2" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="D2" value="1"> 1</label>
                    <label class="option"><input type="radio" name="D2" value="2"> 2</label>
                    <label class="option"><input type="radio" name="D2" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">D3</div>
                <div class="question-text">Saya merasa tidak ada lagi yang bisa saya harapkan.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="D3" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="D3" value="1"> 1</label>
                    <label class="option"><input type="radio" name="D3" value="2"> 2</label>
                    <label class="option"><input type="radio" name="D3" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">D4</div>
                <div class="question-text">Saya merasa sedih dan tertekan.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="D4" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="D4" value="1"> 1</label>
                    <label class="option"><input type="radio" name="D4" value="2"> 2</label>
                    <label class="option"><input type="radio" name="D4" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">D5</div>
                <div class="question-text">Saya tidak bisa merasa antusias terhadap hal apapun.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="D5" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="D5" value="1"> 1</label>
                    <label class="option"><input type="radio" name="D5" value="2"> 2</label>
                    <label class="option"><input type="radio" name="D5" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">D6</div>
                <div class="question-text">Saya merasa diri saya tidak berharga.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="D6" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="D6" value="1"> 1</label>
                    <label class="option"><input type="radio" name="D6" value="2"> 2</label>
                    <label class="option"><input type="radio" name="D6" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">D7</div>
                <div class="question-text">Saya merasa hidup ini tidak berarti.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="D7" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="D7" value="1"> 1</label>
                    <label class="option"><input type="radio" name="D7" value="2"> 2</label>
                    <label class="option"><input type="radio" name="D7" value="3"> 3</label>
                </div>
            </div>

            <h2>Dimensi Kecemasan (A1–A7)</h2>

            <div class="question">
                <div class="question-code">A1</div>
                <div class="question-text">Saya merasa rongga mulut saya kering.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="A1" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="A1" value="1"> 1</label>
                    <label class="option"><input type="radio" name="A1" value="2"> 2</label>
                    <label class="option"><input type="radio" name="A1" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">A2</div>
                <div class="question-text">Saya merasa kesulitan bernafas (sering terengah-engah padahal tidak aktivitas fisik).</div>
                <div class="options">
                    <label class="option"><input type="radio" name="A2" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="A2" value="1"> 1</label>
                    <label class="option"><input type="radio" name="A2" value="2"> 2</label>
                    <label class="option"><input type="radio" name="A2" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">A3</div>
                <div class="question-text">Saya merasa gemetar (misalnya pada tangan).</div>
                <div class="options">
                    <label class="option"><input type="radio" name="A3" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="A3" value="1"> 1</label>
                    <label class="option"><input type="radio" name="A3" value="2"> 2</label>
                    <label class="option"><input type="radio" name="A3" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">A4</div>
                <div class="question-text">Saya merasa khawatir dengan situasi di mana saya mungkin panik atau mempermalukan diri.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="A4" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="A4" value="1"> 1</label>
                    <label class="option"><input type="radio" name="A4" value="2"> 2</label>
                    <label class="option"><input type="radio" name="A4" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">A5</div>
                <div class="question-text">Saya merasa hampir panik.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="A5" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="A5" value="1"> 1</label>
                    <label class="option"><input type="radio" name="A5" value="2"> 2</label>
                    <label class="option"><input type="radio" name="A5" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">A6</div>
                <div class="question-text">Saya menyadari detak jantung saya meskipun sedang tidak beraktivitas.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="A6" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="A6" value="1"> 1</label>
                    <label class="option"><input type="radio" name="A6" value="2"> 2</label>
                    <label class="option"><input type="radio" name="A6" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">A7</div>
                <div class="question-text">Saya merasa ketakutan tanpa alasan yang jelas.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="A7" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="A7" value="1"> 1</label>
                    <label class="option"><input type="radio" name="A7" value="2"> 2</label>
                    <label class="option"><input type="radio" name="A7" value="3"> 3</label>
                </div>
            </div>

            <h2>Dimensi Stres (S1–S7)</h2>

            <div class="question">
                <div class="question-code">S1</div>
                <div class="question-text">Saya merasa sulit untuk beristirahat.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="S1" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="S1" value="1"> 1</label>
                    <label class="option"><input type="radio" name="S1" value="2"> 2</label>
                    <label class="option"><input type="radio" name="S1" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">S2</div>
                <div class="question-text">Saya cenderung menunjukkan reaksi berlebihan terhadap suatu situasi.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="S2" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="S2" value="1"> 1</label>
                    <label class="option"><input type="radio" name="S2" value="2"> 2</label>
                    <label class="option"><input type="radio" name="S2" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">S3</div>
                <div class="question-text">Saya merasa energi saya terkuras karena terlalu cemas.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="S3" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="S3" value="1"> 1</label>
                    <label class="option"><input type="radio" name="S3" value="2"> 2</label>
                    <label class="option"><input type="radio" name="S3" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">S4</div>
                <div class="question-text">Saya merasa gelisah.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="S4" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="S4" value="1"> 1</label>
                    <label class="option"><input type="radio" name="S4" value="2"> 2</label>
                    <label class="option"><input type="radio" name="S4" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">S5</div>
                <div class="question-text">Saya merasa sulit untuk merasa tenang.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="S5" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="S5" value="1"> 1</label>
                    <label class="option"><input type="radio" name="S5" value="2"> 2</label>
                    <label class="option"><input type="radio" name="S5" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">S6</div>
                <div class="question-text">Saya sulit bersabar menghadapi gangguan ketika sedang melakukan sesuatu.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="S6" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="S6" value="1"> 1</label>
                    <label class="option"><input type="radio" name="S6" value="2"> 2</label>
                    <label class="option"><input type="radio" name="S6" value="3"> 3</label>
                </div>
            </div>

            <div class="question">
                <div class="question-code">S7</div>
                <div class="question-text">Perasaan saya mudah tergugah atau tersentuh.</div>
                <div class="options">
                    <label class="option"><input type="radio" name="S7" value="0" required> 0</label>
                    <label class="option"><input type="radio" name="S7" value="1"> 1</label>
                    <label class="option"><input type="radio" name="S7" value="2"> 2</label>
                    <label class="option"><input type="radio" name="S7" value="3"> 3</label>
                </div>
            </div>

            <button type="submit" class="submit-btn">Kirim Jawaban</button>
        </form>
    </div>
</body>
</html>
