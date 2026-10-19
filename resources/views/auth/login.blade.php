
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Inventory System</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            background: #eef3f9;
            color: #183153;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .login-container {
            width: 100%;
            max-width: 1000px;
            min-height: 570px;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            background: white;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 20px 55px rgba(27, 54, 93, 0.14);
        }

        .welcome-panel {
            background: linear-gradient(145deg, #142f52, #20517a);
            color: white;
            padding: 55px 38px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-icon {
            font-size: 54px;
            margin-bottom: 20px;
        }

        .welcome-panel h1 {
            font-size: 32px;
            line-height: 1.25;
            margin-bottom: 16px;
        }

        .welcome-panel p {
            color: #d6e5f4;
            line-height: 1.8;
            font-size: 15px;
        }

        .feature-list {
            margin-top: 32px;
            display: grid;
            gap: 15px;
            color: #edf6ff;
            font-size: 14px;
        }

        .login-panel {
            padding: 55px 52px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-panel h2 {
            font-size: 29px;
            margin-bottom: 10px;
            color: #183153;
        }

        .subtitle {
            color: #73839a;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 9px;
            font-size: 14px;
            font-weight: 600;
            color: #304762;
        }

        input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #d5dfeb;
            border-radius: 10px;
            background: #f9fbfe;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #149da0;
            background: white;
            box-shadow: 0 0 0 3px rgba(20, 157, 160, 0.12);
        }

        .error-box {
            padding: 12px 14px;
            background: #fff0f0;
            border: 1px solid #ffd2d2;
            color: #a52626;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.6;
        }

        .login-button {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 15px;
            background: #11999c;
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 5px;
        }

        .login-button:hover {
            background: #087d80;
            transform: translateY(-1px);
        }

        .demo-account {
            margin-top: 28px;
            padding: 16px;
            background: #f1f7fb;
            border-radius: 10px;
            color: #61758b;
            font-size: 13px;
            line-height: 1.9;
        }

        .demo-account strong {
            color: #304762;
        }

        .footer {
            margin-top: 24px;
            text-align: center;
            font-size: 12px;
            color: #8a98a9;
        }

        @media (max-width: 700px) {
            body {
                padding: 14px;
            }

            .login-container {
                grid-template-columns: 1fr;
            }

            .welcome-panel {
                padding: 30px 26px;
            }

            .welcome-panel h1 {
                font-size: 25px;
            }

            .brand-icon {
                font-size: 38px;
                margin-bottom: 10px;
            }

            .feature-list {
                margin-top: 20px;
            }

            .login-panel {
                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>
    <main class="login-container">
        <section class="welcome-panel">
            <div class="brand-icon">📦</div>

            <h1>Inventory<br>Management System</h1>

            <p>
                Kelola persediaan barang dengan lebih mudah,
                teratur, dan akurat melalui satu sistem.
            </p>

            <div class="feature-list">
                <div>✓ Pemantauan stok barang</div>
                <div>✓ Pengelolaan kategori dan produk</div>
                <div>✓ Pencatatan barang masuk dan keluar</div>
            </div>
        </section>

        <section class="login-panel">
            <h2>Selamat Datang!</h2>
            <p class="subtitle">
                Silakan masuk menggunakan akun inventaris Anda.
            </p>

            @if ($errors->any())
                <div class="error-box">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Masukkan username"
                        autocomplete="username"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <button type="submit" class="login-button">
                    Masuk ke Dashboard &rarr;
                </button>
            </form>

            <div class="demo-account">
                <strong>Akun demo untuk pengujian</strong><br>
                Admin: <strong>admin_pusat</strong><br>
                Staff: <strong>staff_gudang</strong><br>
                <span>Gunakan password demo yang telah disiapkan.</span>
            </div>

            <div class="footer">
                Inventory Management System &copy; 2026
            </div>
        </section>
    </main>
</body>
</html>

