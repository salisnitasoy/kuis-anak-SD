<!doctype html>
<html lang="id" class="h-full">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Game Refleksi Ceria</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body { font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
    .card { background: linear-gradient(135deg,#fff7ed,#fffbeb); }
    .bubble { background: #fff; border-radius: 18px; box-shadow: 0 6px 18px rgba(0,0,0,0.08); }
    .star { filter: drop-shadow(0 4px 8px rgba(255,215,0,0.25)); }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-pink-100 to-purple-100">
  <main class="w-full max-w-3xl">
    <header class="mb-6 text-center">
      <h1 class="text-3xl font-extrabold text-indigo-700">🎉 Game Refleksi Ceria</h1>
      <p class="mt-2 text-indigo-600">Bacalah cerita singkat, lalu jawab pertanyaan refleksinya. Ayo berpikir dan berbagi!</p>
    </header>

    <section class="card p-6 rounded-2xl mb-6 shadow-lg">
      <h2 class="text-xl font-bold text-rose-600">Cerita: Hari Ceria di Taman</h2>
      <p class="mt-3 text-justify">Hari ini, Rani dan teman-temannya pergi ke taman. Mereka bermain layang-layang, memberi makan bebek, dan menanam satu pohon kecil bersama. Saat pulang, Rani melihat seorang anak kecil menangis karena kehilangan bonekanya. Rani berbagi permen dan membantu mencari boneka itu sampai ditemukan. Semua tersenyum dan bangga karena sudah saling menolong.</p>
      <p class="mt-3 font-medium">Waktu baca: ~1 menit</p>
    </section>

    <section id="game" class="bubble p-6 rounded-2xl">
      <form id="quizForm" autocomplete="off">
        <ol class="space-y-4">
          <li>
            <div class="flex items-start justify-between">
              <div>
                <label class="font-semibold">1. Apa hal baik yang dilakukan Rani?</label>
                <div class="mt-2 space-y-2">
                  <label class="flex items-center gap-3"><input type="radio" name="q1" value="a"> Memberi makan bebek</label>
                  <label class="flex items-center gap-3"><input type="radio" name="q1" value="b"> Menolong anak mencari boneka</label>
                  <label class="flex items-center gap-3"><input type="radio" name="q1" value="c"> Bermain layang-layang</label>
                </div>
              </div>
              <div class="text-sm text-gray-500">(Pilihan ganda)</div>
            </div>
          </li>

          <li>
            <label class="font-semibold">2. Mengapa menanam pohon itu penting?</label>
            <textarea name="q2" rows="3" class="w-full mt-2 p-2 border rounded-md" placeholder="Tulis jawaban pendek..."></textarea>
          </li>

          <li>
            <label class="font-semibold">3. Bagaimana perasaan anak yang kehilangan boneka setelah Rani membantu?</label>
            <div class="mt-2 space-y-2">
              <label class="flex items-center gap-3"><input type="radio" name="q3" value="a"> Sedih terus</label>
              <label class="flex items-center gap-3"><input type="radio" name="q3" value="b"> Marah kepada Rani</label>
              <label class="flex items-center gap-3"><input type="radio" name="q3" value="c"> Senang dan tersenyum</label>
            </div>
          </li>

          <li>
            <label class="font-semibold">4. Refleksi cepat: Sebutkan satu hal baik yang bisa kamu lakukan untuk temanmu.</label>
            <input name="q4" class="w-full mt-2 p-2 border rounded-md" placeholder="Contoh: Menolong mengerjakan PR atau bermain bersama" />
          </li>
        </ol>

        <div class="mt-6 flex gap-3">
          <button type="button" id="submitBtn" class="px-4 py-2 rounded-lg bg-rose-500 text-white font-semibold shadow-md">Kirim Jawaban</button>
          <button type="button" id="showAnswers" class="px-4 py-2 rounded-lg border border-rose-300 text-rose-600">Tunjukkan Jawaban & Penjelasan</button>
          <button type="button" id="resetBtn" class="px-4 py-2 rounded-lg bg-white border">Ulangi</button>
        </div>
      </form>

      <div id="result" class="mt-6 hidden p-4 rounded-lg bg-white shadow-sm"></div>

      <div id="answersBox" class="mt-6 hidden p-4 rounded-lg bg-gradient-to-r from-yellow-50 to-white border">
        <h3 class="font-bold text-lg text-amber-700">Jawaban & Penjelasan</h3>
        <ol class="mt-3 list-decimal pl-5 space-y-2 text-gray-800">
          <li><strong>1:</strong> <em>Menolong anak mencari boneka</em> — Rani membantu teman yang sedih, itu tindakan kebaikan. (Jawaban: b)</li>
          <li><strong>2:</strong> Contoh jawaban: <em>Menanam pohon membuat udara lebih segar, memberi rumah bagi binatang, dan membuat lingkungan lebih indah.</em></li>
          <li><strong>3:</strong> <em>Senang dan tersenyum</em> — karena bonekanya ditemukan dan ia merasa dibantu. (Jawaban: c)</li>
          <li><strong>4:</strong> Contoh: <em>Membantu tugas, bermain bersama, berbagi barang, atau menolong saat teman sedih.</em></li>
        </ol>
        <p class="mt-3 text-sm text-gray-600">Catatan: Untuk soal isian (2 & 4), tidak ada jawaban tunggal. Beri nilai berdasarkan kejujuran, empati, dan kedewasaan jawaban.</p>
      </div>
    </section>

    <footer class="mt-6 text-center text-sm text-gray-600">Untuk guru/ortu: beri pujian saat anak menjawab & ajak diskusi singkat setelah permainan.</footer>
  </main>

  <script>
    const submitBtn = document.getElementById('submitBtn');
    const resetBtn = document.getElementById('resetBtn');
    const showAnswers = document.getElementById('showAnswers');
    const result = document.getElementById('result');
    const answersBox = document.getElementById('answersBox');

    function grade(form) {
      let score = 0;
      const q1 = form.q1.value;
      const q3 = form.q3.value;
      if (q1 === 'b') score += 25;
      if (q3 === 'c') score += 25;
      // q2 and q4 are short answers: judge them lightly
      const q2 = form.q2.value.trim();
      const q4 = form.q4.value.trim();
      if (q2.length >= 10) score += 25; // jawaban bermakna
      if (q4.length >= 5) score += 25;
      return score;
    }

    submitBtn.addEventListener('click', () => {
      const form = document.forms['quizForm'];
      const s = grade(form);
      result.classList.remove('hidden');
      result.innerHTML = `<div class="font-bold text-rose-600">Nilai: ${s}/100</div>` +
                         `<div class="mt-2 text-sm text-gray-700">${feedback(s)}</div>`;
      // show answers lightly
      answersBox.classList.remove('hidden');
      // scroll to result
      result.scrollIntoView({behavior:'smooth', block:'center'});
    });

    showAnswers.addEventListener('click', () => {
      answersBox.classList.toggle('hidden');
      answersBox.scrollIntoView({behavior:'smooth', block:'center'});
    });

    resetBtn.addEventListener('click', () => {
      document.getElementById('quizForm').reset();
      result.classList.add('hidden');
      answersBox.classList.add('hidden');
    });

    function feedback(score) {
      if (score === 100) return 'Hebat! Kamu peka dan memberi jawaban yang lengkap. Ayo bagikan apa yang kamu pelajari!';
      if (score >= 75) return 'Bagus! Kamu mengerti cerita dan berpikir tentang kebaikan.';
      if (score >= 50) return 'Lumayan. Coba pikirkan lagi satu tindakan baik yang bisa kamu lakukan.';
      return 'Belajar terus ya! Ayo coba lagi setelah membaca cerita dengan teliti.';
    }
  </script>
</body>
</html>
