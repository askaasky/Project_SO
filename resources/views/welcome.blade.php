<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Welcome | ELDIEF</title>

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
            color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: rgba(15, 23, 42, 0.9);
            border: 1px solid #1e293b;
            padding: 50px 40px;
            border-radius: 20px;
            max-width: 420px;
            width: 100%;
            text-align: center;
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
            font-weight: 800;
            font-size: 26px;
            color: white;
            margin: 0 auto 20px;
            box-shadow: 0 0 40px rgba(56,189,248,.5);
        }

        h1 {
            font-size: 26px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        p {
            font-size: 15px;
            color: #94a3b8;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        a.btn {
            display: inline-block;
            padding: 14px 28px;
            border-radius: 999px;
            background: linear-gradient(135deg, #38bdf8, #2563eb);
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: transform .2s ease, box-shadow .2s ease;
            box-shadow: 0 10px 30px rgba(37,99,235,.4);
        }

        a.btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(37,99,235,.6);
        }

        .footer {
            margin-top: 25px;
            font-size: 12px;
            color: #64748b;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="logo">E</div>

        <h1>Welcome to ELDIEF</h1>

        <p>
            Sistem Lost & Found kampus untuk membantu menemukan barang
            yang hilang atau ditemukan secara cepat dan aman.
        </p>

        <a href="/login" class="btn">Login</a>

        <div class="footer">
            © {{ date('Y') }} ELDIEF
        </div>
    </div>

</body>
</html>
