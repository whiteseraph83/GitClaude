<?php
// Set PHP timezone
date_default_timezone_set('Europe/Rome');

// Get current time for greeting
$hour = date('H');
$greeting = $hour < 12 ? '☀️ Buongiorno' : ($hour < 18 ? '🌤️ Buon pomeriggio' : '🌙 Buonasera');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World - PHP + Tailwind</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'gradient': 'gradient 8s ease infinite',
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 3s infinite',
                        'spin-slow': 'spin 8s linear infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                    },
                    keyframes: {
                        gradient: {
                            '0%, 100%': {
                                'background-size': '200% 200%',
                                'background-position': 'left center'
                            },
                            '50%': {
                                'background-size': '200% 200%',
                                'background-position': 'right center'
                            },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 1s ease-out;
        }

        .text-gradient {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #667eea 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient 8s ease infinite;
        }

        .bg-gradient-animated {
            background: linear-gradient(270deg, #667eea, #764ba2, #f093fb, #4facfe);
            background-size: 800% 800%;
            animation: gradient 15s ease infinite;
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        @keyframes float-particles {
            0% {
                transform: translateY(100vh) scale(0);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) scale(1);
                opacity: 0;
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-animated overflow-hidden relative">
    <!-- Animated Particles Background -->
    <div id="particles-container" class="absolute inset-0 overflow-hidden pointer-events-none"></div>

    <!-- Main Content -->
    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="text-center fade-in-up">
            <!-- Greeting -->
            <div class="mb-8 animate-bounce-slow">
                <span class="text-white text-3xl md:text-4xl font-light">
                    <?php echo $greeting; ?>
                </span>
            </div>

            <!-- Main Hello World Card -->
            <div class="glass rounded-3xl shadow-2xl p-8 md:p-16 max-w-4xl mx-auto transform hover:scale-105 transition-transform duration-300">
                <!-- Decorative Elements -->
                <div class="flex justify-center mb-8 space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full animate-float"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-full animate-float" style="animation-delay: 0.5s;"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-400 to-purple-400 rounded-full animate-float" style="animation-delay: 1s;"></div>
                </div>

                <!-- Hello World Text -->
                <h1 class="text-6xl md:text-8xl font-bold mb-6 text-gradient">
                    Hello World!
                </h1>

                <!-- Subtitle -->
                <p class="text-white text-xl md:text-2xl mb-8 font-light">
                    🚀 Powered by <span class="font-bold">PHP</span> +
                    <span class="font-bold">Tailwind CSS</span>
                </p>

                <!-- Info Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-12">
                    <!-- PHP Info -->
                    <div class="glass rounded-xl p-6 transform hover:scale-110 transition-all duration-300 hover:shadow-xl">
                        <div class="text-4xl mb-3 animate-pulse-slow">🐘</div>
                        <h3 class="text-white font-bold text-lg mb-2">PHP Version</h3>
                        <p class="text-purple-200 text-sm"><?php echo phpversion(); ?></p>
                    </div>

                    <!-- Server Time -->
                    <div class="glass rounded-xl p-6 transform hover:scale-110 transition-all duration-300 hover:shadow-xl" style="animation-delay: 0.2s;">
                        <div class="text-4xl mb-3 animate-spin-slow">⏰</div>
                        <h3 class="text-white font-bold text-lg mb-2">Server Time</h3>
                        <p class="text-purple-200 text-sm" id="time"><?php echo date('H:i:s'); ?></p>
                    </div>

                    <!-- Status -->
                    <div class="glass rounded-xl p-6 transform hover:scale-110 transition-all duration-300 hover:shadow-xl" style="animation-delay: 0.4s;">
                        <div class="text-4xl mb-3 animate-bounce">✨</div>
                        <h3 class="text-white font-bold text-lg mb-2">Status</h3>
                        <p class="text-green-300 text-sm font-bold">🟢 Online & Ready!</p>
                    </div>
                </div>

                <!-- Footer Info -->
                <div class="mt-12 pt-8 border-t border-white/20">
                    <p class="text-white/80 text-sm">
                        💻 Created with ❤️ using modern web technologies
                    </p>
                    <p class="text-white/60 text-xs mt-2">
                        <?php echo date('l, F j, Y'); ?>
                    </p>
                </div>
            </div>

            <!-- Bottom Decorative Elements -->
            <div class="mt-12 flex justify-center space-x-4">
                <div class="w-3 h-3 bg-white rounded-full animate-bounce"></div>
                <div class="w-3 h-3 bg-white rounded-full animate-bounce" style="animation-delay: 0.1s;"></div>
                <div class="w-3 h-3 bg-white rounded-full animate-bounce" style="animation-delay: 0.2s;"></div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Dynamic Effects -->
    <script>
        // Update time every second
        function updateTime() {
            const timeElement = document.getElementById('time');
            if (timeElement) {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                timeElement.textContent = `${hours}:${minutes}:${seconds}`;
            }
        }
        setInterval(updateTime, 1000);

        // Create floating particles
        function createParticle() {
            const container = document.getElementById('particles-container');
            const particle = document.createElement('div');
            particle.className = 'particle';

            // Random size between 10 and 30px
            const size = Math.random() * 20 + 10;
            particle.style.width = size + 'px';
            particle.style.height = size + 'px';

            // Random position
            particle.style.left = Math.random() * 100 + '%';

            // Random color from gradient palette
            const colors = ['#667eea', '#764ba2', '#f093fb', '#4facfe', '#00f2fe'];
            particle.style.background = colors[Math.floor(Math.random() * colors.length)];
            particle.style.opacity = '0.6';

            // Random animation duration between 10 and 20 seconds
            const duration = Math.random() * 10 + 10;
            particle.style.animation = `float-particles ${duration}s linear`;

            container.appendChild(particle);

            // Remove particle after animation
            setTimeout(() => {
                particle.remove();
            }, duration * 1000);
        }

        // Create particles periodically
        setInterval(createParticle, 300);

        // Create initial batch of particles
        for (let i = 0; i < 20; i++) {
            setTimeout(createParticle, i * 100);
        }
    </script>
</body>
</html>
