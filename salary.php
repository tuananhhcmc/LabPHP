<?php
// Bắt đầu session
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa và có phải admin không
if (!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Nếu không phải admin, chuyển hướng về trang đăng nhập hoặc trang chính
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lương - Quản lý Nhân sự</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
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

        .salary-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 20px;
            border: 1px solid #e9ecef;
            margin-bottom: 20px;
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
            border: none;
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

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px;
        }

        .form-label {
            font-weight: 500;
            color: #343a40;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center text-white mb-4">Quản lý Nhân sự</h4>
        <a href="index.php"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
        <a href="#"><i class="fas fa-users me-2"></i> Nhân viên</a>
        <a href="salary.php" class="active"><i class="fas fa-money-bill me-2"></i> Lương</a>
        <a href="reports.php"><i class="fas fa-chart-bar me-2"></i> Báo cáo</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Đăng xuất</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom mb-4">
            <div class="container-fluid">
                <span class="navbar-brand fw-bold">Quản lý Lương</span>
                <div class="ms-auto">
                    <span class="navbar-text greeting-message fw-medium">
                        Xin chào, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Khách'; ?>!
                    </span>
                </div>
            </div>
        </nav>

        <!-- Salary Filter Form -->
        <div class="salary-card">
            <h5 class="mb-4">Lọc thông tin lương</h5>
            <form method="GET" action="salary.php">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="employee_id" class="form-label">Mã nhân viên</label>
                        <input type="text" class="form-control" id="employee_id" name="employee_id"
                            placeholder="Nhập mã NV">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="department" class="form-label">Phòng ban</label>
                        <select class="form-select" id="department" name="department">
                            <option value="">Tất cả</option>
                            <option value="QT">Phòng QT</option>
                            <option value="TP HCM">Phòng TP HCM</option>
                            <option value="KT">Phòng KT</option>
                            <option value="TC">Phòng TC</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="month" class="form-label">Tháng</label>
                        <input type="month" class="form-control" id="month" name="month">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter me-2"></i> Lọc dữ
                        liệu</button>
                </div>
            </form>
        </div>

        <!-- Salary Table -->
        <div class="salary-card">
            <h5 class="mb-4">Bảng lương nhân viên</h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã NV</th>
                        <th>Tên NV</th>
                        <th>Phái</th>
                        <th>Nơi Sinh</th>
                        <th>Mã Phòng</th>
                        <th>Lương (VNĐ)</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Kết nối cơ sở dữ liệu
                    $conn = mysqli_connect("localhost", "root", "", "QL_NhanSu");
                    if (!$conn) {
                        die("Kết nối thất bại: " . mysqli_connect_error());
                    }

                    // Truy vấn dữ liệu
                    $query = "SELECT Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong FROM nhanvien WHERE 1=1";
                    $conditions = [];

                    // Lọc theo mã nhân viên
                    $employee_id = isset($_GET['employee_id']) ? $_GET['employee_id'] : '';
                    if ($employee_id) {
                        $conditions[] = "Ma_NV = '$employee_id'";
                    }

                    // Lọc theo phòng ban
                    $department = isset($_GET['department']) ? $_GET['department'] : '';
                    if ($department) {
                        $conditions[] = "Ma_Phong = '$department'";
                    }

                    // Lọc theo tháng (giả định có cột ngày lương, ví dụ: salary_date)
                    $month = isset($_GET['month']) ? $_GET['month'] : '';
                    if ($month) {
                        $year = substr($month, 0, 4);
                        $month_num = substr($month, 5, 2);
                        // Giả định có cột salary_date trong bảng nhanvien
                        // $conditions[] = "YEAR(salary_date) = '$year' AND MONTH(salary_date) = '$month_num'";
                    }

                    if (!empty($conditions)) {
                        $query .= " AND " . implode(" AND ", $conditions);
                    }

                    $result = mysqli_query($conn, $query);
                    $salaries = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    if (count($salaries) > 0):
                        foreach ($salaries as $salary):
                            ?>
                            <tr>
                                <td><?php echo $salary["Ma_NV"]; ?></td>
                                <td><?php echo $salary["Ten_NV"]; ?></td>
                                <td>
                                    <img src='app/public/<?php echo ($salary["Phai"] == "NU" ? "woman.jpg" : "man.jpg"); ?>'
                                        alt='<?php echo ($salary["Phai"] == "NU" ? "Nữ" : "Nam"); ?>' class="avatar">
                                </td>
                                <td><?php echo $salary["Noi_Sinh"]; ?></td>
                                <td><?php echo $salary["Ma_Phong"]; ?></td>
                                <td><?php echo number_format($salary["Luong"]); ?></td>
                                <td>
                                    <a href="edit_salary.php?Ma_NV=<?php echo $salary["Ma_NV"]; ?>"
                                        class="btn btn-warning btn-custom me-2"><i class="fas fa-edit"></i></a>
                                    <a href="confirm_delete.php?Ma_NV=<?php echo $salary["Ma_NV"]; ?>"
                                        class="btn btn-danger btn-custom"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan='7' class="text-center py-5 text-muted">
                                Không có dữ liệu
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>