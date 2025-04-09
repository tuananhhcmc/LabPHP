<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Đăng ký tài khoản</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Tên tài khoản</label>
                    <input type="text" name="username" class="form-control" placeholder="Nhập tên tài khoản" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu"
                        required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
            </form>
            <p class="mt-3 text-center">Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>