<?php include 'flowers.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afamily - 14 loại hoa tuyệt đẹp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <h1 class="logo">Afamily.vn</h1>
            <nav class="navbar">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Tin mới</a></li>
                    <li><a href="#">Xu hướng</a></li>
                    <li><a href="#">Đời sống</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h1>
            <?php foreach ($flowers as $flower): ?>
                <div class="flower mt-3">
                    <span style="font-weight: bold;">  <?php echo $flower['name']; ?></span>
                    <p class="mt-2"><?php echo $flower['des']; ?></p>
                    <?php foreach ($flower['img'] as $image): ?>
                        <img src="<?php echo $image; ?>" alt="<?php echo $flower['name']; ?>" style="max-width: 100%; height: auto;">
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="col-md-3"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Afamily.vn. Mọi quyền được bảo lưu.</p>
        </div>
    </footer>
</body>

</html>