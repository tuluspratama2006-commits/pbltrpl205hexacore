<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin — PT. Berkah Alam Tabantang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #D0E6FD;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 24px;
        }

        /* LOGO BRAND */
        .login-brand {
            text-align: center;
        }

        .login-brand img {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
            border: 3px solid #162660;
            box-shadow: 0 4px 12px rgba(22,38,96,0.2);
        }

        .login-brand h1 {
            font-size: 1.05rem;
            font-weight: 700;
            color: #162660;
            margin-bottom: 2px;
        }

        .login-brand p {
            font-size: 0.78rem;
            color: #4a6080;
        }

        /* FORM CARD */
        .login-box {
            background: #1e293b;
            border-radius: 18px;
            padding: 36px 32px 32px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 48px rgba(0,0,0,0.18);
            position: relative;
        }

        h2 {
            text-align: center;
            font-size: 1.4rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: 4px;
            margin-bottom: 28px;
        }

        .alert-error {
            background: rgba(220,38,38,0.15);
            border: 1px solid rgba(220,38,38,0.3);
            color: #fca5a5;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 16px;
            display: none;
        }

        .form-group { margin-bottom: 16px; }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: #94a3b8;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .input-wrap { position: relative; }

        .input-wrap i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #475569;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 13px 16px 13px 42px;
            background: #f8fafc;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            color: #1e293b;
            outline: none;
            transition: box-shadow 0.2s;
        }

        .form-group input:focus {
            box-shadow: 0 0 0 3px rgba(22,38,96,0.25);
        }

        .form-group input::placeholder { color: #94a3b8; }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: #162660;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 8px;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-login:hover { background: #4388C4; }
        .btn-login:disabled { opacity: 0.6; cursor: not-allowed; }

        /* BACK LINK */
        .back-link {
            text-align: center;
        }

        .back-link a {
            color: #4a6080;
            font-size: 13px;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-link a:hover { color: #162660; }
    </style>
</head>
<body>

    <!-- LOGO -->
    <div class="login-brand">
        <img src="{{ asset('images/logo_pt_bat2.jpg') }}" alt="Logo BAT">
        <h1>PT. Berkah Alam Tabantang</h1>
    </div>

    <!-- FORM -->
    <div class="login-box">
        <h2>LOGIN ADMIN</h2>

        <div class="alert-error" id="alertError"></div>

        <div class="form-group">
            <label>Email</label>
            <div class="input-wrap">
                <i class="fas fa-envelope"></i>
                <input type="email" id="email" placeholder="Masukkan email admin" autocomplete="email">
            </div>
        </div>

        <div class="form-group">
            <label>Password</label>
            <div class="input-wrap">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" placeholder="Masukkan password" autocomplete="current-password">
            </div>
        </div>

        <button class="btn-login" id="btnLogin" onclick="handleLogin()">
            <i class="fas fa-sign-in-alt"></i> MASUK
        </button>
    </div>

    <!-- BACK LINK -->
    <div class="back-link">
        <a href="{{ route('home') }}">← Kembali ke halaman utama</a>
    </div>

    <script>
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') handleLogin();
        });

        function handleLogin() {
            const email    = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const btn      = document.getElementById('btnLogin');
            const alertEl  = document.getElementById('alertError');

            alertEl.style.display = 'none';

            if (!email || !password) {
                alertEl.textContent = 'Email dan password wajib diisi!';
                alertEl.style.display = 'block';
                return;
            }

            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';

            fetch('/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ username: email, password: password })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    alertEl.textContent = data.message || 'Email atau password salah!';
                    alertEl.style.display = 'block';
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fas fa-sign-in-alt"></i> MASUK';
                }
            })
            .catch(() => {
                alertEl.textContent = 'Terjadi kesalahan. Coba lagi.';
                alertEl.style.display = 'block';
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-sign-in-alt"></i> MASUK';
            });
        }
    </script>
</body>
</html>