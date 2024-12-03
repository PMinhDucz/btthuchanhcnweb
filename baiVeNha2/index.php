<?php
require_once 'controllers/ProductController.php';

// Đường dẫn đến file chứa dữ liệu
$dataFile = 'dulieu.php';

// Khởi tạo controller
$productController = new ProductController($dataFile);

// Xử lý hành động từ URL
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'add':
        // Gọi hàm thêm sản phẩm
        $productController->add();
        break;
    case 'edit':
        // Gọi hàm sửa sản phẩm
        $productController->edit();
        break;
    case 'delete':
        // Gọi hàm xóa sản phẩm
        $productController->delete();
        break;
    default:
        // Hiển thị danh sách sản phẩm
        $productController->index();
        break;
}
