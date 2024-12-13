<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e1e2f, #252540);
            color: #fefefe;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* Loading Screen */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 100;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.5s ease-in-out;
        }

        .loading-screen.active {
            visibility: visible;
            opacity: 1;
        }

        .loading-screen .ball {
            width: 20px;
            height: 20px;
            margin: 0 10px;
            background-color: #ffcc00;
            border-radius: 50%;
            animation: bounce 1.2s infinite ease-in-out;
        }

        .loading-screen .ball:nth-child(2) {
            animation-delay: 0.2s;
        }

        .loading-screen .ball:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {
            0%, 80%, 100% {
                transform: scale(0);
            }
            40% {
                transform: scale(1);
            }
        }

        /* Login Container */
        .login-container {
            width: 400px;
            padding: 40px;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        h2 {
            font-size: 28px;
            color: #ffcc00;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.8);
        }

        input {
            width: 90%;
            padding: 14px;
            margin-bottom: 15px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        button {
            width: 95%;
            padding: 14px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 12px;
            background: linear-gradient(145deg, #ffcc00, #ff9900);
            color: #222;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(255, 153, 0, 0.4);
            transition: all 0.3s ease;
        }

        p {
            margin-top: 15px;
            font-size: 14px;
        }

        a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
    </div>

    <!-- Login Container -->
    <div class="login-container">
        <h2>Login</h2>

        <!-- Login Form -->
        <form action="/auth/loginProcess" method="post" id="loginForm">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="/register">Daftar</a></p>
    </div>

    <script>
        const loginForm = document.getElementById('loginForm');
        const loadingScreen = document.getElementById('loadingScreen');

        loginForm.addEventListener('submit', (e) => {
            // Show loading screen
            loadingScreen.classList.add('active');
        });
    </script>
</body>
</html>
