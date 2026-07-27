@extends('layouts.public')

@section('title', 'Quiz Edukasi - SDN Kondangjaya II')

@push('styles')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- Animate.css for SweetAlert animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    .kuis-page {
        font-family: 'Inter', sans-serif;
        background-color: #ffffff;
        min-height: calc(100vh - 80px);
        padding-bottom: 40px;
        transition: background-color 0.5s;
    }
    
    .kuis-page.bg-fail {
        background-color: #fee2e2;
    }
    
    .kuis-page.bg-success {
        background-color: #fef08a; /* Yellow */
    }
    
    .kuis-page.bg-excellent {
        background-color: #bbf7d0; /* Light green */
    }

    /* Landing Screen */
    .landing-screen {
        padding: 32px 0 56px;
        background:
            radial-gradient(circle at 10% 10%, rgba(187, 247, 208, .7), transparent 32%),
            radial-gradient(circle at 90% 85%, rgba(254, 240, 138, .55), transparent 30%),
            #f7fcf8;
    }
    .kuis-banner {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(300px, .85fr);
        align-items: center;
        gap: 34px;
        max-width: 1040px;
        min-height: 480px;
        margin: 0 auto;
        padding: 52px;
        overflow: hidden;
        position: relative;
        border: 1px solid rgba(22, 101, 52, .10);
        border-radius: 28px;
        background: rgba(255, 255, 255, .94);
        box-shadow: 0 24px 60px rgba(20, 83, 45, .12);
    }
    .kuis-banner::before {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        right: -100px;
        top: -110px;
        border-radius: 50%;
        background: #dcfce7;
    }
    .kuis-banner-content {
        max-width: 510px;
        position: relative;
        z-index: 2;
    }
    .kuis-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 13px;
        margin-bottom: 18px;
        border-radius: 999px;
        color: #166534;
        background: #dcfce7;
        font-size: .82rem;
        font-weight: 800;
        letter-spacing: .04em;
        text-transform: uppercase;
    }
    .kuis-banner-title {
        color: #153e2a;
        font-weight: 800;
        font-size: clamp(2.25rem, 5vw, 3.75rem);
        line-height: 1.08;
        letter-spacing: -.045em;
        margin-bottom: 18px;
    }
    .kuis-banner-subtitle {
        color: #52635a;
        font-size: 1rem;
        line-height: 1.75;
        font-weight: 500;
        margin: 0 0 26px;
    }
    .kuis-benefits {
        display: flex;
        flex-wrap: wrap;
        gap: 10px 18px;
        padding: 0;
        margin: 0 0 30px;
        list-style: none;
    }
    .kuis-benefits li {
        display: flex;
        align-items: center;
        gap: 7px;
        color: #315a43;
        font-size: .9rem;
        font-weight: 700;
    }
    .kuis-benefits i {
        color: #22c55e;
    }
    .kuis-illustration {
        min-width: 0;
        position: relative;
        z-index: 1;
    }
    .kuis-card-img-wrapper {
        width: 100%;
        aspect-ratio: 1 / 1.04;
        overflow: hidden;
        position: relative;
        border-radius: 26px;
        background: linear-gradient(145deg, #f0fdf4, #fefce8);
        box-shadow: inset 0 0 0 1px rgba(22, 101, 52, .08);
    }
    .kuis-card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: 64% center;
    }
    .btn-mulai {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
        border-radius: 14px;
        padding: 14px 24px;
        font-weight: 800;
        font-size: 1rem;
        border: none;
        box-shadow: 0 10px 22px rgba(34, 197, 94, .28);
        transition: all 0.25s ease;
    }
    .btn-mulai:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(34, 197, 94, .35);
        color: white;
    }
    .btn-mulai:focus-visible {
        outline: 3px solid rgba(34, 197, 94, .3);
        outline-offset: 4px;
    }

    @media (max-width: 768px) {
        .landing-screen {
            padding: 16px 14px 32px;
        }
        .kuis-banner {
            grid-template-columns: 1fr;
            gap: 26px;
            min-height: auto;
            padding: 28px 22px 22px;
            border-radius: 22px;
        }
        .kuis-eyebrow {
            margin-bottom: 14px;
        }
        .kuis-banner-title {
            font-size: 2.15rem;
            margin-bottom: 14px;
        }
        .kuis-banner-subtitle {
            font-size: .94rem;
            line-height: 1.65;
            margin-bottom: 20px;
        }
        .kuis-benefits {
            margin-bottom: 24px;
        }
        .btn-mulai {
            width: 100%;
        }
        .kuis-card-img-wrapper {
            aspect-ratio: 16 / 10;
            border-radius: 18px;
        }
    }

    @media (max-width: 380px) {
        .landing-screen {
            padding-left: 10px;
            padding-right: 10px;
        }
        .kuis-banner {
            padding: 24px 18px 18px;
        }
        .kuis-banner-title {
            font-size: 1.85rem;
        }
    }

    /* Quiz Screen */
    .quiz-screen {
        display: none;
        padding: 40px 0;
    }
    .quiz-title-top {
        color: #166534;
        font-weight: 900;
        font-size: 2rem;
        text-align: center;
        margin-bottom: 30px;
        text-transform: uppercase;
    }
    .quiz-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        padding: 30px;
        max-width: 800px;
        margin: 0 auto;
        border: 1px solid #e5e7eb;
    }
    .quiz-header-bar {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }
    .btn-kembali {
        background: white;
        border: 1px solid #d1d5db;
        border-radius: 30px;
        padding: 5px 15px;
        font-size: 0.85rem;
        color: #4b5563;
        font-weight: 600;
        text-decoration: none;
    }
    .progress-bar-container {
        flex-grow: 1;
        background: #e5e7eb;
        height: 10px;
        border-radius: 10px;
        overflow: hidden;
    }
    .progress-bar-fill {
        background: #22c55e;
        height: 100%;
        width: 0%;
        transition: width 0.3s ease;
    }
    .question-box {
        background-color: #f0fdf4;
        border: 1.5px solid #bbf7d0;
        border-radius: 16px;
        padding: 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 18px;
        margin-bottom: 30px;
    }
    .question-image-wrapper {
        width: 100%;
        max-width: 520px;
        border-radius: 12px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #e5e7eb;
    }
    .question-image {
        width: 100%;
        max-height: 260px;
        object-fit: contain;
        border-radius: 8px;
        display: block;
    }
    .question-text {
        font-weight: 700;
        color: #14532d;
        font-size: 1.25rem;
        margin: 0;
        line-height: 1.55;
    }
    
    .options-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .options-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }
    
    .option-item {
        border: 1px solid #d1d5db;
        border-radius: 10px;
        padding: 12px 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-weight: 600;
        color: #1f2937;
        transition: all 0.2s;
        background: white;
    }
    .option-item:hover {
        background-color: #f3f4f6;
    }
    .option-item.selected {
        border-color: #38a169;
        border-width: 2px;
    }
    /* Fixed Viewport Screen Flash Overlay */
    .screen-flash-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        pointer-events: none;
        z-index: 9999;
        display: none;
    }

    @keyframes fixedScreenBlinkGreen {
        0%, 100% {
            box-shadow: inset 0 0 80px 25px rgba(34, 197, 94, 0.75);
            background-color: rgba(240, 253, 244, 0.15);
        }
        50% {
            box-shadow: inset 0 0 20px 5px rgba(34, 197, 94, 0.2);
            background-color: rgba(255, 255, 255, 0);
        }
    }

    @keyframes fixedScreenBlinkRed {
        0%, 100% {
            box-shadow: inset 0 0 80px 25px rgba(239, 68, 68, 0.75);
            background-color: rgba(254, 226, 226, 0.15);
        }
        50% {
            box-shadow: inset 0 0 20px 5px rgba(239, 68, 68, 0.2);
            background-color: rgba(255, 255, 255, 0);
        }
    }

    .screen-flash-overlay.flash-correct {
        display: block;
        animation: fixedScreenBlinkGreen 1.2s ease-in-out infinite;
    }

    .screen-flash-overlay.flash-incorrect {
        display: block;
        animation: fixedScreenBlinkRed 1.2s ease-in-out infinite;
    }

    .option-item.correct {
        border: 2px solid #22c55e !important;
        color: #14532d !important;
        background-color: #dcfce7 !important;
        box-shadow: 0 4px 12px rgba(34, 197, 94, 0.25);
    }
    .option-item.incorrect {
        border: 2px solid #ef4444 !important;
        color: #991b1b !important;
        background-color: #fee2e2 !important;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
    }
    .icon-result {
        font-size: 1.5rem;
    }
    .icon-result.correct {
        color: #16a34a !important;
    }
    .icon-result.incorrect {
        color: #dc2626 !important;
    }
    
    .option-grid-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }
    .option-grid-icon {
        font-size: 2rem;
        color: #4b5563;
    }

    .quiz-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }
    .btn-sebelumnya {
        background: white;
        border: 1px solid #22c55e;
        color: #166534;
        border-radius: 30px;
        padding: 8px 20px;
        font-weight: 700;
    }
    .btn-periksa {
        background: #166534;
        color: white;
        border: none;
        border-radius: 30px;
        padding: 8px 30px;
        font-weight: 700;
        text-transform: uppercase;
    }

    /* Result Screen */
    .result-screen {
        display: none;
        padding: 40px 0;
    }
    .result-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        max-width: 500px;
        margin: 0 auto;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        position: relative;
    }
    .result-title {
        font-weight: 900;
        font-size: 2rem;
        margin-bottom: 5px;
        transition: color 0.3s;
    }
    .result-subtitle {
        color: #4b5563;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .result-image {
        width: 100%;
        max-width: 300px;
        height: auto;
        margin: 0 auto 20px;
        display: block;
    }
    .score-circle {
        width: 80px;
        height: 80px;
        background: white;
        border: 2px solid #ef4444;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        margin: -40px auto 30px;
        position: relative;
        z-index: 10;
        font-size: 1.2rem;
        line-height: 1;
        transition: all 0.3s;
    }
    .score-circle span {
        font-size: 0.8rem;
    }
    
    .stat-bar {
        border-radius: 10px;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 15px;
    }
    .stat-benar {
        background-color: #78c679;
    }
    .stat-salah {
        background-color: #ef4444;
    }
    
    .btn-coba-lagi {
        background-color: #ef4444;
        color: white;
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 700;
        font-size: 1.1rem;
        margin-top: 10px;
        transition: background-color 0.3s;
    }
    .btn-coba-lagi.yellow-theme {
        background-color: #eab308;
        color: white;
    }
    .btn-coba-lagi.green-theme {
        background-color: #22c55e;
        color: white;
    }
    .btn-coba-lagi i {
        margin-right: 5px;
    }
