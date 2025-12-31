<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account | Laravel Auth</title>

    <style>
        /* ================= RESET ================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #6366f1, #8b5cf6, #ec4899);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ================= CARD ================= */
        .auth-card {
            width: 100%;
            max-width: 980px;
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(18px);
            border-radius: 22px;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.35);
            display: flex;
            overflow: hidden;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ================= LEFT ================= */
        .auth-left {
            width: 45%;
            padding: 60px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-left h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .auth-left p {
            font-size: 16px;
            line-height: 1.7;
            opacity: 0.95;
        }

        /* ================= RIGHT ================= */
        .auth-right {
            width: 55%;
            background: #ffffff;
            padding: 60px;
        }

        .auth-right h2 {
            font-size: 32px;
            color: #111827;
            margin-bottom: 6px;
        }

        .subtitle {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 35px;
        }

        /* ================= FORM ================= */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 15px 16px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            font-size: 14px;
            transition: 0.3s ease;
        }

        .form-group input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
            outline: none;
        }

        /* ================= BUTTON ================= */
        .btn-register {
            width: 100%;
            padding: 16px;
            margin-top: 10px;
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(99, 102, 241, 0.45);
        }

        /* ================= FOOTER ================= */
        .auth-footer {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #6b7280;
        }

        .auth-footer a {
            color: #6366f1;
            font-weight: 600;
            text-decoration: none;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        /* ================= ERROR ================= */
        .error-text {
            font-size: 12px;
            color: #dc2626;
            margin-top: 5px;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            .auth-card {
                flex-direction: column;
                max-width: 420px;
            }

            .auth-left,
            .auth-right {
                width: 100%;
                padding: 40px;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="auth-card">

    <!-- LEFT -->
    <div class="auth-left">
        <h1>Join Us 🚀</h1>
        <p>
            Create your account and unlock access to powerful features.
            Secure authentication powered by Laravel.
        </p>
    </div>

    <!-- RIGHT -->
    <div class="auth-right">
        <h2>Create Account</h2>
        <p class="subtitle">Register to get started</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Your full name" required>
                @error('name') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required>
                @error('email') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="********" required>
                @error('password') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="********" required>
            </div>

            <button type="submit" class="btn-register">
                Create Account
            </button>
        </form>

        <div class="auth-footer">
            Already have an account?
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>

</div>

</body>
</html>
