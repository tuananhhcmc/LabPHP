<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Nhân sự</title>
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
            background-color: #eef2f7;
            color: #333;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #2c3e50 0%, #1a2634 100%);
            padding-top: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            color: #dcdcdc;
            padding: 15px 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
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
            padding: 30px;
        }

        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            padding: 15px;
        }

        .table-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e9ecef;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: #fff;
            text-transform: uppercase;
            font-size: 13px;
            padding: 15px;
            position: relative;
            border: none;
        }

        .table th .sort-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        .table th:hover .sort-icon {
            opacity: 1;
        }

        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #e9ecef;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.05);
        }

        .table tbody td {
            vertical-align: middle;
            padding: 15px;
        }

        .avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e9ecef;
            transition: transform 0.3s;
        }

        .avatar:hover {
            transform: scale(1.1);
        }

        .btn-custom {
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn-custom:hover {
            opacity: 0.85;
            transform: translateY(-1px);
        }

        .btn-warning {
            background-color: #f39c12;
            border: none;
        }

        .btn-danger {
            background-color: #e74c3c;
            border: none;
        }

        .search-bar .input-group {
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .search-bar .form-control {
            border: none;
            padding: 10px 20px;
        }

        .search-bar .btn-primary {
            border: none;
            padding: 10px 20px;
        }

        .pagination .page-item .page-link {
            border: none;
            color: #007bff;
            background-color: #fff;
            margin: 0 5px;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            color: #fff;
            box-shadow: 0 2px 10px rgba(0, 123, 255, 0.3);
        }

        .pagination .page-item .page-link:hover {
            background-color: #f1f3f5;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center text-white mb-4">Quản lý Nhân sự</h4>
        <a href="index.php" class="active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
        <a href="#"><i class="fas fa-users me-2"></i> Nhân viên</a>
        <a href="#"><i class="fas fa-money-bill me-2"></i> Lương</a>
        <a href="#"><i class="fas fa-chart-bar me-2"></i> Báo cáo</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Đăng xuất</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom mb-4">
            <div class="container-fluid">
                <span class="navbar-brand fw-bold">Thông tin Nhân viên</span>
                <div class="ms-auto">
                    <span class="navbar-text greeting-message fw-medium">
                        Xin chào, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Khách'; ?>!
                    </span>
                </div>
            </div>
        </nav>

        <!-- Search and Add Employee Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="search-bar">
                <form method="get" action="index.php">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm nhân viên..."
                            value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                <a href="index.php?action=create" class="btn btn-primary btn-custom"><i class="fas fa-plus me-2"></i> Thêm
                    nhân viên</a>
            <?php endif; ?>
        </div>

        <!-- Employee Table -->
        <div class="table-card">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã Nhân Viên <i class="fas fa-sort sort-icon"></i></th>
                        <th>Tên Nhân Viên <i class="fas fa-sort sort-icon"></i></th>
                        <th>Giới tính</th>
                        <th>Nơi Sinh <i class="fas fa-sort sort-icon"></i></th>
                        <th>Tên Phòng <i class="fas fa-sort sort-icon"></i></th>
                        <th>Lương <i class="fas fa-sort sort-icon"></i></th>
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                            <th>Thao tác</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($nhanviens) > 0): ?>
                        <?php foreach ($nhanviens as $nhanvien): ?>
                            <tr>
                                <td><?php echo $nhanvien["Ma_NV"]; ?></td>
                                <td><?php echo $nhanvien["Ten_NV"]; ?></td>
                                <td>
                                    <img src='app/public/<?php echo ($nhanvien["Phai"] == "NU" ? "woman.jpg" : "man.jpg"); ?>'
                                        alt='<?php echo ($nhanvien["Phai"] == "NU" ? "Nữ" : "Nam"); ?>' class="avatar">
                                </td>
                                <td><?php echo $nhanvien["Noi_Sinh"]; ?></td>
                                <td><?php echo $nhanvien["Ten_Phong"]; ?></td>
                                <td><?php echo number_format($nhanvien["Luong"]); ?></td>
                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                                    <td>
                                        <a href="index.php?action=edit&Ma_NV=<?php echo $nhanvien["Ma_NV"]; ?>"
                                            class="btn btn-warning btn-custom me-2"><i class="fas fa-edit"></i></a>
                                        <a href="index.php?action=delete&Ma_NV=<?php echo $nhanvien["Ma_NV"]; ?>"
                                            class="btn btn-danger btn-custom"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?')"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan='<?php echo (isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ? 7 : 6); ?>'
                                class="text-center py-5 text-muted">
                                Không có dữ liệu
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                        <a class="page-link"
                            href="index.php?page=<?php echo $i; ?><?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.table th').forEach(header => {
            header.addEventListener('click', () => {
                const column = header.textContent.trim().toLowerCase().replace(' ', '_');
                console.log(`Sắp xếp theo cột: ${column}`);
            });
        });
    </script>
</body>

</html>