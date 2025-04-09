<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo - Quản lý Nhân sự</title>
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

        .report-card {
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

        .btn-primary {
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 14px;
            transition: all 0.3s;
            background: linear-gradient(90deg, #007bff, #0056b3);
            border: none;
        }

        .btn-primary:hover {
            opacity: 0.85;
            transform: translateY(-1px);
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
        <a href="#"><i class="fas fa-money-bill me-2"></i> Lương</a>
        <a href="reports.php" class="active"><i class="fas fa-chart-bar me-2"></i> Báo cáo</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Đăng xuất</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom mb-4">
            <div class="container-fluid">
                <span class="navbar-brand fw-bold">Báo cáo Nhân sự</span>
                <div class="ms-auto">
                    <span class="navbar-text greeting-message fw-medium">
                        Xin chào, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Khách'; ?>!
                    </span>
                </div>
            </div>
        </nav>

        <!-- Report Form -->
        <div class="report-card">
            <h5 class="mb-4">Tạo báo cáo</h5>
            <form method="GET" action="reports.php">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="department" class="form-label">Phòng ban</label>
                        <select class="form-select" id="department" name="department">
                            <option value="">Tất cả</option>
                            <option value="IT">Phòng IT</option>
                            <option value="HR">Phòng Nhân sự</option>
                            <option value="Finance">Phòng Tài chính</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="start_date" class="form-label">Từ ngày</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="end_date" class="form-label">Đến ngày</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-chart-line me-2"></i> Tạo báo
                        cáo</button>
                </div>
            </form>
        </div>

        <!-- Report Table -->
        <div class="report-card">
            <h5 class="mb-4">Thống kê Nhân sự</h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Phòng ban</th>
                        <th>Số nhân viên</th>
                        <th>Tổng lương (VNĐ)</th>
                        <th>Lương trung bình (VNĐ)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Sample data - Replace with actual database query
                    $reports = [
                        ["Ten_Phong" => "Phòng IT", "So_Nhan_Vien" => 15, "Tong_Luong" => 225000000, "Luong_TB" => 15000000],
                        ["Ten_Phong" => "Phòng Nhân sự", "So_Nhan_Vien" => 8, "Tong_Luong" => 96000000, "Luong_TB" => 12000000],
                        ["Ten_Phong" => "Phòng Tài chính", "So_Nhan_Vien" => 10, "Tong_Luong" => 150000000, "Luong_TB" => 15000000],
                    ];

                    // Filter logic (simplified for demo)
                    $department = isset($_GET['department']) ? $_GET['department'] : '';
                    if ($department) {
                        $reports = array_filter($reports, function ($report) use ($department) {
                            return $report['Ten_Phong'] == "Phòng " . $department;
                        });
                    }

                    foreach ($reports as $report):
                        ?>
                        <tr>
                            <td><?php echo $report["Ten_Phong"]; ?></td>
                            <td><?php echo $report["So_Nhan_Vien"]; ?></td>
                            <td><?php echo number_format($report["Tong_Luong"]); ?></td>
                            <td><?php echo number_format($report["Luong_TB"]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>