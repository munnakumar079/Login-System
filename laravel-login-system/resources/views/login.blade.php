<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Laravel Auth</title>

    <style>
        /* ============ RESET ============ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #6366f1, #8b5cf6, #ec4899);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ============ CARD ============ */
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

        /* ============ LEFT ============ */
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
            margin-bottom: 18px;
        }

        .auth-left p {
            font-size: 16px;
            line-height: 1.7;
            opacity: 0.95;
        }

        /* ============ RIGHT ============ */
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

        /* ============ FORM ============ */
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
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
            outline: none;
        }

        /* ============ EXTRA ============ */
        .form-extra {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            margin-bottom: 25px;
        }

        .form-extra label {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #374151;
        }

        .form-extra a {
            color: #6366f1;
            text-decoration: none;
            font-weight: 600;
        }

        .form-extra a:hover {
            text-decoration: underline;
        }

        /* ============ BUTTON ============ */
        .btn-login {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(99, 102, 241, 0.45);
        }

        /* ============ FOOTER ============ */
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

        /* ============ RESPONSIVE ============ */
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
        <h1>Welcome Back 👋</h1>
        <p>
            Login to your account and continue your journey.
            Secure and fast authentication powered by Laravel.
        </p>
    </div>

    <!-- RIGHT -->
    <div class="auth-right">
        <h2>Login</h2>
        <p class="subtitle">Access your account</p>

        <form id="loginForm">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" id="email" placeholder="example@gmail.com">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password"  id="password" placeholder="********">
            </div>

            <div class="form-extra">
                <label>
                    <input type="checkbox"> Remember me
                </label>
                <a href="{{ route('forgot-password') }}">Forgot password?</a>
            </div>

            <button type="submit" class="btn-login">Login</button>

        </form>

        <div class="auth-footer">
            Don’t have an account?
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>

</div>

</body>


<div id="error" style="color:red;margin-bottom:10px;"></div>

<script>
if (localStorage.getItem('token')) {
    window.location.href = "/profile";
}

document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    fetch("http://127.0.0.1:8000/api/login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify({
            email: document.getElementById('email').value,
            password: document.getElementById('password').value
        })
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);

        if (data.access_token) {
            localStorage.setItem('token', data.access_token);
            window.location.href = "/profile";
        } else {
            document.getElementById('error').innerText = data.message;
        }
    })
    .catch(() => {
        document.getElementById('error').innerText = "Server error";
    });
});
</script>






</html>
