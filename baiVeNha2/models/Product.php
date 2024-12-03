<?php
class Product {
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function getAll() {
        if (file_exists($this->file)) {
            return include $this->file;
        }
        return [];
    }

    public function saveAll($products) {
        $content = "<?php\n\$products = " . var_export($products, true) . ";\n";
        file_put_contents($this->file, $content);
    }

    public function add($name, $price, $imagePath) {
        $products = $this->getAll();
        $products[] = ['name' => $name, 'price' => $price, 'image' => $imagePath];
        $this->saveAll($products);
    }

    public function update($id, $name, $price, $imagePath = null) {
        $products = $this->getAll();
        if (isset($products[$id])) {
            $products[$id]['name'] = $name;
            $products[$id]['price'] = $price;
            if ($imagePath) {
                $products[$id]['image'] = $imagePath;
            }
            $this->saveAll($products);
        }
    }

    public function delete($id) {
        $products = $this->getAll();
        if (isset($products[$id])) {
            unset($products[$id]);
            $this->saveAll(array_values($products)); // Reset lại chỉ mục
        }
    }
}
