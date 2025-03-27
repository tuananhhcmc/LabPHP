<!DOCTYPE html>
<html>
<head>
    <title>Thêm nhân viên</title>
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

        form {
            width: 50%;
            margin: 20px auto;
            padding: 30px; /* Tăng padding */
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); /* Tăng shadow */
            border-radius: 12px; /* Tăng border-radius */
            border: 1px solid #ddd; /* Thêm border */
        }

        label {
            display: block;
            margin-bottom: 8px; /* Tăng margin */
            font-weight: 500; /* Medium font-weight */
            color: #555; /* Màu chữ đậm hơn */
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 12px; /* Tăng padding */
            margin-bottom: 20px; /* Tăng margin */
            border: 1px solid #ccc;
            border-radius: 6px; /* Tăng border-radius */
            box-sizing: border-box;
            font-size: 16px; /* Tăng font-size */
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 14px 24px; /* Tăng padding */
            border: none;
            border-radius: 6px; /* Tăng border-radius */
            cursor: pointer;
            transition: background-color 0.3s ease; /* Thêm transition */
            font-size: 16px; /* Tăng font-size */
            font-weight: 500; /* Medium font-weight */
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Đảm bảo các phần tử căn chỉnh đẹp hơn */
        select {
            appearance: none;
            background-image: url('data:image/svg+xml;charset=UTF-8,<svg viewBox="0 0 12 6" fill="%23343a40" xmlns="http://www.w3.org/2000/svg"><path d="M10.293 0.293L6 4.586L1.707 0.293C1.317 -0.098 0.683 -0.098 0.293 0.293C-0.098 0.683 -0.098 1.317 0.293 1.707L5.293 6.707C5.683 7.098 6.317 7.098 6.707 6.707L11.707 1.707C12.098 1.317 12.098 0.683 11.707 0.293C11.317 -0.098 10.683 -0.098 10.293 0.293Z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 12px top 50%;
            background-size: 12px;
            padding-right: 30px;
        }
    </style>
</head>
<body>
    <h1>Thêm nhân viên</h1>
    <form action="index.php?action=store" method="post">
        <label for="Ma_NV">Mã Nhân Viên:</label>
        <input type="text" id="Ma_NV" name="Ma_NV" required>

        <label for="Ten_NV">Tên Nhân Viên:</label>
        <input type="text" id="Ten_NV" name="Ten_NV" required>

        <label for="Phai">Giới tính:</label>
        <select id="Phai" name="Phai">
            <option value="NAM">Nam</option>
            <option value="NU">Nữ</option>
        </select>

        <label for="Noi_Sinh">Nơi Sinh:</label>
        <input type="text" id="Noi_Sinh" name="Noi_Sinh">

        <label for="Ma_Phong">Mã Phòng:</label>
        <select id="Ma_Phong" name="Ma_Phong" required>
            <option value="QT">Quản Trị (QT)</option>
            <option value="TC">Tài Chính (TC)</option>
            <option value="KT">Kỹ Thuật (KT)</option>
        </select>

        <label for="Luong">Lương:</label>
        <input type="number" id="Luong" name="Luong" required>

        <input type="submit" value="Thêm">
    </form>
</body>
</html>
