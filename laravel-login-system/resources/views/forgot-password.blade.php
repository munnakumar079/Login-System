<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #fff;
            width: 420px;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.25);
            animation: slideUp 0.6s ease;
        }

        @keyframes slideUp {
            from {
                transform: translateY(40px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .title {
            text-align: center;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 700;
            color: #333;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-bottom: 25px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 14px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 15px;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 2px rgba(102,126,234,0.2);
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            opacity: 0.9;
            transform: scale(1.02);
        }

        .links {
            margin-top: 18px;
            text-align: center;
            font-size: 14px;
        }

        .links a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .links a:hover {
            text-decoration: underline;
        }

        @media(max-width: 480px) {
            .card {
                width: 90%;
                padding: 25px;
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <h2 class="title">Forgot Password</h2>
        <form method="POST" action="#">
            @csrf

            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <button type="submit" class="btn">
                Send Reset Link
            </button>

            <div class="links">
                <a href="{{ url('/login') }}">Back to Login</a>
            </div>
        </form>
    </div>

</body>
</html>
