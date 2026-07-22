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
        padding: 50px 0 20px;
    }
    .header-title {
        color: #166534;
        font-weight: 800;
        font-size: 2.8rem;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .leaf-icon {
        color: #4ade80;
        font-size: 2.2rem;
    }
    .header-subtitle {
        color: #4b5563;
        font-size: 1.1rem;
        line-height: 1.6;
        max-width: 500px;
        font-weight: 500;
    }
    .header-image {
        max-height: 220px;
        object-fit: contain;
    }
    .kuis-card-container {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }
    .kuis-card {
        border-radius: 12px;
        border: 2px solid #e5e7eb;
        background: #fff;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        width: 100%;
        max-width: 600px;
        position: relative;
    }
    .kuis-card-img {
        width: 100%;
        height: auto;
        display: block;
        padding: 20px;
    }
    .btn-mulai-container {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .btn-mulai {
        background-color: #38a169;
        color: white;
        border-radius: 10px;
        padding: 12px 40px;
        font-weight: 700;
        font-size: 1.3rem;
        border: none;
        box-shadow: 0 4px 6px rgba(0,0,0,0.15);
        transition: background-color 0.3s;
    }
    .btn-mulai:hover {
        background-color: #2f855a;
        color: white;
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
        background-color: #dcfce7;
        border-radius: 15px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }
    .question-image {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
    .question-text {
        font-weight: 700;
        color: #111827;
        font-size: 1.1rem;
        margin: 0;
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
    .option-item.correct {
        border-color: #22c55e;
        color: #166534;
        background-color: #f0fdf4;
    }
    .option-item.incorrect {
        border-color: #ef4444;
        color: #991b1b;
        background-color: #fef2f2;
    }
    .icon-result {
        font-size: 1.5rem;
    }
    .icon-result.correct {
        color: #22c55e;
    }
    .icon-result.incorrect {
        color: #ef4444;
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
<div class="kuis-page" id="mainContainer">
    <div class="container">
        
        <!-- 1. LANDING SCREEN -->
        <div id="landingScreen" class="landing-screen row align-items-center">
            <div class="col-md-7 mb-4 mb-md-0">
                <h1 class="header-title">
                    Quiz Edukasi 
                    <i class="bi bi-env leaf-icon" style="transform: rotate(-15deg);"></i>
                </h1>
                <p class="header-subtitle">
                    Uji pengetahuanmu tentang lingkungan, sampah, dan cara menjaga bumi. Belajar sambil bermain, yuk!
                </p>
            </div>
            <div class="col-md-5 d-none d-md-block text-end">
                <img src="{{ asset('images/aset1kuis.png') }}" alt="Ilustrasi Anak Belajar" class="header-image">
            </div>
            
            <div class="col-12 mt-4">
                <hr style="border-color: #e5e7eb; margin: 20px 0 40px;">
                <div class="kuis-card-container">
                    <div class="kuis-card">
                        <img src="{{ asset('images/aset1kuis.png') }}" alt="Mulai Quiz" class="kuis-card-img">
                        <div class="btn-mulai-container">
                            <button onclick="startQuiz()" class="btn-mulai text-decoration-none">
                                Mulai Quiz
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. QUIZ SCREEN -->
        <div id="quizScreen" class="quiz-screen">
            <h1 class="quiz-title-top">QUIZ START!</h1>
            
            <div class="quiz-container">
                <div class="quiz-header-bar">
                    <button onclick="quitQuiz()" class="btn-kembali">← Kembali Ke Quiz</button>
                    <div class="progress-bar-container">
                        <div id="progressBar" class="progress-bar-fill"></div>
                    </div>
                </div>
                
                <div class="question-box">
                    <img id="questionImage" src="" alt="Question" class="question-image">
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
<script>
    // Quiz Data
    const questions = [
        {
            image: "{{ asset('images/aset2kuis.png') }}",
            text: "Sampah yang berasal dari sisa makanan, daun kering, dan kulit buah termasuk jenis sampah apa?",
            layout: 'list',
            options: [
                { text: "A. Sampah anorganik", isCorrect: false },
                { text: "B. Sampah Organik", isCorrect: true },
                { text: "C. Sampah B3 (Beracun dan berbahaya)", isCorrect: false },
                { text: "D. Sampah Residu", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset3kuis.png') }}",
            text: "Apa saja jenis sampah organik?",
            layout: 'grid',
            options: [
                { text: "A. BATERAI", icon: "bi-battery-half", isCorrect: false },
                { text: "C. BOTOL PLASTIK", icon: "bi-cup-straw", isCorrect: false },
                { text: "B. DAUN", icon: "bi-tree", isCorrect: true },
                { text: "D. LAMPU", icon: "bi-lightbulb", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset1kuis.png') }}",
            text: "Warna tempat sampah yang dikhususkan untuk sampah organik biasanya berwarna...",
            layout: 'list',
            options: [
                { text: "A. Merah", isCorrect: false },
                { text: "B. Kuning", isCorrect: false },
                { text: "C. Hijau", isCorrect: true },
                { text: "D. Biru", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset3kuis.png') }}",
            text: "Apa kepanjangan dari prinsip 3R dalam pengelolaan sampah?",
            layout: 'list',
            options: [
                { text: "A. Reduce, Reuse, Recycle", isCorrect: true },
                { text: "B. Redo, Return, Recycle", isCorrect: false },
                { text: "C. Reduce, Remake, Return", isCorrect: false },
                { text: "D. Recall, Reuse, Recycle", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset2kuis.png') }}",
            text: "Benda manakah yang BUKAN termasuk sampah anorganik?",
            layout: 'grid',
            options: [
                { text: "A. Kaca", icon: "bi-cup", isCorrect: false },
                { text: "C. Kaleng", icon: "bi-trash", isCorrect: false },
                { text: "B. Plastik", icon: "bi-bag", isCorrect: false },
                { text: "D. Sisa Sayur", icon: "bi-flower1", isCorrect: true }
            ]
        },
        {
            image: "{{ asset('images/aset1kuis.png') }}",
            text: "Mengapa membuang sampah sembarangan berbahaya bagi lingkungan?",
            layout: 'list',
            options: [
                { text: "A. Membuat lingkungan lebih bersih", isCorrect: false },
                { text: "B. Menyebabkan banjir dan penyakit", isCorrect: true },
                { text: "C. Menyuburkan tanah", isCorrect: false },
                { text: "D. Menambah keindahan kota", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset2kuis.png') }}",
            text: "Apa yang harus dilakukan dengan sampah botol plastik agar tidak mencemari lingkungan?",
            layout: 'list',
            options: [
                { text: "A. Dibakar di halaman rumah", isCorrect: false },
                { text: "B. Dibuang ke sungai atau laut", isCorrect: false },
                { text: "C. Didaur ulang (Recycle)", isCorrect: true },
                { text: "D. Dikubur di dalam tanah", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset3kuis.png') }}",
            text: "Contoh pemanfaatan sampah organik yang tepat adalah...",
            layout: 'grid',
            options: [
                { text: "A. Daur Ulang Plastik", icon: "bi-recycle", isCorrect: false },
                { text: "C. Dibuang ke Laut", icon: "bi-water", isCorrect: false },
                { text: "B. Dibuat Kompos", icon: "bi-flower2", isCorrect: true },
                { text: "D. Dibakar", icon: "bi-fire", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset1kuis.png') }}",
            text: "Tindakan apa yang termasuk dalam 'Reduce' (mengurangi sampah)?",
            layout: 'list',
            options: [
                { text: "A. Membawa tas belanja sendiri dari rumah", isCorrect: true },
                { text: "B. Membuat pot dari botol plastik bekas", isCorrect: false },
                { text: "C. Mengumpulkan kertas bekas untuk didaur ulang", isCorrect: false },
                { text: "D. Membeli barang dengan kemasan sekali pakai", isCorrect: false }
            ]
        },
        {
            image: "{{ asset('images/aset3kuis.png') }}",
            text: "Barang yang bisa digunakan kembali (Reuse) di bawah ini adalah...",
            layout: 'grid',
            options: [
                { text: "A. Tisu Bekas", icon: "bi-trash", isCorrect: false },
                { text: "C. Botol Kaca", icon: "bi-cup", isCorrect: true },
                { text: "B. Masker Medis", icon: "bi-bandaid", isCorrect: false },
                { text: "D. Kulit Pisang", icon: "bi-tree", isCorrect: false }
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
        landingScreen.style.display = 'flex';
    }

    function backToLanding() {
        resultScreen.style.display = 'none';
        mainContainer.classList.remove('bg-fail', 'bg-success', 'bg-excellent');
        landingScreen.style.display = 'flex';
    }

    function loadQuestion() {
        isChecked = false;
        selectedOptionIndex = null;
        
        const q = questions[currentQuestionIndex];
        
        // Update progress bar
        const progress = ((currentQuestionIndex) / questions.length) * 100;
        document.getElementById('progressBar').style.width = `${progress}%`;
        
        // Update question content
        document.getElementById('questionImage').src = q.image;
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
                alert('Pilih jawaban terlebih dahulu!');
                return;
            }
            
            isChecked = true;
            const q = questions[currentQuestionIndex];
            const isCorrect = q.options[selectedOptionIndex].isCorrect;
            
            userAnswers[currentQuestionIndex] = isCorrect;
            
            const selectedEl = document.getElementById(`option-${selectedOptionIndex}`);
            selectedEl.classList.remove('selected');
            
            if (q.layout === 'list') {
                if (isCorrect) {
                    selectedEl.classList.add('correct');
                    document.getElementById(`icon-${selectedOptionIndex}`).classList.add('bi-check-circle-fill', 'correct');
                } else {
                    selectedEl.classList.add('incorrect');
                    document.getElementById(`icon-${selectedOptionIndex}`).classList.add('bi-x-circle-fill', 'incorrect');
                }
            } else {
                // grid layout styling
                if (isCorrect) {
                    selectedEl.classList.add('correct');
                } else {
                    selectedEl.classList.add('incorrect');
                }
            }
            
            // Cute Popups using SweetAlert2
            if (isCorrect) {
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
                    }
                });
            } else {
                Swal.fire({
                    title: 'Yah, Kurang Tepat 😅',
                    html: '<div style="font-size: 4rem;">😿</div><p class="mt-2">Tetap semangat belajarnya ya!</p>',
                    confirmButtonColor: '#ef4444',
                    confirmButtonText: 'Oke',
                    showClass: {
                        popup: 'animate__animated animate__headShake'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__zoomOut'
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

    function prevQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            loadQuestion();
        }
    }

    function showResults() {
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
        } else if (score >= 70) {
            mainContainer.classList.add('bg-success');
            document.getElementById('resultSubtitle').innerText = 'Bagus! Kamu sudah cukup paham!';
            document.getElementById('resultImage').src = "{{ asset('images/aset5kuis.png') }}";
            document.getElementById('btnRestart').className = 'btn-coba-lagi yellow-theme';
            
            resultTitle.style.color = '#eab308';
            scoreCircle.style.borderColor = '#eab308';
            scoreCircle.style.color = '#ca8a04';
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
