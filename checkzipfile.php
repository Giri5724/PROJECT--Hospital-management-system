<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Shooter - Level Mode</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial Black', sans-serif;
            overflow: hidden;
            background: linear-gradient(180deg, #87CEEB 0%, #98D8E8 100%);
        }

        #gameCanvas {
            display: block;
            cursor: crosshair;
        }

        .hud {
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            pointer-events: none;
            z-index: 10;
        }

        .hud-left, .hud-right {
            display: flex;
            gap: 20px;
        }

        .hud-panel {
            background: rgba(255, 255, 255, 0.95);
            padding: 12px 25px;
            border-radius: 50px;
            border: 4px solid #333;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .score-value {
            color: #ff6600;
            font-size: 28px;
        }

        .level-value {
            color: #4CAF50;
            font-size: 28px;
        }

        .lives {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .heart {
            font-size: 32px;
        }

        .question-banner {
            position: absolute;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px 40px;
            border-radius: 20px;
            border: 5px solid white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            color: white;
            font-size: 26px;
            font-weight: bold;
            text-align: center;
            max-width: 80%;
            z-index: 8;
            animation: bounceIn 0.6s;
        }

        @keyframes bounceIn {
            0% { transform: translateX(-50%) scale(0); }
            50% { transform: translateX(-50%) scale(1.1); }
            100% { transform: translateX(-50%) scale(1); }
        }

        .fire-button {
            position: absolute;
            bottom: 50px;
            right: 50px;
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
            border: 6px solid white;
            border-radius: 50%;
            cursor: pointer;
            pointer-events: all;
            z-index: 15;
            box-shadow: 0 10px 30px rgba(255, 68, 68, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            transition: all 0.2s;
            user-select: none;
        }

        .fire-button:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 40px rgba(255, 68, 68, 0.8);
        }

        .fire-button:active {
            transform: scale(0.95);
        }

        .fire-button.cooldown {
            background: linear-gradient(135deg, #999 0%, #666 100%);
            pointer-events: none;
        }

        .scope {
            position: absolute;
            width: 150px;
            height: 150px;
            border: 4px solid rgba(255, 0, 0, 0.8);
            border-radius: 50%;
            pointer-events: none;
            z-index: 100;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.6);
        }

        .scope::before,
        .scope::after {
            content: '';
            position: absolute;
            background: rgba(255, 0, 0, 0.8);
        }

        .scope::before {
            width: 2px;
            height: 100%;
            left: 50%;
            transform: translateX(-50%);
        }

        .scope::after {
            height: 2px;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
        }

        .level-complete {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.95);
            padding: 60px;
            border-radius: 30px;
            border: 6px solid #4CAF50;
            text-align: center;
            color: white;
            display: none;
            z-index: 20;
            box-shadow: 0 0 60px rgba(76, 175, 80, 0.8);
        }

        .level-complete h1 {
            font-size: 56px;
            color: #4CAF50;
            margin-bottom: 20px;
            text-shadow: 0 0 30px rgba(76, 175, 80, 0.8);
        }

        .level-complete .stats {
            font-size: 28px;
            margin: 20px 0;
        }

        .next-btn {
            background: linear-gradient(45deg, #4CAF50, #66BB6A);
            color: white;
            border: none;
            padding: 20px 50px;
            font-size: 28px;
            border-radius: 15px;
            cursor: pointer;
            margin-top: 20px;
            pointer-events: all;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(76, 175, 80, 0.5);
            font-weight: bold;
        }

        .next-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 30px rgba(76, 175, 80, 0.7);
        }

        .hit-marker {
            position: absolute;
            pointer-events: none;
            font-size: 60px;
            font-weight: bold;
            animation: hitFloat 1s ease-out forwards;
            z-index: 15;
        }

        @keyframes hitFloat {
            0% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
            100% {
                opacity: 0;
                transform: translate(-50%, -150px) scale(1.5);
            }
        }

        .game-over {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.95);
            padding: 60px;
            border-radius: 30px;
            border: 6px solid #ff4444;
            text-align: center;
            color: white;
            display: none;
            z-index: 20;
            box-shadow: 0 0 60px rgba(255, 68, 68, 0.8);
        }

        .game-over h1 {
            font-size: 56px;
            color: #ff4444;
            margin-bottom: 20px;
        }

        .level-map {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            z-index: 20;
        }

        .level-node {
            position: absolute;
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #FFD700, #FFA500);
            border: 5px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            transition: all 0.3s;
        }

        .level-node:hover {
            transform: scale(1.2);
        }

        .level-node.completed {
            background: linear-gradient(135deg, #4CAF50, #66BB6A);
        }

        .level-node.locked {
            background: linear-gradient(135deg, #999, #666);
            cursor: not-allowed;
            opacity: 0.6;
        }
    </style>
</head>
<body>
    <canvas id="gameCanvas"></canvas>
    
    <div class="hud">
        <div class="hud-left">
            <div class="hud-panel">
                SCORE: <span class="score-value" id="score">0</span>
            </div>
            <div class="hud-panel">
                LEVEL: <span class="level-value" id="levelDisplay">1</span>
            </div>
        </div>
        <div class="hud-right">
            <div class="hud-panel">
                <div class="lives" id="lives">
                    <span class="heart">❤️</span>
                    <span class="heart">❤️</span>
                    <span class="heart">❤️</span>
                </div>
            </div>
        </div>
    </div>

    <div class="question-banner" id="questionBanner">
        Loading question...
    </div>

    <div class="fire-button" id="fireBtn">
        🔥 FIRE
    </div>

    <div class="scope" id="scope"></div>

    <div class="level-complete" id="levelComplete">
        <h1>🎯 LEVEL COMPLETE! 🎯</h1>
        <div class="stats">
            <div>Score: <span id="levelScore">0</span></div>
            <div>Accuracy: <span id="accuracy">0</span>%</div>
        </div>
        <button class="next-btn" onclick="nextLevel()">NEXT LEVEL ➡️</button>
    </div>

    <div class="game-over" id="gameOver">
        <h1>💀 GAME OVER 💀</h1>
        <div class="stats">
            <div style="font-size: 32px; margin: 20px 0;">Final Score: <span id="finalScore">0</span></div>
            <div style="font-size: 24px;">Levels Completed: <span id="levelsCompleted">0</span></div>
        </div>
        <button class="next-btn" onclick="location.reload()">🔄 RESTART</button>
    </div>

    <script>
        const canvas = document.getElementById('gameCanvas');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        // Game state
        let score = 0;
        let lives = 3;
        let currentLevel = 1;
        let currentQuestion = 0;
        let targets = [];
        let particles = [];
        let shots = 0;
        let hits = 0;
        let canShoot = true;

        // Level configurations
        const levels = [
            {
                questions: [
                    {
                        question: "What is 5 + 3?",
                        answers: ["6", "8", "10", "12"],
                        correct: 1
                    },
                    {
                        question: "Capital of France?",
                        answers: ["Berlin", "Madrid", "Paris", "Rome"],
                        correct: 2
                    },
                    {
                        question: "Which is a fruit?",
                        answers: ["Carrot", "Potato", "Apple", "Onion"],
                        correct: 2
                    }
                ],
                targetSpeed: 2,
                backgroundColor: ['#87CEEB', '#98D8E8']
            },
            {
                questions: [
                    {
                        question: "How many continents?",
                        answers: ["5", "6", "7", "8"],
                        correct: 2
                    },
                    {
                        question: "Largest planet?",
                        answers: ["Mars", "Jupiter", "Earth", "Saturn"],
                        correct: 1
                    },
                    {
                        question: "What is 12 × 3?",
                        answers: ["24", "36", "48", "32"],
                        correct: 1
                    }
                ],
                targetSpeed: 3,
                backgroundColor: ['#FFE5B4', '#FFC966']
            }
        ];

        // Target class with movement
        class Target {
            constructor(answer, index, isCorrect, speed) {
                this.answer = answer;
                this.isCorrect = isCorrect;
                this.width = 140;
                this.height = 90;
                this.speed = speed;
                this.hit = false;
                this.opacity = 1;
                this.scale = 1;
                
                // Random starting position
                const side = Math.floor(Math.random() * 4);
                switch(side) {
                    case 0: // Top
                        this.x = Math.random() * canvas.width;
                        this.y = -100;
                        this.vx = (Math.random() - 0.5) * this.speed;
                        this.vy = this.speed;
                        break;
                    case 1: // Right
                        this.x = canvas.width + 100;
                        this.y = Math.random() * canvas.height;
                        this.vx = -this.speed;
                        this.vy = (Math.random() - 0.5) * this.speed;
                        break;
                    case 2: // Bottom
                        this.x = Math.random() * canvas.width;
                        this.y = canvas.height + 100;
                        this.vx = (Math.random() - 0.5) * this.speed;
                        this.vy = -this.speed;
                        break;
                    case 3: // Left
                        this.x = -100;
                        this.y = Math.random() * canvas.height;
                        this.vx = this.speed;
                        this.vy = (Math.random() - 0.5) * this.speed;
                        break;
                }
            }

            update() {
                if (!this.hit) {
                    this.x += this.vx;
                    this.y += this.vy;
                    
                    // Bounce off edges
                    if (this.x < 0 || this.x > canvas.width) this.vx *= -1;
                    if (this.y < 0 || this.y > canvas.height) this.vy *= -1;
                } else {
                    this.opacity -= 0.05;
                    this.scale += 0.05;
                }
            }

            draw() {
                ctx.save();
                ctx.globalAlpha = this.opacity;
                ctx.translate(this.x, this.y);
                ctx.scale(this.scale, this.scale);

                // Target circle with gradient
                const gradient = ctx.createRadialGradient(0, 0, 0, 0, 0, this.width/2);
                if (this.isCorrect) {
                    gradient.addColorStop(0, '#4CAF50');
                    gradient.addColorStop(1, '#2E7D32');
                } else {
                    gradient.addColorStop(0, '#f44336');
                    gradient.addColorStop(1, '#c62828');
                }
                
                ctx.fillStyle = gradient;
                ctx.strokeStyle = 'white';
                ctx.lineWidth = 5;
                
                // Draw circle
                ctx.beginPath();
                ctx.arc(0, 0, this.width/2, 0, Math.PI * 2);
                ctx.fill();
                ctx.stroke();
                
                // Inner rings
                ctx.strokeStyle = 'rgba(255, 255, 255, 0.4)';
                ctx.lineWidth = 2;
                ctx.beginPath();
                ctx.arc(0, 0, this.width/3, 0, Math.PI * 2);
                ctx.stroke();
                
                // Text
                ctx.fillStyle = 'white';
                ctx.font = 'bold 18px Arial';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                
                // Wrap text
                const words = this.answer.split(' ');
                const lines = [];
                let currentLine = words[0];
                
                for (let i = 1; i < words.length; i++) {
                    const testLine = currentLine + ' ' + words[i];
                    const metrics = ctx.measureText(testLine);
                    if (metrics.width > this.width - 30) {
                        lines.push(currentLine);
                        currentLine = words[i];
                    } else {
                        currentLine = testLine;
                    }
                }
                lines.push(currentLine);
                
                const lineHeight = 20;
                const startY = -(lines.length - 1) * lineHeight / 2;
                
                lines.forEach((line, i) => {
                    ctx.fillText(line, 0, startY + i * lineHeight);
                });

                ctx.restore();
            }

            checkHit(x, y) {
                const dist = Math.sqrt((x - this.x) ** 2 + (y - this.y) ** 2);
                return dist < this.width/2 && !this.hit;
            }
        }

        // Particle system
        class Particle {
            constructor(x, y, color) {
                this.x = x;
                this.y = y;
                this.vx = (Math.random() - 0.5) * 15;
                this.vy = (Math.random() - 0.5) * 15;
                this.gravity = 0.5;
                this.life = 1;
                this.color = color;
                this.size = Math.random() * 8 + 3;
            }

            update() {
                this.x += this.vx;
                this.y += this.vy;
                this.vy += this.gravity;
                this.life -= 0.02;
                this.vx *= 0.98;
            }

            draw() {
                ctx.globalAlpha = this.life;
                ctx.fillStyle = this.color;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
                ctx.globalAlpha = 1;
            }
        }

        // Load question
        function loadQuestion() {
            const levelData = levels[currentLevel - 1];
            if (currentQuestion >= levelData.questions.length) {
                completeLevel();
                return;
            }

            const q = levelData.questions[currentQuestion];
            document.getElementById('questionBanner').textContent = q.question;

            targets = [];
            q.answers.forEach((answer, index) => {
                targets.push(new Target(answer, index, index === q.correct, levelData.targetSpeed));
            });
        }

        // Shooting
        function shoot(x, y) {
            if (!canShoot) return;
            
            canShoot = false;
            shots++;
            
            const fireBtn = document.getElementById('fireBtn');
            fireBtn.classList.add('cooldown');
            
            // Create muzzle flash effect
            for (let i = 0; i < 10; i++) {
                particles.push(new Particle(x, y, '#ffff00'));
            }
            
            let targetHit = false;
            targets.forEach(target => {
                if (target.checkHit(x, y)) {
                    target.hit = true;
                    targetHit = true;
                    
                    if (target.isCorrect) {
                        score += 100;
                        hits++;
                        createHitMarker(x, y, '+100', '#4CAF50');
                        
                        for (let i = 0; i < 50; i++) {
                            particles.push(new Particle(x, y, '#4CAF50'));
                        }
                        
                        setTimeout(() => {
                            currentQuestion++;
                            loadQuestion();
                        }, 800);
                    } else {
                        lives--;
                        updateLives();
                        createHitMarker(x, y, 'WRONG!', '#ff4444');
                        
                        for (let i = 0; i < 30; i++) {
                            particles.push(new Particle(x, y, '#ff4444'));
                        }
                        
                        if (lives <= 0) {
                            gameOver();
                        }
                    }
                }
            });
            
            document.getElementById('score').textContent = score;
            
            setTimeout(() => {
                canShoot = true;
                fireBtn.classList.remove('cooldown');
            }, 500);
        }

        // Fire button
        document.getElementById('fireBtn').addEventListener('click', () => {
            const scope = document.getElementById('scope');
            const rect = scope.getBoundingClientRect();
            const x = rect.left + rect.width / 2;
            const y = rect.top + rect.height / 2;
            shoot(x, y);
        });

        // Also allow clicking on canvas
        canvas.addEventListener('click', (e) => {
            shoot(e.clientX, e.clientY);
        });

        // Scope follow
        canvas.addEventListener('mousemove', (e) => {
            const scope = document.getElementById('scope');
            scope.style.left = e.clientX + 'px';
            scope.style.top = e.clientY + 'px';
        });

        function createHitMarker(x, y, text, color) {
            const marker = document.createElement('div');
            marker.className = 'hit-marker';
            marker.textContent = text;
            marker.style.left = x + 'px';
            marker.style.top = y + 'px';
            marker.style.color = color;
            marker.style.textShadow = `0 0 20px ${color}`;
            document.body.appendChild(marker);
            
            setTimeout(() => marker.remove(), 1000);
        }

        function updateLives() {
            const livesEl = document.getElementById('lives');
            livesEl.innerHTML = '';
            for (let i = 0; i < lives; i++) {
                livesEl.innerHTML += '<span class="heart">❤️</span>';
            }
        }

        function completeLevel() {
            document.getElementById('levelComplete').style.display = 'block';
            document.getElementById('levelScore').textContent = score;
            const accuracy = shots > 0 ? Math.round((hits / shots) * 100) : 0;
            document.getElementById('accuracy').textContent = accuracy;
        }

        function nextLevel() {
            currentLevel++;
            if (currentLevel > levels.length) {
                gameOver();
                return;
            }
            
            currentQuestion = 0;
            document.getElementById('levelComplete').style.display = 'none';
            document.getElementById('levelDisplay').textContent = currentLevel;
            loadQuestion();
        }

        function gameOver() {
            document.getElementById('gameOver').style.display = 'block';
            document.getElementById('finalScore').textContent = score;
            document.getElementById('levelsCompleted').textContent = currentLevel - 1;
        }

        // Draw background
        function drawBackground() {
            const levelData = levels[currentLevel - 1];
            const gradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
            gradient.addColorStop(0, levelData.backgroundColor[0]);
            gradient.addColorStop(1, levelData.backgroundColor[1]);
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            
            // Ground
            ctx.fillStyle = '#228B22';
            ctx.fillRect(0, canvas.height - 150, canvas.width, 150);
            
            // Grass effect
            ctx.fillStyle = '#32CD32';
            for (let i = 0; i < canvas.width; i += 15) {
                const height = Math.random() * 30 + 15;
                ctx.fillRect(i, canvas.height - 150, 3, -height);
            }
        }

        // Animation loop
        function animate() {
            drawBackground();

            targets.forEach(target => {
                target.update();
                target.draw();
            });

            particles = particles.filter(p => p.life > 0);
            particles.forEach(p => {
                p.update();
                p.draw();
            });

            requestAnimationFrame(animate);
        }

        // Start game
        loadQuestion();
        animate();

        // Resize handler
        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    </script>
</body>
</html>