</style>
@endpush

@section('content')
<div id="screenFlashOverlay" class="screen-flash-overlay"></div>
<div class="kuis-page" id="mainContainer">
    
    <!-- 1. LANDING SCREEN -->
    <div id="landingScreen" class="landing-screen">
        <div class="container">
            <div class="kuis-banner">
                <div class="kuis-banner-content">
                    <span class="kuis-eyebrow">
                        <i class="bi bi-stars"></i>
                        Belajar sambil bermain
                    </span>
                    <h1 class="kuis-banner-title">
                        Seberapa peduli kamu dengan bumi?
                    </h1>
                    <p class="kuis-banner-subtitle">
                        Uji pengetahuanmu tentang sampah dan lingkungan melalui pertanyaan singkat yang seru.
                    </p>
                    <ul class="kuis-benefits">
                        <li><i class="bi bi-check-circle-fill"></i> 10 pertanyaan</li>
                        <li><i class="bi bi-clock-fill"></i> ± 5 menit</li>
                        <li><i class="bi bi-trophy-fill"></i> Lihat skor langsung</li>
                    </ul>
                    <button type="button" onclick="startQuiz()" class="btn-mulai">
                        Mulai Quiz
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>

                <div class="kuis-illustration">
                    <div class="kuis-card-img-wrapper">
                        <img src="{{ asset('images/aset1kuis.png') }}" alt="Mulai Quiz" class="kuis-card-img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Container for Quiz & Result Screens -->
    <div class="container">
        <!-- 2. QUIZ SCREEN -->
        <div id="quizScreen" class="quiz-screen">
            <h1 class="quiz-title-top" id="quizTitleTop">QUIZ NOMOR 1</h1>
            
            <div class="quiz-container">
                <div class="quiz-header-bar">
                    <button onclick="quitQuiz()" class="btn-kembali">← Kembali Ke Quiz</button>
                    <div class="progress-bar-container">
                        <div id="progressBar" class="progress-bar-fill"></div>
                    </div>
                </div>
                
                <div class="question-box">
                    <div id="questionImageWrapper" class="question-image-wrapper">
                        <img id="questionImage" src="" alt="Question" class="question-image">
                    </div>
                    <p id="questionText" class="question-text"></p>
                </div>
                
                <div id="optionsContainer" class="options-container">
                    <!-- Options will be rendered here via JS -->
                </div>
                
                <div class="quiz-footer">
                    <button id="btnPrev" onclick="prevQuestion()" class="btn-sebelumnya" style="visibility: hidden;">← Sebelumnya</button>
                    <button id="btnCheckAction" onclick="checkAnswer()" class="btn-periksa">CHECK</button>
                </div>
            </div>
        </div>

        <!-- 3. RESULT SCREEN -->
        <div id="resultScreen" class="result-screen">
            <div class="result-card">
                <h1 id="resultTitle" class="result-title">QUIZ COMPLETE!</h1>
                <p id="resultSubtitle" class="result-subtitle">Bagus! Kamu sudah cukup paham!</p>
                
                <img id="resultImage" src="" alt="Result" class="result-image">
                
                <div class="score-circle" id="scoreCircle">
                    <div id="scoreValue">70</div>
                    <span>/100</span>
                </div>
                
                <div class="stat-bar stat-benar">
                    <span>Benar</span>
                    <span id="correctCount">7</span>
                </div>
                
                <div class="stat-bar stat-salah">
                    <span>Salah</span>
                    <span id="wrongCount">3</span>
                </div>
                
                <button id="btnRestart" onclick="backToLanding()" class="btn-coba-lagi">
                    <i class="bi bi-arrow-clockwise"></i> Coba Lagi
                </button>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
