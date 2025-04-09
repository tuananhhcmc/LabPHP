<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Background Animation */
        .bg-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800"%3E%3Ccircle cx="400" cy="400" r="300" fill="none" stroke="%23e0e0e0" stroke-width="1" /%3E%3C/svg%3E');
            opacity: 0.1;
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        .register-container {
            background: rgba(255, 255, 255, 1);
            padding: 3rem 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            position: relative;
            animation: slideIn 0.5s ease-out;
            border: 1px solid #e9ecef;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .register-header {
            color: #0d6efd;
            text-align: center;
            margin-bottom: 2.5rem;
            font-weight: 700;
            position: relative;
        }

        .register-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: #0d6efd;
            border-radius: 2px;
        }

        .form-control {
            border-radius: 10px;
            padding: 0.9rem 1rem;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 8px rgba(13, 110, 253, 0.2);
        }

        .input-group-text {
            background: #f8f9fa;
            border-radius: 10px 0 0 10px;
            border: 1px solid #ced4da;
        }

        .btn-primary {
            width: 100%;
            padding: 1rem;
            border-radius: 10px;
            font-weight: 500;
            background: linear-gradient(90deg, #0d6efd, #1e90ff);
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .btn-primary:hover::after {
            width: 300px;
            height: 300px;
        }

        .form-label {
            font-weight: 500;
            color: #343a40;
        }

        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .footer-text a {
            color: #0d6efd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-text a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="bg-particles"></div>
    <div class="register-container">
        <h1 class="register-header">Đăng ký tài khoản</h1>

        <form method="POST" action="">
            <div class="mb-4">
                <label for="username" class="form-label">Tên tài khoản:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="username" name="username" required
                        placeholder="Nhập tên tài khoản">
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Mật khẩu:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" required
                        placeholder="Nhập mật khẩu">
                </div>
            </div>

            <div class="mb-4">
                <label for="confirm_password" class="form-label">Xác nhận mật khẩu:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required
                        placeholder="Nhập lại mật khẩu">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>

        <div class="footer-text">
            Đã có tài khoản? <a href="http://localhost/qlns/login.php">Đăng nhập</a>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>