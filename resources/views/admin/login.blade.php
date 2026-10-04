<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - SMK Negeri 4 Bogor</title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    <style>

        /* =========================================
           RESET
        ========================================= */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #0f172a;
        }


        /* =========================================
           MAIN LOGIN CONTAINER
        ========================================= */

        .login-page {
            min-height: 100vh;
            display: flex;
        }


        /* =========================================
           LEFT SIDE - BRANDING
        ========================================= */

        .login-brand {
            width: 40%;
            min-height: 100vh;

            position: relative;
            overflow: hidden;

            display: flex;
            flex-direction: column;

            padding: 58px 42px 42px;

            color: white;

            background:
                linear-gradient(
                    145deg,
                    #062d59 0%,
                    #073f78 55%,
                    #07518f 100%
                );
        }


        /* Decorative circles */

        .login-brand::before {
            content: "";
            position: absolute;

            width: 420px;
            height: 420px;

            border-radius: 50%;

            background: rgba(59, 173, 255, 0.08);

            top: -180px;
            right: -180px;
        }

        .login-brand::after {
            content: "";
            position: absolute;

            width: 350px;
            height: 350px;

            border-radius: 50%;

            background: rgba(59, 173, 255, 0.05);

            bottom: -180px;
            left: -180px;
        }


        /* =========================================
           BRAND HEADER
        ========================================= */

        .brand-header {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;

            gap: 14px;
        }

        .brand-logo {
            width: 42px;
            height: 42px;

            background: white;
            color: #073f78;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .brand-label {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .brand-label small {
            font-size: 10px;
            font-weight: 700;

            letter-spacing: 1px;

            color: #7fd0ff;
        }

        .brand-label strong {
            font-size: 13px;
            font-weight: 700;
        }


        /* =========================================
           BRAND MAIN TEXT
        ========================================= */

        .brand-content {
            position: relative;
            z-index: 2;

            margin-top: 78px;

            max-width: 480px;
        }

        .brand-content h1 {
            margin: 0;

            font-size: clamp(36px, 3vw, 52px);

            line-height: 1.08;

            font-weight: 800;

            letter-spacing: -1.5px;
        }

        .brand-content h1 span {
            color: #62c7ff;
        }

        .brand-description {
            margin-top: 28px;

            max-width: 420px;

            color: rgba(255, 255, 255, 0.62);

            font-size: 14px;

            line-height: 1.7;
        }


        /* =========================================
           BRAND QUOTE
        ========================================= */

        .brand-quote {
            position: relative;
            z-index: 2;

            margin-top: auto;

            padding-left: 18px;

            border-left: 1px solid rgba(255, 255, 255, 0.25);
        }

        .brand-quote p {
            margin: 0 0 10px;

            font-size: 13px;

            font-style: italic;

            color: rgba(255, 255, 255, 0.48);
        }

        .brand-quote span {
            font-size: 10px;

            font-weight: 600;

            letter-spacing: 0.7px;

            color: #62c7ff;
        }


        /* =========================================
           COPYRIGHT
        ========================================= */

        .brand-footer {
            position: relative;
            z-index: 2;

            margin-top: 42px;

            padding-top: 18px;

            border-top: 1px solid rgba(255, 255, 255, 0.12);

            font-size: 10px;

            color: rgba(255, 255, 255, 0.38);
        }


        /* =========================================
           RIGHT SIDE
        ========================================= */

        .login-form-side {
            width: 60%;
            min-height: 100vh;

            background: #ffffff;

            display: flex;
            flex-direction: column;

            padding: 58px 8%;
        }


        /* =========================================
           BACK TO HOME
        ========================================= */

        .back-home {
            color: #475569;

            text-decoration: none;

            font-size: 12px;

            display: inline-flex;
            align-items: center;

            gap: 7px;

            width: fit-content;

            transition: 0.2s ease;
        }

        .back-home:hover {
            color: #073f78;
        }


        /* =========================================
           TOP LINE
        ========================================= */

        .top-line {
            width: 100%;

            height: 1px;

            background: #e5e7eb;

            margin-top: 22px;
        }


        /* =========================================
           LOGIN FORM WRAPPER
        ========================================= */

        .login-form-wrapper {
            width: 100%;
            max-width: 520px;

            margin: auto;
        }

        .login-form-wrapper h2 {
            margin-bottom: 8px;

            font-size: 25px;

            font-weight: 800;

            letter-spacing: -0.5px;

            color: #111827;
        }

        .login-subtitle {
            margin-bottom: 30px;

            font-size: 12px;

            line-height: 1.6;

            color: #64748b;
        }


        /* =========================================
           ERROR MESSAGE
        ========================================= */

        .login-alert {
            border: none;

            border-radius: 9px;

            background: #fff1f2;

            color: #be123c;

            font-size: 12px;

            padding: 11px 13px;

            margin-bottom: 20px;
        }


        /* =========================================
           FORM LABEL
        ========================================= */

        .form-label-row {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 8px;
        }

        .form-label {
            margin: 0;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 0.4px;

            color: #475569;

            text-transform: uppercase;
        }

        .forgot-password {
            font-size: 10px;

            font-weight: 600;

            color: #073f78;

            text-decoration: none;
        }


        /* =========================================
           INPUT
        ========================================= */

        .input-wrapper {
            position: relative;

            margin-bottom: 20px;
        }

        .input-icon {
            position: absolute;

            left: 14px;
            top: 50%;

            transform: translateY(-50%);

            color: #94a3b8;

            font-size: 15px;

            pointer-events: none;
        }

        .login-input {
            width: 100%;

            height: 48px;

            padding: 0 44px;

            border: 1px solid #d7dee8;

            border-radius: 9px;

            background: #f8fafc;

            color: #1e293b;

            font-size: 12px;

            outline: none;

            transition: 0.2s ease;
        }

        .login-input:focus {
            border-color: #0b4f8a;

            background: #ffffff;

            box-shadow: 0 0 0 3px rgba(11, 79, 138, 0.08);
        }

        .login-input::placeholder {
            color: #94a3b8;
        }


        /* =========================================
           PASSWORD BUTTON
        ========================================= */

        .password-toggle {
            position: absolute;

            right: 14px;
            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #94a3b8;

            cursor: pointer;

            padding: 0;
        }

        .password-toggle:hover {
            color: #073f78;
        }


        /* =========================================
           REMEMBER ME
        ========================================= */

        .remember-row {
            display: flex;
            align-items: center;

            gap: 7px;

            margin-bottom: 22px;
        }

        .remember-row input {
            width: 14px;
            height: 14px;

            accent-color: #073f78;
        }

        .remember-row label {
            font-size: 10px;

            color: #64748b;

            cursor: pointer;
        }


        /* =========================================
           LOGIN BUTTON
        ========================================= */

        .btn-login {
            width: 100%;

            height: 48px;

            border: none;

            border-radius: 9px;

            background: #063f78;

            color: white;

            font-family: inherit;

            font-size: 12px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.2s ease;

            box-shadow: 0 5px 12px rgba(6, 63, 120, 0.15);
        }

        .btn-login:hover {
            background: #052f5b;

            transform: translateY(-1px);

            box-shadow: 0 7px 16px rgba(6, 63, 120, 0.2);
        }


        /* =========================================
           HELP DESK
        ========================================= */

        .helpdesk {
            margin-top: auto;

            padding-top: 18px;

            border-top: 1px solid #e5e7eb;

            color: #94a3b8;

            font-size: 9px;

            line-height: 1.6;
        }

        .helpdesk strong {
            color: #64748b;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 900px) {

            .login-brand {
                width: 42%;
                padding: 40px 30px;
            }

            .login-form-side {
                width: 58%;
                padding: 40px 6%;
            }

            .brand-content {
                margin-top: 55px;
            }

            .brand-content h1 {
                font-size: 34px;
            }
        }


        @media (max-width: 700px) {

            .login-page {
                flex-direction: column;
            }

            .login-brand {
                width: 100%;
                min-height: auto;

                padding: 35px 28px 30px;
            }

            .brand-content {
                margin-top: 45px;
            }

            .brand-content h1 {
                font-size: 32px;
            }

            .brand-description {
                margin-top: 18px;
            }

            .brand-quote {
                margin-top: 45px;
            }

            .brand-footer {
                margin-top: 25px;
            }

            .login-form-side {
                width: 100%;
                min-height: auto;

                padding: 30px 28px 35px;
            }

            .login-form-wrapper {
                margin: 55px auto;
            }

            .helpdesk {
                margin-top: 0;
            }
        }

    </style>
