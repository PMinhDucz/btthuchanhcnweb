<?php
require_once 'dulieu.php';

class ProductController
{
    private $products;
    private $dataFile;

    public function __construct($dataFile = 'dulieu.php')
    {
        $this->dataFile = $dataFile;

        // Kiểm tra nếu file `dulieu.php` trả về giá trị không phải mảng
        $this->products = include $dataFile;
        if (!is_array($this->products)) {
            $this->products = []; // Gán giá trị mặc định là mảng rỗng
        }
    }

    public function index()
    {
        include 'views/products/index.php';
    }

    public function add()
    {
        if (isset($_POST['add'])) {
            $imagePath = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "img/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $imagePath = $target_file;
                }
            }

            // Thêm sản phẩm mới
            $this->products[] = [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'image' => $imagePath,
            ];

            $this->saveProducts();
            header('Location: index.php');
            exit;
        }
    }

    public function edit()
    {
        if (isset($_POST['edit'])) {
            $id = $_POST['id'];

            // Kiểm tra nếu sản phẩm tồn tại
            if (isset($this->products[$id])) {
                $imagePath = $this->products[$id]['image']; // Sử dụng ảnh cũ nếu không thay đổi
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $target_dir = "img/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $imagePath = $target_file;
                    }
                }

                // Cập nhật sản phẩm
                $this->products[$id] = [
                    'name' => $_POST['name'],
                    'price' => $_POST['price'],
                    'image' => $imagePath,
                ];

                $this->saveProducts();
            }

            header('Location: index.php');
            exit;
        }
    }

    public function delete()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];

            // Xóa sản phẩm nếu tồn tại
            if (isset($this->products[$id])) {
                unset($this->products[$id]);
                $this->products = array_values($this->products); // Đánh lại chỉ mục mảng
                $this->saveProducts();
            }

            header('Location: index.php');
            exit;
        }
    }

    private function saveProducts()
    {
        // Kiểm tra quyền ghi vào file
        if (is_writable($this->dataFile)) {
            file_put_contents($this->dataFile, "<?php\nreturn " . var_export($this->products, true) . ";");
        } else {
            die("File {$this->dataFile} không thể ghi.");
        }
    }
}
