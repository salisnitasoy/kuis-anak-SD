<!doctype html>
<html lang="id">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kuis Pintar Anak SD</title>
  <script src="/_sdk/element_sdk.js"></script>
  <style>
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        html {
            height: 100%;
        }
        
        .container {
            background: white;
            border-radius: 24px;
            padding: 40px;
            max-width: 600px;
            width: 90%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        h1 {
            color: #5a67d8;
            font-size: 36px;
            margin: 0 0 10px 0;
        }
        
        .welcome-text {
            color: #4a5568;
            font-size: 18px;
            margin: 0;
        }
        
        .score-board {
            background: #f7fafc;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-around;
            border: 2px solid #e2e8f0;
        }
        
        .score-item {
            text-align: center;
        }
        
        .score-label {
            color: #718096;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .score-value {
            color: #2d3748;
            font-size: 24px;
            font-weight: bold;
        }
        
        .question-card {
            background: #edf2f7;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 25px;
        }
        
        .question-number {
            color: #5a67d8;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .question-text {
            color: #2d3748;
            font-size: 22px;
            margin: 0 0 20px 0;
            line-height: 1.4;
        }
        
        .options {
            display: grid;
            gap: 12px;
        }
        
        .option-btn {
            background: white;
            border: 3px solid #cbd5e0;
            border-radius: 12px;
            padding: 15px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: left;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        
        .option-btn:hover {
            border-color: #5a67d8;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(90, 103, 216, 0.3);
        }
        
        .option-btn.correct {
            background: #48bb78;
            border-color: #48bb78;
            color: white;
        }
        
        .option-btn.wrong {
            background: #f56565;
            border-color: #f56565;
            color: white;
        }
        
        .option-btn:disabled {
            cursor: not-allowed;
            opacity: 0.7;
        }
        
        .action-btn {
            background: #5a67d8;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 15px 40px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: block;
            margin: 0 auto;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        
        .action-btn:hover {
            background: #4c51bf;
            transform: scale(1.05);
        }
        
        .result-card {
            text-align: center;
            padding: 30px;
        }
        
        .result-emoji {
            font-size: 80px;
            margin-bottom: 20px;
        }
        
        .result-title {
            color: #2d3748;
            font-size: 32px;
            margin: 0 0 15px 0;
        }
        
        .result-score {
            color: #5a67d8;
            font-size: 48px;
            font-weight: bold;
            margin: 0 0 10px 0;
        }
        
        .result-message {
            color: #4a5568;
            font-size: 18px;
            margin: 0 0 30px 0;
        }
        
        .feedback {
            background: #bee3f8;
            border-radius: 12px;
            padding: 15px;
            margin-top: 15px;
            color: #2c5282;
            font-size: 16px;
            text-align: center;
        }
        
        .hidden {
            display: none;
        }
    </style>
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body>
  <main class="container">
   <div id="welcomeScreen">
    <div class="header">
     <h1 id="gameTitle">🎮 Kuis Pintar Anak SD</h1>
     <p class="welcome-text" id="welcomeText">Ayo uji pengetahuanmu dengan 10 pertanyaan seru!</p>
    </div><button class="action-btn" id="startBtn">Mulai Bermain</button>
   </div>
   <div id="quizScreen" class="hidden">
    <div class="score-board">
     <div class="score-item">
      <div class="score-label">
       Pertanyaan
      </div>
      <div class="score-value" id="questionCounter">
       1/10
      </div>
     </div>
     <div class="score-item">
      <div class="score-label">
       Skor
      </div>
      <div class="score-value" id="scoreDisplay">
       0
      </div>
     </div>
    </div>
    <div class="question-card">
     <div class="question-number" id="questionNumber">
      Pertanyaan 1
     </div>
     <h2 class="question-text" id="questionText"></h2>
     <div class="options" id="optionsContainer"></div>
     <div id="feedbackArea"></div>
    </div><button class="action-btn hidden" id="nextBtn">Lanjut</button>
   </div>
   <div id="resultScreen" class="hidden">
    <div class="result-card">
     <div class="result-emoji" id="resultEmoji">
      🎉
     </div>
     <h2 class="result-title">Kuis Selesai!</h2>
     <div class="result-score" id="finalScore">
      0/10
     </div>
     <p class="result-message" id="resultMessage"></p><button class="action-btn" id="retryBtn">Main Lagi</button>
    </div>
   </div>
  </main>
  <script>
        const defaultConfig = {
            game_title: "🎮 Kuis Pintar Anak SD",
            welcome_text: "Ayo uji pengetahuanmu dengan 10 pertanyaan seru!",
            start_button_text: "Mulai Bermain",
            next_button_text: "Lanjut",
            retry_button_text: "Main Lagi",
            primary_color: "#5a67d8",
            surface_color: "#edf2f7",
            text_color: "#2d3748",
            correct_color: "#48bb78",
            wrong_color: "#f56565",
            font_family: "Comic Sans MS",
            font_size: 16
        };

        let config = { ...defaultConfig };

        const questions = [
            {
                question: "Berapa hasil dari 7 + 8?",
                options: ["13", "14", "15", "16"],
                correct: 2,
                explanation: "7 + 8 = 15 ✓"
            },
            {
                question: "Hewan apa yang bisa hidup di darat dan air?",
                options: ["Kucing", "Katak", "Ayam", "Sapi"],
                correct: 1,
                explanation: "Katak adalah hewan amfibi yang bisa hidup di darat dan air 🐸"
            },
            {
                question: "Ibu kota Indonesia adalah...",
                options: ["Bandung", "Surabaya", "Jakarta", "Medan"],
                correct: 2,
                explanation: "Jakarta adalah ibu kota negara Indonesia 🇮🇩"
            },
            {
                question: "Berapa jumlah sisi pada segitiga?",
                options: ["2", "3", "4", "5"],
                correct: 1,
                explanation: "Segitiga memiliki 3 sisi 📐"
            },
            {
                question: "Planet terdekat dengan matahari adalah...",
                options: ["Venus", "Bumi", "Merkurius", "Mars"],
                correct: 2,
                explanation: "Merkurius adalah planet terdekat dengan matahari ☀️"
            },
            {
                question: "Berapa hasil dari 12 - 5?",
                options: ["6", "7", "8", "9"],
                correct: 1,
                explanation: "12 - 5 = 7 ✓"
            },
            {
                question: "Apa warna daun pada umumnya?",
                options: ["Merah", "Kuning", "Hijau", "Biru"],
                correct: 2,
                explanation: "Daun umumnya berwarna hijau karena mengandung klorofil 🍃"
            },
            {
                question: "Berapa hasil dari 3 × 4?",
                options: ["10", "11", "12", "13"],
                correct: 2,
                explanation: "3 × 4 = 12 ✓"
            },
            {
                question: "Hewan apa yang dikenal sebagai raja hutan?",
                options: ["Harimau", "Singa", "Gajah", "Beruang"],
                correct: 1,
                explanation: "Singa dikenal sebagai raja hutan 🦁"
            },
            {
                question: "Berapa hari dalam satu minggu?",
                options: ["5", "6", "7", "8"],
                correct: 2,
                explanation: "Satu minggu ada 7 hari 📅"
            }
        ];

        let currentQuestion = 0;
        let score = 0;
        let answered = false;

        const welcomeScreen = document.getElementById('welcomeScreen');
        const quizScreen = document.getElementById('quizScreen');
        const resultScreen = document.getElementById('resultScreen');
        const startBtn = document.getElementById('startBtn');
        const nextBtn = document.getElementById('nextBtn');
        const retryBtn = document.getElementById('retryBtn');

        function applyConfig(newConfig) {
            const titleElement = document.getElementById('gameTitle');
            const welcomeTextElement = document.getElementById('welcomeText');
            const startBtnElement = document.getElementById('startBtn');
            const nextBtnElement = document.getElementById('nextBtn');
            const retryBtnElement = document.getElementById('retryBtn');

            const customFont = newConfig.font_family || defaultConfig.font_family;
            const baseFontStack = 'cursive, sans-serif';
            const baseSize = newConfig.font_size || defaultConfig.font_size;

            document.body.style.fontFamily = `${customFont}, ${baseFontStack}`;
            document.body.style.fontSize = `${baseSize}px`;

            titleElement.textContent = newConfig.game_title || defaultConfig.game_title;
            titleElement.style.color = newConfig.primary_color || defaultConfig.primary_color;
            titleElement.style.fontSize = `${baseSize * 2.25}px`;

            welcomeTextElement.textContent = newConfig.welcome_text || defaultConfig.welcome_text;
            welcomeTextElement.style.color = newConfig.text_color || defaultConfig.text_color;
            welcomeTextElement.style.fontSize = `${baseSize * 1.125}px`;

            startBtnElement.textContent = newConfig.start_button_text || defaultConfig.start_button_text;
            startBtnElement.style.backgroundColor = newConfig.primary_color || defaultConfig.primary_color;
            startBtnElement.style.fontSize = `${baseSize * 1.25}px`;

            nextBtnElement.textContent = newConfig.next_button_text || defaultConfig.next_button_text;
            nextBtnElement.style.backgroundColor = newConfig.primary_color || defaultConfig.primary_color;
            nextBtnElement.style.fontSize = `${baseSize * 1.25}px`;

            retryBtnElement.textContent = newConfig.retry_button_text || defaultConfig.retry_button_text;
            retryBtnElement.style.backgroundColor = newConfig.primary_color || defaultConfig.primary_color;
            retryBtnElement.style.fontSize = `${baseSize * 1.25}px`;

            const questionCards = document.querySelectorAll('.question-card');
            questionCards.forEach(card => {
                card.style.backgroundColor = newConfig.surface_color || defaultConfig.surface_color;
            });

            const questionTexts = document.querySelectorAll('.question-text');
            questionTexts.forEach(text => {
                text.style.color = newConfig.text_color || defaultConfig.text_color;
                text.style.fontSize = `${baseSize * 1.375}px`;
            });

            const questionNumbers = document.querySelectorAll('.question-number');
            questionNumbers.forEach(num => {
                num.style.color = newConfig.primary_color || defaultConfig.primary_color;
            });

            const scoreValues = document.querySelectorAll('.score-value');
            scoreValues.forEach(val => {
                val.style.color = newConfig.text_color || defaultConfig.text_color;
            });
        }

        async function onConfigChange(newConfig) {
            applyConfig(newConfig);
        }

        function mapToCapabilities(config) {
            return {
                recolorables: [
                    {
                        get: () => config.primary_color || defaultConfig.primary_color,
                        set: (value) => {
                            config.primary_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ primary_color: value });
                            }
                        }
                    },
                    {
                        get: () => config.surface_color || defaultConfig.surface_color,
                        set: (value) => {
                            config.surface_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ surface_color: value });
                            }
                        }
                    },
                    {
                        get: () => config.text_color || defaultConfig.text_color,
                        set: (value) => {
                            config.text_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ text_color: value });
                            }
                        }
                    },
                    {
                        get: () => config.correct_color || defaultConfig.correct_color,
                        set: (value) => {
                            config.correct_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ correct_color: value });
                            }
                        }
                    },
                    {
                        get: () => config.wrong_color || defaultConfig.wrong_color,
                        set: (value) => {
                            config.wrong_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ wrong_color: value });
                            }
                        }
                    }
                ],
                borderables: [],
                fontEditable: {
                    get: () => config.font_family || defaultConfig.font_family,
                    set: (value) => {
                        config.font_family = value;
                        if (window.elementSdk) {
                            window.elementSdk.setConfig({ font_family: value });
                        }
                    }
                },
                fontSizeable: {
                    get: () => config.font_size || defaultConfig.font_size,
                    set: (value) => {
                        config.font_size = value;
                        if (window.elementSdk) {
                            window.elementSdk.setConfig({ font_size: value });
                        }
                    }
                }
            };
        }

        function mapToEditPanelValues(config) {
            return new Map([
                ["game_title", config.game_title || defaultConfig.game_title],
                ["welcome_text", config.welcome_text || defaultConfig.welcome_text],
                ["start_button_text", config.start_button_text || defaultConfig.start_button_text],
                ["next_button_text", config.next_button_text || defaultConfig.next_button_text],
                ["retry_button_text", config.retry_button_text || defaultConfig.retry_button_text]
            ]);
        }

        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig,
                onConfigChange,
                mapToCapabilities,
                mapToEditPanelValues
            });
        }

        function startQuiz() {
            welcomeScreen.classList.add('hidden');
            quizScreen.classList.remove('hidden');
            currentQuestion = 0;
            score = 0;
            answered = false;
            loadQuestion();
        }

        function loadQuestion() {
            const q = questions[currentQuestion];
            answered = false;
            
            document.getElementById('questionCounter').textContent = `${currentQuestion + 1}/10`;
            document.getElementById('scoreDisplay').textContent = score;
            document.getElementById('questionNumber').textContent = `Pertanyaan ${currentQuestion + 1}`;
            document.getElementById('questionText').textContent = q.question;
            document.getElementById('feedbackArea').innerHTML = '';
            nextBtn.classList.add('hidden');
            
            const optionsContainer = document.getElementById('optionsContainer');
            optionsContainer.innerHTML = '';
            
            q.options.forEach((option, index) => {
                const btn = document.createElement('button');
                btn.className = 'option-btn';
                btn.textContent = option;
                btn.onclick = () => checkAnswer(index);
                optionsContainer.appendChild(btn);
            });
        }

        function checkAnswer(selected) {
            if (answered) return;
            
            answered = true;
            const q = questions[currentQuestion];
            const buttons = document.querySelectorAll('.option-btn');
            
            buttons.forEach((btn, index) => {
                btn.disabled = true;
                if (index === q.correct) {
                    btn.classList.add('correct');
                    btn.style.backgroundColor = config.correct_color || defaultConfig.correct_color;
                    btn.style.borderColor = config.correct_color || defaultConfig.correct_color;
                }
            });
            
            if (selected === q.correct) {
                score += 10;
                document.getElementById('scoreDisplay').textContent = score;
                document.getElementById('feedbackArea').innerHTML = 
                    `<div class="feedback">✅ Benar! ${q.explanation}</div>`;
            } else {
                buttons[selected].classList.add('wrong');
                buttons[selected].style.backgroundColor = config.wrong_color || defaultConfig.wrong_color;
                buttons[selected].style.borderColor = config.wrong_color || defaultConfig.wrong_color;
                document.getElementById('feedbackArea').innerHTML = 
                    `<div class="feedback">❌ Salah! Jawaban yang benar: ${q.options[q.correct]}. ${q.explanation}</div>`;
            }
            
            nextBtn.classList.remove('hidden');
        }

        function nextQuestion() {
            currentQuestion++;
            
            if (currentQuestion < questions.length) {
                loadQuestion();
            } else {
                showResult();
            }
        }

        function showResult() {
            quizScreen.classList.add('hidden');
            resultScreen.classList.remove('hidden');
            
            const percentage = (score / 100) * 100;
            let emoji = '🎉';
            let message = '';
            
            if (percentage === 100) {
                emoji = '🏆';
                message = 'Sempurna! Kamu hebat sekali!';
            } else if (percentage >= 80) {
                emoji = '⭐';
                message = 'Bagus sekali! Terus belajar ya!';
            } else if (percentage >= 60) {
                emoji = '👍';
                message = 'Lumayan! Masih bisa lebih baik lagi!';
            } else {
                emoji = '💪';
                message = 'Jangan menyerah! Coba lagi ya!';
            }
            
            document.getElementById('resultEmoji').textContent = emoji;
            document.getElementById('finalScore').textContent = `${score}/100`;
            document.getElementById('finalScore').style.color = config.primary_color || defaultConfig.primary_color;
            document.getElementById('resultMessage').textContent = message;
        }

        function retry() {
            resultScreen.classList.add('hidden');
            welcomeScreen.classList.remove('hidden');
        }

        startBtn.addEventListener('click', startQuiz);
        nextBtn.addEventListener('click', nextQuestion);
        retryBtn.addEventListener('click', retry);

        applyConfig(config);
    </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9a03d847950e490a',t:'MTc2MzQzMDkxOC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>