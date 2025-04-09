<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2c3e50;
            padding-top: 20px;
        }

        .sidebar a {
            color: #dcdcdc;
            padding: 15px 20px;
            text-decoration: none;
            display: block;
            transition: all 0.3s;
        }

        .sidebar a:hover {
            background-color: #34495e;
            color: #fff;
        }

        .sidebar .active {
            background-color: #007bff;
            color: #fff;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .btn-custom {
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .btn-custom:hover {
            opacity: 0.9;
        }

        .greeting-message {
            font-size: 16px;
            color: #007bff;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center text-white mb-4">Quản lý Nhân sự</h4>
        <a href="index.php"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
        <a href="index.php" class="active"><i class="fas fa-users me-2"></i> Nhân viên</a>
        <a href="#"><i class="fas fa-money-bill me-2"></i> Lương</a>
        <a href="#"><i class="fas fa-chart-bar me-2"></i> Báo cáo</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Đăng xuất</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom mb-4">
            <div class="container-fluid">
                <span class="navbar-brand">Thêm Nhân Viên</span>
                <div class="ms-auto">
                    <span class="navbar-text greeting-message">
                        Xin chào, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Khách'; ?>!
                    </span>
                </div>
            </div>
        </nav>

        <!-- Form Thêm Nhân Viên -->
        <div class="form-card mx-auto" style="max-width: 600px;">
            <h2 class="text-center mb-4">Thêm Nhân Viên</h2>
            <form action="index.php?action=store" method="post">
                <div class="mb-3">
                    <label for="Ma_NV" class="form-label">Mã Nhân Viên</label>
                    <input type="text" class="form-control" id="Ma_NV" name="Ma_NV" required>
                </div>

                <div class="mb-3">
                    <label for="Ten_NV" class="form-label">Tên Nhân Viên</label>
                    <input type="text" class="form-control" id="Ten_NV" name="Ten_NV" required>
                </div>

                <div class="mb-3">
                    <label for="Phai" class="form-label">Giới tính</label>
                    <select class="form-select" id="Phai" name="Phai">
                        <option value="NAM">Nam</option>
                        <option value="NU">Nữ</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Noi_Sinh" class="form-label">Nơi Sinh</label>
                    <input type="text" class="form-control" id="Noi_Sinh" name="Noi_Sinh">
                </div>

                <div class="mb-3">
                    <label for="Ma_Phong" class="form-label">Mã Phòng</label>
                    <select class="form-select" id="Ma_Phong" name="Ma_Phong" required>
                        <option value="QT">Quản Trị (QT)</option>
                        <option value="TC">Tài Chính (TC)</option>
                        <option value="KT">Kỹ Thuật (KT)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Luong" class="form-label">Lương</label>
                    <input type="number" class="form-control" id="Luong" name="Luong" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-custom"><i class="fas fa-plus me-2"></i>
                        Thêm</button>
                    <a href="index.php" class="btn btn-secondary btn-custom"><i class="fas fa-arrow-left me-2"></i> Quay
                        lại</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>