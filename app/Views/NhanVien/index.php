<!DOCTYPE html>
<html>
<head>
    <title>THÔNG TIN NHÂN VIÊN</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-top: 20px;
        }

        /* Table Styles */
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 12px 15px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
            font-weight: 500;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Image Styles */
        img {
            vertical-align: middle;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Pagination Styles */
        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a, .pagination span {
            display: inline-block;
            padding: 8px 12px;
            margin: 3px;
            border: 1px solid #007bff;
            text-decoration: none;
            color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination .current {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        /* Button Styles */
        .button {
            display: inline-block;
            padding: 8px 12px;
            margin: 3px;
            border: 1px solid #007bff;
            text-decoration: none;
            color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        .button:hover {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <h1>THÔNG TIN NHÂN VIÊN</h1>
    <?php
    session_start();
    if ($_SESSION['role'] == 'admin'): ?>
        <a href="Controllers/NhanVienController.php?action=create" class="button">Thêm nhân viên</a>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Giới tính</th>
                <th>Nơi Sinh</th>
                <th>Tên Phòng</th>
                <th>Lương</th>
                <?php if ($_SESSION['role'] == 'admin'): ?>
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
                            <img src='../public/<?php echo ($nhanvien["Phai"] == "NU" ? "woman.jpg" : "man.jpg"); ?>'
                                 alt='<?php echo ($nhanvien["Phai"] == "NU" ? "Nữ" : "Nam"); ?>'>
                        </td>
                        <td><?php echo $nhanvien["Noi_Sinh"]; ?></td>
                        <td><?php echo $nhanvien["Ten_Phong"]; ?></td>
                        <td><?php echo number_format($nhanvien["Luong"]); ?></td>
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                            <td>
                                <a href="Controllers/NhanVienController.php?action=edit&Ma_NV=<?php echo $nhanvien["Ma_NV"]; ?>" class="button">Sửa</a>
                                <a href="Controllers/NhanVienController.php?action=delete&Ma_NV=<?php echo $nhanvien["Ma_NV"]; ?>" class="button" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?')">Xóa</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan='<?php echo ($_SESSION['role'] == 'admin' ? 7 : 6); ?>'>Không có dữ liệu</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class='pagination'>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <?php if ($i == $page): ?>
                <span class='current'><?php echo $i; ?></span>
            <?php else: ?>
                <a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
    <a href="logout.php">Đăng xuất</a>
</body>
</html>
