<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - AKSIT GLOBAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f1d3d; /* Dark professional theme matching project */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            margin: 0;
        }
        .login-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 400px;
            padding: 40px;
            text-align: center;
        }
        .login-card h2 {
            color: #1a2d5a;
            font-weight: 800;
            margin-bottom: 30px;
        }
        .form-control {
            border-radius: 6px;
            padding: 12px 15px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            font-size: 15px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #2563eb;
        }
        .btn-login {
            background: linear-gradient(135deg, #2563eb, #264785);
            color: #fff;
            font-weight: 600;
            padding: 12px;
            border-radius: 6px;
            border: none;
            width: 100%;
            font-size: 16px;
            transition: all 0.3s;
        }
        .btn-login:hover {
            box-shadow: 0 8px 25px rgba(37,99,235,0.45);
            transform: translateY(-2px);
            color: #fff;
        }
        .logo-placeholder {
            font-size: 24px;
            font-weight: 900;
            color: #c9a84c; /* Gold accent */
            margin-bottom: 20px;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="logo-placeholder">AKSIT GLOBAL <br><span style="font-size:14px;color:#666;">Admin Portal</span></div>
        <h2>Secure Login</h2>

        @if(session('success'))
            <div class="alert alert-success py-2">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger py-2 text-start">
                <ul class="mb-0 px-3">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            
            <button type="submit" class="btn-login">Login to Dashboard</button>
        </form>
    </div>

</body>
</html>
