<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Laravel Auth</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="auth-container">

    <!-- LEFT PANEL -->
    <div class="auth-left">
        <h1>Welcome Back 👋</h1>
        <p>
            Login to access your dashboard and manage your account securely.
            This system is built with Laravel authentication best practices.
        </p>
    </div>

    <!-- RIGHT PANEL -->
    <div class="auth-right">
        <h2>Login</h2>
        <p class="subtitle">Sign in to your account</p>

        {{-- Session Status --}}
        @if (session('status'))
            <p style="color: green; font-size: 14px; margin-bottom: 15px;">
                {{ session('status') }}
            </p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- EMAIL -->
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="********" required>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <!-- REMEMBER + FORGOT -->
            <div class="form-extra">
                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn-login">
                Login
            </button>
        </form>

        <!-- FOOTER -->
        <div class="auth-footer">
            Don’t have an account?
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>

</div>

</body>
</html>
