<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
            border: none;
        }

        .login-card .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .login-card .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .login-card-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .login-card-header img {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <div class="card login-card">
            <div class="login-card-header">
                <h3>Login</h3>
            </div>


            <p>
                {{-- gagal login --}}
                @if (session('gagal_login'))
                    <div class="alert alert-danger">
                        {{ session('gagal_login') }}
                    </div>
                @endif

                @if (session('berhasil_keluar'))
                    <div class="alert alert-success">
                        {{ session('berhasil_keluar') }}
                    </div>
                @endif
            </p>
            <div class="card-body">
                <form action="{{ route('proses-login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
