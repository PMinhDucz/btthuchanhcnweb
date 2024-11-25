<?php

$products = [];
$csv = fopen('data.csv','r');
while(($rs = fgetcsv($csv)) !== false){
    array_push($products,$rs);
}
if (isset($_GET['name'])) {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $namecheck = $_GET['name'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $new = [$name,$price];
    $count = 0;
    foreach($products as $product ){
        $count++;
        if($product[0] == $namecheck){
            $products[$count-1] = $new;
        }
    }
    // array_push($products,$new);
    $csvw = fopen('data.csv','w');
        
        foreach($products as $product){
            fputcsv($csvw,$product);
        }
    
     fclose($csvw);
    header("Location: index.php");
    print_r($products);   
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Mới Sản Phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .btn {
            width: 100%;
            padding: 12px;
            font-size: 16px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2 class="text-center mb-4">Thêm Mới Sản Phẩm</h2>
    <form method="POST" enctype="multipart/form-data">
        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm" required>
        </div>

        <!-- Price Field -->
        <div class="form-group">
            <label for="price">Giá sản phẩm</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Nhập giá sản phẩm" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>

</body>
</html>
