<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | ELDIEF</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont;
        }

        body {
            min-height: 100vh;
            background: radial-gradient(circle at top, #0a2540, #020617);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #e5e7eb;
        }

        .card {
            width: 100%;
            max-width: 420px;
            background: rgba(15, 23, 42, 0.95);
            border: 1px solid #1e293b;
            border-radius: 20px;
            padding: 45px 40px;
            box-shadow: 0 25px 60px rgba(0,0,0,.6);
        }

        .logo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #38bdf8, #2563eb);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            font-weight: 800;
            margin: 0 auto 25px;
            color: white;
            box-shadow: 0 0 40px rgba(56,189,248,.5);
        }

        h1 {
            text-align: center;
            margin-bottom: 6px;
            font-size: 24px;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            color: #94a3b8;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        input {
            background: #020617;
            border: 1px solid #1e293b;
            color: #e5e7eb;
            padding: 14px 18px;
            border-radius: 999px;
            font-size: 14px;
            outline: none;
            transition: border .2s ease, box-shadow .2s ease;
        }

        input::placeholder {
            color: #64748b;
        }

        input:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 3px rgba(56,189,248,.15);
        }

        button {
            margin-top: 10px;
            padding: 14px;
            border-radius: 999px;
            background: linear-gradient(135deg, #38bdf8, #2563eb);
            border: none;
            color: white;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease;
            box-shadow: 0 10px 30px rgba(37,99,235,.4);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(37,99,235,.6);
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 12px;
            color: #64748b;
        }

        .footer a {
            color: #38bdf8;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="logo">E</div>

        <h1>Login</h1>
        <div class="subtitle">Masuk ke sistem ELDIEF</div>

        <form method="POST" action="/login">
            @csrf
            <input name="nim" placeholder="NIM" required>
            <input name="password" type="password" placeholder="Password" required>
            <button>Login</button>
        </form>

        <div class="footer">
            © {{ date('Y') }} ELDIEF
        </div>
    </div>

</body>
</html>
