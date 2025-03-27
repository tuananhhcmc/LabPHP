<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
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
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Đăng nhập</h1>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="process_login.php" method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username">

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password">

        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>