<script>
    // Quiz Data
    const questions = [
        {
            image: "{{ asset('images/aset1kuis1.png') }}",
            text: "Sisa makanan, daun, dan kulit buah termasuk jenis sampah apa?",
            layout: 'list',
            options: [
                { text: "A. Sampah anorganik", isCorrect: false },
                { text: "B. Sampah organik", isCorrect: true },
                { text: "C. Sampah B3", isCorrect: false },
                { text: "D. Sampah residu", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset1kuis2.png') }}",
            text: "Manakah yang termasuk sampah organik?",
            layout: 'list',
            options: [
                { text: "A. Baterai", isCorrect: false },
                { text: "B. Daun", isCorrect: true },
                { text: "C. Botol plastik", isCorrect: false },
                { text: "D. Lampu", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset1kuis3.png') }}",
            text: "Botol bekas dibuat menjadi pot bunga. Ini termasuk...",
            layout: 'list',
            options: [
                { text: "A. Reduce", isCorrect: false },
                { text: "B. Reuse", isCorrect: false },
                { text: "C. Recycle", isCorrect: true },
                { text: "D. Membuang sampah", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset1kuis4.png') }}",
            text: "Sampah apa yang bisa dibuat menjadi kompos?",
            layout: 'list',
            options: [
                { text: "A. Plastik", isCorrect: false },
                { text: "B. Kaca", isCorrect: false },
                { text: "C. Sisa sayur dan daun", isCorrect: true },
                { text: "D. Kaleng", isCorrect: false }
            ]
        },
        {
            text: "Mengapa kita harus membuang sampah pada tempatnya?",
            layout: 'list',
            options: [
                { text: "A. Agar lingkungan bersih dan sehat", isCorrect: true },
                { text: "B. Agar sampah semakin banyak", isCorrect: false },
                { text: "C. Agar sungai penuh sampah", isCorrect: false },
                { text: "D. Agar halaman menjadi kotor", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset1kuis6.png') }}",
            text: "Tempat sampah organik biasanya berwarna apa?",
            layout: 'list',
            options: [
                { text: "A. Hijau", isCorrect: true },
                { text: "B. Merah", isCorrect: false },
                { text: "C. Biru", isCorrect: false },
                { text: "D. Hitam", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset1kuis7.png') }}",
            text: "Menulis di kedua sisi kertas adalah contoh...",
            layout: 'list',
            options: [
                { text: "A. Reduce", isCorrect: true },
                { text: "B. Recycle", isCorrect: false },
                { text: "C. Membuang", isCorrect: false },
                { text: "D. Membakar", isCorrect: false }
            ]
        },
        {
            text: "Siapa yang harus menjaga kebersihan lingkungan?",
            layout: 'list',
            options: [
                { text: "A. Guru saja", isCorrect: false },
                { text: "B. Petugas kebersihan saja", isCorrect: false },
                { text: "C. Semua orang", isCorrect: true },
                { text: "D. Orang dewasa saja", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset1kuis9.png') }}",
            text: "Sungai mana yang lebih baik untuk lingkungan?",
            layout: 'list',
            options: [
                { text: "A. Sungai yang bersih", isCorrect: true },
                { text: "B. Sungai yang penuh sampah", isCorrect: false },
                { text: "C. Keduanya sama", isCorrect: false },
                { text: "D. Tidak tahu", isCorrect: false }
            ]
        },
        {
            text: "Apa manfaat melakukan 3R (Reduce, Reuse, Recycle)?",
            layout: 'list',
            options: [
                { text: "A. Lingkungan menjadi bersih dan sehat", isCorrect: true },
                { text: "B. Sampah semakin banyak", isCorrect: false },
                { text: "C. Udara menjadi kotor", isCorrect: false },
                { text: "D. Sungai menjadi tersumbat", isCorrect: false }
            ]
        }
    ];

    let currentQuestionIndex = 0;
    let selectedOptionIndex = null;
    let userAnswers = []; // store true/false for each question
    let isChecked = false;

    const mainContainer = document.getElementById('mainContainer');
    const landingScreen = document.getElementById('landingScreen');
    const quizScreen = document.getElementById('quizScreen');
    const resultScreen = document.getElementById('resultScreen');

    function startQuiz() {
        currentQuestionIndex = 0;
        userAnswers = new Array(questions.length).fill(null);
        mainContainer.classList.remove('bg-fail', 'bg-success', 'bg-excellent');
        
        landingScreen.style.display = 'none';
        resultScreen.style.display = 'none';
        quizScreen.style.display = 'block';
        
        loadQuestion();
    }

    function quitQuiz() {
        quizScreen.style.display = 'none';
        landingScreen.style.display = 'block';
    }

    function backToLanding() {
        resultScreen.style.display = 'none';
        mainContainer.classList.remove('bg-fail', 'bg-success', 'bg-excellent');
        landingScreen.style.display = 'block';
    }

    function setScreenFlash(type) {
        const overlay = document.getElementById('screenFlashOverlay');
        if (!overlay) return;
        overlay.className = 'screen-flash-overlay';
        if (type) {
            overlay.classList.add(type);
        }
    }

    function loadQuestion() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        isChecked = false;
        selectedOptionIndex = null;
        setScreenFlash(null);
        
        const q = questions[currentQuestionIndex];
        
        // Update title and progress bar
        document.getElementById('quizTitleTop').innerText = `QUIZ NOMOR ${currentQuestionIndex + 1}`;
        const progress = ((currentQuestionIndex) / questions.length) * 100;
        document.getElementById('progressBar').style.width = `${progress}%`;
        
        // Update question content
        const imgWrapper = document.getElementById('questionImageWrapper');
        if (q.image) {
            imgWrapper.style.display = 'flex';
            document.getElementById('questionImage').src = q.image;
        } else {
            imgWrapper.style.display = 'none';
        }
        document.getElementById('questionText').innerText = q.text;
        
        // Update Buttons
        document.getElementById('btnPrev').style.visibility = currentQuestionIndex > 0 ? 'visible' : 'hidden';
        document.getElementById('btnCheckAction').innerText = 'CHECK';
        
        // Render Options
        const container = document.getElementById('optionsContainer');
        container.className = q.layout === 'grid' ? 'options-grid' : 'options-container';
        container.innerHTML = '';
        
        q.options.forEach((opt, index) => {
            const div = document.createElement('div');
            div.className = 'option-item';
            div.onclick = () => selectOption(index);
            
            let contentHTML = '';
            if (q.layout === 'grid') {
                contentHTML = `
                    <div class="option-grid-content">
                        <span>${opt.text}</span>
                        <i class="bi ${opt.icon} option-grid-icon"></i>
                    </div>
                `;
            } else {
                contentHTML = `<span>${opt.text}</span> <i class="bi icon-result" id="icon-${index}"></i>`;
            }
            
            div.innerHTML = contentHTML;
            div.id = `option-${index}`;
            container.appendChild(div);
        });
        
        // If already answered, show state
        if (userAnswers[currentQuestionIndex] !== null) {
            // we can auto select and check, or just not allow going back.
            // based on design, if they go back, they see their checked state
            // Let's implement that if needed. For simplicity, we can let them change answer if they haven't "CHECK"ed.
        }
    }

    function selectOption(index) {
        if (isChecked) return; // Prevent selection after checking
        
        selectedOptionIndex = index;
        
        // Remove selected class from all
        const q = questions[currentQuestionIndex];
        q.options.forEach((_, i) => {
            document.getElementById(`option-${i}`).classList.remove('selected');
        });
        
        // Add to clicked
        document.getElementById(`option-${index}`).classList.add('selected');
    }

    function checkAnswer() {
        if (!isChecked) {
            // Checking answer phase
            if (selectedOptionIndex === null) {
                Swal.fire({
                    title: 'Pilih Jawaban Dulu! 😉',
                    text: 'Silakan pilih salah satu jawaban sebelum menekan tombol CHECK.',
                    icon: 'warning',
                    confirmButtonColor: '#166534',
                    confirmButtonText: 'Mengerti',
                    showClass: {
                        popup: 'animate__animated animate__headShake'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__zoomOut'
                    }
                });
                return;
            }
            
            isChecked = true;
            const q = questions[currentQuestionIndex];
            const isCorrect = q.options[selectedOptionIndex].isCorrect;
            
            userAnswers[currentQuestionIndex] = isCorrect;
            
            // Fixed Viewport screen edge blinking flash effect
            if (isCorrect) {
                setScreenFlash('flash-correct');
            } else {
                setScreenFlash('flash-incorrect');
            }
            
            // Highlight options: only mark selected option
            q.options.forEach((opt, idx) => {
                const optionEl = document.getElementById(`option-${idx}`);
                const iconEl = document.getElementById(`icon-${idx}`);
                if (!optionEl) return;
                
                optionEl.classList.remove('selected');
                
                if (idx === selectedOptionIndex) {
                    if (isCorrect) {
                        optionEl.classList.add('correct');
                        if (iconEl) iconEl.className = 'bi bi-check-circle-fill icon-result correct';
                    } else {
                        optionEl.classList.add('incorrect');
                        if (iconEl) iconEl.className = 'bi bi-x-circle-fill icon-result incorrect';
                    }
                }
            });
            
            // Cute Popups using SweetAlert2 & Confetti Effect
            if (isCorrect) {
                if (typeof confetti === 'function') {
                    confetti({
                        particleCount: 100,
                        spread: 75,
                        origin: { y: 0.6 }
                    });
                }

                Swal.fire({
                    title: 'Hore! Jawabanmu Benar! 🎉',
                    html: '<div style="font-size: 4rem;">🌟😺🌟</div>',
                    confirmButtonColor: '#22c55e',
                    confirmButtonText: 'Lanjut',
                    showClass: {
                        popup: 'animate__animated animate__tada'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__zoomOut'
                    },
                    didClose: () => {
                        setScreenFlash(null);
                    }
                });
            } else {
                Swal.fire({
                    title: 'Yah, Kurang Tepat 😔',
                    html: '<div style="font-size: 4rem;">😿</div><p class="mt-2">Jangan menyerah, kamu bisa mencoba lagi!</p>',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    confirmButtonText: '🔄 Coba Lagi',
                    cancelButtonColor: '#6b7280',
                    cancelButtonText: 'Lanjut',
                    showClass: {
                        popup: 'animate__animated animate__headShake'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__zoomOut'
                    },
                    didClose: () => {
                        setScreenFlash(null);
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        resetCurrentQuestion();
                    }
                });
            }
            
            // Update button text
            const btnCheckAction = document.getElementById('btnCheckAction');
            if (currentQuestionIndex === questions.length - 1) {
                btnCheckAction.innerText = 'SELESAI';
            } else {
                btnCheckAction.innerText = 'SELANJUTNYA';
            }
            
        } else {
            // Next question phase
            if (currentQuestionIndex < questions.length - 1) {
                currentQuestionIndex++;
                loadQuestion();
            } else {
                showResults();
            }
        }
    }

    function resetCurrentQuestion() {
        isChecked = false;
        selectedOptionIndex = null;
        userAnswers[currentQuestionIndex] = null;
        loadQuestion();
    }

    function prevQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            loadQuestion();
        }
    }

    function showResults() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        quizScreen.style.display = 'none';
        resultScreen.style.display = 'block';
        
        const correctCount = userAnswers.filter(a => a === true).length;
        const total = questions.length;
        const score = (correctCount / total) * 100;
        const wrongCount = total - correctCount;
        
        document.getElementById('scoreValue').innerText = score;
        document.getElementById('correctCount').innerText = correctCount;
        document.getElementById('wrongCount').innerText = wrongCount;
        
        mainContainer.classList.remove('bg-fail', 'bg-success', 'bg-excellent');
        
        const resultTitle = document.getElementById('resultTitle');
        const scoreCircle = document.getElementById('scoreCircle');
        
        if (score >= 90) {
            mainContainer.classList.add('bg-excellent');
            document.getElementById('resultSubtitle').innerText = 'Hebat! Kamu luar biasa!';
            document.getElementById('resultImage').src = "{{ asset('images/aset6kuis.png') }}";
            document.getElementById('btnRestart').className = 'btn-coba-lagi green-theme';
            
            resultTitle.style.color = '#16a34a';
            scoreCircle.style.borderColor = '#22c55e';
            scoreCircle.style.color = '#16a34a';

            if (typeof confetti === 'function') {
                confetti({ particleCount: 150, spread: 100, origin: { y: 0.5 } });
            }
        } else if (score >= 70) {
            mainContainer.classList.add('bg-success');
            document.getElementById('resultSubtitle').innerText = 'Bagus! Kamu sudah cukup paham!';
            document.getElementById('resultImage').src = "{{ asset('images/aset5kuis.png') }}";
            document.getElementById('btnRestart').className = 'btn-coba-lagi yellow-theme';
            
            resultTitle.style.color = '#eab308';
            scoreCircle.style.borderColor = '#eab308';
            scoreCircle.style.color = '#ca8a04';

            if (typeof confetti === 'function') {
                confetti({ particleCount: 80, spread: 80, origin: { y: 0.6 } });
            }
        } else {
            mainContainer.classList.add('bg-fail');
            document.getElementById('resultSubtitle').innerText = 'Terus belajar, kamu pasti bisa!';
            document.getElementById('resultImage').src = "{{ asset('images/aset4kuis.png') }}";
            document.getElementById('btnRestart').className = 'btn-coba-lagi';
            
            resultTitle.style.color = '#ef4444';
            scoreCircle.style.borderColor = '#ef4444';
            scoreCircle.style.color = '#ef4444';
        }
    }
</script>
@endpush