</head>


<body>

<div class="login-page">


    {{-- =====================================================
         LEFT COLUMN
    ====================================================== --}}

    <section class="login-brand">


        {{-- BRAND HEADER --}}

        <div class="brand-header">

            <div class="brand-logo">
                <i class="bi bi-building-fill"></i>
            </div>

            <div class="brand-label">
                <small>ADMIN</small>

                <strong>
                    SMK NEGERI 4 BOGOR
                </strong>
            </div>

        </div>


        {{-- BRAND MAIN CONTENT --}}

        <div class="brand-content">

            <h1>
                Sistem Manajemen
                <span>SMK Negeri 4 Bogor</span>
            </h1>

            <p class="brand-description">
                Layanan terpadu administrasi akademik, kejuruan,
                dan pelaporan institusi dalam satu sistem aman.
            </p>

        </div>


        {{-- QUOTE --}}

        <div class="brand-quote">

            <p>
                “Maju Bersama, Hebat Semua”
            </p>

            <span>
                PORTAL TERPUSAT TENAGA PENDIDIK & KEPENDIDIKAN
            </span>

        </div>


        {{-- COPYRIGHT --}}

        <div class="brand-footer">
            © 2026 SMK Negeri 4 Bogor. All rights reserved.
        </div>

    </section>



    {{-- =====================================================
         RIGHT COLUMN
    ====================================================== --}}

    <section class="login-form-side">


        {{-- BACK TO HOME --}}

        <a href="{{ url('/') }}" class="back-home">

            <i class="bi bi-arrow-left"></i>

            Kembali ke Beranda

        </a>


        {{-- LINE --}}

        <div class="top-line"></div>


        {{-- LOGIN FORM --}}

        <div class="login-form-wrapper">

            <h2>
                Masuk ke Akun Admin
            </h2>

            <p class="login-subtitle">
                Masukkan kredensial terverifikasi untuk melanjutkan
                ke dashboard.
            </p>


            {{-- ERROR MESSAGE --}}

            @if ($errors->any())

                <div class="login-alert">

                    {{ $errors->first() }}

                </div>

            @endif


            {{-- FORM --}}

            <form
                action="{{ route('admin.login.submit') }}"
                method="POST"
            >

                @csrf


                {{-- EMAIL --}}

                <div class="form-label-row">

                    <label class="form-label">
                        NIP / Email Instansi
                    </label>

                </div>


                <div class="input-wrapper">

                    <i class="bi bi-person-badge input-icon"></i>

                    <input
                        type="email"
                        name="email"
                        class="login-input"
                        placeholder="Masukkan NIP / email instansi"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >

                </div>


                {{-- PASSWORD --}}

                <div class="form-label-row">

                    <label class="form-label">
                        Kata Sandi
                    </label>

                    <a href="#" class="forgot-password">
                        Lupa sandi?
                    </a>

                </div>


                <div class="input-wrapper">

                    <i class="bi bi-lock input-icon"></i>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="login-input"
                        placeholder="Masukkan kata sandi"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        id="passwordToggle"
                    >
                        <i class="bi bi-eye" id="passwordIcon"></i>
                    </button>

                </div>


                {{-- REMEMBER ME --}}

                <div class="remember-row">

                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                    >

                    <label for="remember">
                        Ingat saya di perangkat ini
                    </label>

                </div>


                {{-- LOGIN BUTTON --}}

                <button
                    type="submit"
                    class="btn-login"
                >
                    Masuk
                </button>

            </form>

        </div>


        {{-- HELPDESK --}}

        <div class="helpdesk">

            Kendala akses? Hubungi Tim IT / Helpdesk
            (Ext. 104) atau <strong>Bantuan</strong>

        </div>

    </section>

</div>



{{-- =====================================================
     PASSWORD TOGGLE
====================================================== --}}

<script>

    const passwordInput = document.getElementById('password');

    const passwordToggle = document.getElementById('passwordToggle');

    const passwordIcon = document.getElementById('passwordIcon');


    passwordToggle.addEventListener('click', function () {

        if (passwordInput.type === 'password') {

            passwordInput.type = 'text';

            passwordIcon.classList.remove('bi-eye');

            passwordIcon.classList.add('bi-eye-slash');

        } else {

            passwordInput.type = 'password';

            passwordIcon.classList.remove('bi-eye-slash');

            passwordIcon.classList.add('bi-eye');

        }

    });

</script>


</body>
</html>