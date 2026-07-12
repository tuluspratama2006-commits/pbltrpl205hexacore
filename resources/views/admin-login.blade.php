<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin — PT. Berkah Alam Tabantang</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}

        body{
            font-family:'Segoe UI',Tahoma,Gene,Verdana,sans-serif;
            background:#D0E6FD;
            min-height:100dvh;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            gap:16px;
            padding:20px;
        }

        .login-brand{text-align:center;}
        .login-brand img{
            width:60px;
            height:60px;
            object-fit:cover;
            border-radius:50%;
            border:3px solid #162660;
            box-shadow:0 6px 18px rgba(22,38,96,.25);
            margin-bottom:10px;
        }
        .login-brand h1{
            color:#162660;
            font-size:1.05rem;
            font-weight:700;
            margin-top:6px;
            line-height:1.4;
        }

        .login-box{
            width:95%;
            max-width:390px;
            background:#1E293B;
            border-radius:18px;
            padding:32px 24px;
            border:1px solid rgba(255,255,255,.08);
            box-shadow:0 18px 40px rgba(0,0,0,.18);
        }

        h2{
            text-align:center;
            color:#fff;
            font-size:1.35rem;
            letter-spacing:3px;
            margin-bottom:26px;
        }

        .alert-error{
            display:none;
            background:rgba(220,38,38,.15);
            color:#fecaca;
            border:1px solid rgba(220,38,38,.3);
            padding:12px;
            border-radius:10px;
            margin-bottom:18px;
            font-size:14px;
        }

        .form-group{margin-bottom:18px;}

        .form-group label{
            display:block;
            margin-bottom:8px;
            color:#94A3B8;
            font-size:11px;
            font-weight:700;
            letter-spacing:1px;
            text-transform:uppercase;
        }

        .input-wrap{position:relative;}

        .input-wrap i{
            position:absolute;
            left:15px;
            top:50%;
            transform:translateY(-50%);
            color:#64748B;
        }

        .form-group input{
            width:100%;
            height:46px;
            border:none;
            outline:none;
            border-radius:10px;
            background:#F8FAFC;
            padding:0 16px 0 42px;
            font-size:16px;
        }

        .form-group input:focus{
            box-shadow:0 0 0 3px rgba(22,38,96,.25);
        }

        .btn-login{
            width:100%;
            height:52px;
            border:none;
            border-radius:12px;
            background:#162660;
            color:#fff;
            font-size:15px;
            font-weight:700;
            letter-spacing:1px;
            cursor:pointer;
            display:flex;
            justify-content:center;
            align-items:center;
            gap:8px;
            transition:.3s;
        }

        .btn-login:hover{
            background:#4388C4;
        }

        .btn-login:disabled{
            opacity:.6;
            cursor:not-allowed;
        }

        .back-link a{
            color:#4A6080;
            font-size:13px;
            text-decoration:none;
        }

        @media(max-width:480px){
            body{padding:16px;}
            .login-box{padding:24px 18px;}
            h2{font-size:1.15rem;}
            .login-brand h1{font-size:.95rem;}
        }
    </style>
</head>
<body>

<div class="login-brand">
    <img src="{{ asset('images/logo_pt_bat2.jpg') }}" alt="Logo BAT">
    <h1>PT. Berkah Alam Tabantang</h1>
</div>

<div class="login-box">

    <h2>LOGIN ADMIN</h2>

    <div id="alertError" class="alert-error"></div>

    <div class="form-group">
        <label>Email</label>
        <div class="input-wrap">
            <i class="fas fa-envelope"></i>
            <input type="email" id="email" placeholder="Masukkan email admin">
        </div>
    </div>

    <div class="form-group">
        <label>Password</label>
        <div class="input-wrap">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" placeholder="Masukkan password">
        </div>
    </div>

    <button id="btnLogin" class="btn-login" onclick="handleLogin()">
        <i class="fas fa-sign-in-alt"></i> MASUK
    </button>

</div>

<div class="back-link">
    <a href="{{ route('home') }}">← Kembali ke halaman utama</a>
</div>

<script>
document.addEventListener("keydown",e=>{
    if(e.key==="Enter") handleLogin();
});

function handleLogin(){

    const email=document.getElementById("email").value.trim();
    const password=document.getElementById("password").value;
    const btn=document.getElementById("btnLogin");
    const alert=document.getElementById("alertError");

    alert.style.display="none";

    if(!email||!password){
        alert.textContent="Email dan password wajib diisi!";
        alert.style.display="block";
        return;
    }

    btn.disabled=true;
    btn.innerHTML='<i class="fas fa-spinner fa-spin"></i> Memproses...';

    fetch("/login",{
        method:"POST",
        headers:{
            "Content-Type":"application/json",
            "X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').content
        },
        body:JSON.stringify({
            username:email,
            password:password
        })
    })
    .then(r=>r.json())
    .then(data=>{
        if(data.success){
            window.location.href=data.redirect;
        }else{
            alert.textContent=data.message||"Email atau password salah!";
            alert.style.display="block";
            btn.disabled=false;
            btn.innerHTML='<i class="fas fa-sign-in-alt"></i> MASUK';
        }
    })
    .catch(()=>{
        alert.textContent="Terjadi kesalahan. Coba lagi.";
        alert.style.display="block";
        btn.disabled=false;
        btn.innerHTML='<i class="fas fa-sign-in-alt"></i> MASUK';
    });

}
</script>

</body>
</html>
