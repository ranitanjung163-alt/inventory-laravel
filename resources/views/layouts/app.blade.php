
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventory System')</title>

    <style>
        :root {
            --navy: #173653;
            --navy-light: #234e70;
            --teal: #10999b;
            --teal-dark: #087d80;
            --bg: #f2f6fb;
            --white: #ffffff;
            --text: #24364b;
            --muted: #718096;
            --border: #e0e7ef;
            --red: #dc5151;
            --green: #18845b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            font-size: 15px;
        }

        a {
            color: var(--teal-dark);
            text-decoration: none;
        }

        .topbar {
            background: var(--navy);
            color: white;
            box-shadow: 0 3px 12px rgba(20, 45, 70, .12);
        }

        .nav-container {
            max-width: 1400px;
            margin: auto;
            padding: 0 28px;
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            color: white;
            font-size: 19px;
            font-weight: 750;
            white-space: nowrap;
        }

        .brand span {
            color: #55d5d0;
        }

        .nav-links {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .nav-links a {
            color: #e5eef7;
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 14px;
            transition: .2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: white;
            background: rgba(255,255,255,.13);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .user-label {
            color: #e0ebf5;
            font-size: 13px;
            white-space: nowrap;
        }

        .logout-button {
            background: #ffffff;
            color: var(--navy);
            border: none;
            border-radius: 8px;
            padding: 10px 14px;
            cursor: pointer;
            font-weight: 650;
        }

        .logout-button:hover {
            background: #e9f3fa;
        }

        .page-container {
            width: calc(100% - 48px);
            max-width: 1340px;
            margin: 32px auto;
            min-height: 400px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 24px;
        }

        h1, h2, h3 {
            color: var(--navy);
        }

        h1 {
            margin: 0 0 8px;
            font-size: 29px;
        }

        h2 {
            font-size: 21px;
        }

        .page-description {
            color: var(--muted);
            margin: 0;
            line-height: 1.6;
        }

        .card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 22px;
            box-shadow: 0 5px 18px rgba(31, 57, 82, .04);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border-radius: 13px;
            border: 1px solid var(--border);
            border-left: 4px solid var(--teal);
            box-shadow: 0 4px 15px rgba(31,57,82,.04);
        }

        .stat-label {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 13px;
        }

        .stat-value {
            color: var(--navy);
            font-size: 30px;
            font-weight: 750;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        th {
            background: #f1f6fa;
            color: #42566d;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        td {
            font-size: 14px;
        }

        tbody tr:hover {
            background: #f8fbfd;
        }

        .btn, button.btn {
            display: inline-block;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 650;
            cursor: pointer;
            text-align: center;
            transition: .2s;
        }

        .btn-primary {
            background: var(--teal);
            color: white;
        }

        .btn-primary:hover {
            background: var(--teal-dark);
        }

        .btn-secondary {
            background: #e9eff5;
            color: #344b63;
        }

        .btn-danger {
            background: #fff0f0;
            color: #bf3737;
        }

        .btn-danger:hover {
            background: #ffe0e0;
        }

        .btn-success {
            background: #e5f7ed;
            color: #14794d;
        }

        .form-group {
            margin-bottom: 19px;
        }

        label {
            display: block;
            font-weight: 650;
            font-size: 14px;
            margin-bottom: 8px;
            color: #354b62;
        }

        input:not([type="checkbox"]):not([type="radio"]),
        select,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #d5dfeb;
            border-radius: 8px;
            font: inherit;
            color: var(--text);
            background: white;
            outline: none;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 3px rgba(16,153,155,.11);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .alert {
            padding: 14px 17px;
            border-radius: 9px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .alert-success {
            color: #176b47;
            background: #e8f8ef;
            border: 1px solid #c5ecd5;
        }

        .alert-danger {
            color: #a52e2e;
            background: #fff0f0;
            border: 1px solid #f3cccc;
        }

        .badge {
            display: inline-block;
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-success {
            background: #e4f7ec;
            color: #177849;
        }

        .badge-warning {
            background: #fff4d9;
            color: #946200;
        }

        .badge-danger {
            background: #ffe6e6;
            color: #b72e2e;
        }

        .empty-state {
            text-align: center;
            padding: 35px 15px;
            color: var(--muted);
        }

        .footer {
            text-align: center;
            color: #8492a3;
            padding: 22px;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .nav-container {
                padding: 18px;
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-right {
                flex-wrap: wrap;
            }

            .page-container {
                width: calc(100% - 28px);
                margin: 20px auto;
            }

            .card {
                padding: 17px;
            }
        }

        @media (max-width: 520px) {
            h1 {
                font-size: 24px;
            }

            .nav-links a {
                padding: 8px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <header class="topbar">
        <div class="nav-container">
            <a href="{{ route('dashboard') }}" class="brand">
                📦 Inventory <span>System</span>
            </a>

            <nav class="nav-links">
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('categories.index') }}"
                   class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    Kategori
                </a>

                <a href="{{ route('products.index') }}"
                   class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
                    Produk
                </a>

                <a href="{{ route('stock.index') }}"
                   class="{{ request()->routeIs('stock.*') ? 'active' : '' }}">
                    Transaksi Stok
                </a>

                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('users.index') }}"
                       class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                        Pengguna
                    </a>
                @endif
            </nav>

            @auth
                <div class="nav-right">
                    <span class="user-label">
                        {{ auth()->user()->username }}
                        ({{ strtoupper(auth()->user()->role) }})
                    </span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-button">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </header>

    <main class="page-container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Mohon periksa kembali isian berikut:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        Inventory Management System &copy; {{ date('Y') }}
    </footer>
</body>
</html>

