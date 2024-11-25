<?php include 'header.php'; ?>
<?php
include 'flowers.php'; // Thay thế 'products.php' thành 'flowers.php'

if (isset($_POST['add'])) {
    $imgPaths = [];
    if (isset($_FILES['images'])) {
        $target_dir = "img/";
        foreach ($_FILES['images']['name'] as $key => $imageName) {
            if (!empty($imageName)) {
                $target_file = $target_dir . basename($imageName);
                if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
                    $imgPaths[] = $target_file;
                }
            }
        }
    }

    // Xác định ID lớn nhất hiện có và tăng thêm 1
    $maxId = 0;
    foreach ($flowers as $flower) {
        if (isset($flower['id']) && $flower['id'] > $maxId) {
            $maxId = $flower['id'];
        }
    }
    $newId = $maxId + 1;

    $flowers[] = [
        'id' => $newId,
        'name' => $_POST['name'],
        'des' => $_POST['description'],
        'img' => $imgPaths
    ];

    file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";");
}




if (isset($_POST['edit'])) {
    $id = intval($_POST['id']); // Lấy ID cần sửa

    foreach ($flowers as $index => $flower) { // Dùng $index thay vì $key
        if ($flower['id'] === $id) { // Tìm phần tử có ID khớp
            $imgPaths = $flower['img']; // Giữ lại ảnh cũ
            if (isset($_FILES['images'])) {
                $target_dir = "img/";
                foreach ($_FILES['images']['name'] as $key => $imageName) { // Sử dụng $key cho $_FILES
                    if (!empty($imageName)) {
                        $target_file = $target_dir . basename($imageName);
                        if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
                            $imgPaths[$key] = $target_file; // Cập nhật ảnh
                        }
                    }
                }
            }

            // Cập nhật thông tin phần tử trong mảng
            $flowers[$index] = [
                'id' => $id,
                'name' => $_POST['name'],
                'des' => $_POST['description'],
                'img' => $imgPaths
            ];

            break; // Thoát khỏi vòng lặp sau khi tìm thấy phần tử
        }
    }

    file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";");
}


if (isset($_POST['delete'])) {
    $id = intval($_POST['id']); // Chuyển ID từ chuỗi thành số nguyên

    foreach ($flowers as $key => $flower) {
        if ($flower['id'] === $id) { // Tìm phần tử có ID khớp
            unset($flowers[$key]);
            break;
        }
    }

    $flowers = array_values($flowers); // Đánh lại chỉ số mảng
    file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";");
}


?>

<main>
    <div class="table-title">
        <div class="row ">
            <div class="col-sm-6 addButton">
                <a href="#addFlowerModal" class="btn btn-success" data-toggle="modal"><i
                        class="material-icons">&#xE147;</i> <span>Thêm hoa</span></a>
            </div>
        </div>
    </div>

    <!-- bai tao lam -->
    <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Tên hoa</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($flowers)): ?>
            <tr>
                <td colspan="5" class="text-center">Không có hoa nào.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($flowers as $flower): ?>
                <tr>
                    <td><?= htmlspecialchars($flower['id']) ?></td>
                    <td><?= htmlspecialchars($flower['name']) ?></td>
                    <td><?= htmlspecialchars($flower['des']) ?></td>
                    <td>
                        <?php foreach ($flower['img'] as $img): ?>
                            <img src="<?= htmlspecialchars($img) ?>" alt="Ảnh hoa" style="width: 80px; height: auto;">
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <a href="#editFlowerModal" 
                           class="edit btn btn-warning btn-sm" 
                           data-id="<?= htmlspecialchars($flower['id']) ?>" 
                           data-name="<?= htmlspecialchars($flower['name']) ?>" 
                           data-description="<?= htmlspecialchars($flower['des']) ?>" 
                           data-images='<?= json_encode($flower['img']) ?>' 
                           data-toggle="modal">
                            <i class="material-icons">edit</i>
                        </a>
                        <a href="#deleteFlowerModal" 
                           class="delete btn btn-danger btn-sm" 
                           data-id="<?= htmlspecialchars($flower['id']) ?>" 
                           data-toggle="modal">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<div class="clearfix">
    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
    <ul class="pagination">
        <li class="page-item disabled"><a href="#">Previous</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link">Next</a></li>
    </ul>
</div>

</main>

<!-- Modal Thêm Hoa -->
<div class="modal fade" id="addFlowerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm hoa mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tên hoa -->
                    <div class="mb-3">
                        <label for="add-name" class="form-label">Tên hoa <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="add-name" placeholder="Nhập tên hoa" required>
                    </div>
                    <!-- Mô tả -->
                    <div class="mb-3">
                        <label for="add-description" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="description" id="add-description" rows="3" placeholder="Nhập mô tả"></textarea>
                    </div>
                    <!-- Ảnh -->
                    <div class="mb-3">
                        <label for="add-images" class="form-label">Ảnh hoa</label>
                        <input type="file" class="form-control" name="images[]" id="add-images" multiple>
                        <small class="text-muted">Chọn nhiều ảnh nếu cần.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" name="add" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>





<!-- Modal Chỉnh Sửa -->
<div class="modal fade" id="editFlowerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa hoa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- ID ẩn -->
                    <input type="hidden" name="id" id="edit-id">
                    <!-- Tên hoa -->
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Tên hoa <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="edit-name" placeholder="Nhập tên hoa" required>
                    </div>
                    <!-- Mô tả -->
                    <div class="mb-3">
                        <label for="edit-description" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="description" id="edit-description" rows="3" placeholder="Nhập mô tả"></textarea>
                    </div>
                    <!-- Ảnh hiện tại -->
                    <div class="mb-3">
                        <label>Ảnh hiện tại:</label>
                        <div class="d-flex flex-wrap gap-2" id="current-images">
                            <!-- Ảnh hiện tại sẽ được hiển thị ở đây -->
                        </div>
                    </div>
                    <!-- Thay đổi ảnh -->
                    <div class="mb-3">
                        <label for="edit-images" class="form-label">Thay ảnh</label>
                        <input type="file" class="form-control" name="images[]" id="edit-images" multiple>
                        <small class="text-muted">Để trống nếu không muốn thay đổi ảnh.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" name="edit" class="btn btn-warning">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal Xóa -->
<div class="modal fade" id="deleteFlowerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa hoa <strong id="delete-flower-name"></strong> không?</p>
                    <input type="hidden" name="id" id="delete-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" name="delete" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).on("click", ".edit", function() {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var description = $(this).data("description");
        var images = $(this).data("images");

        $("#edit-id").val(id);
        $("#edit-name").val(name);
        $("#edit-description").val(description);

        var imageContainer = $("#current-images");
        imageContainer.empty();
        if (images && images.length > 0) {
            images.forEach(function(img) {
                var imgTag = '<img src="' + img + '" alt="Ảnh hiện tại" style="width: 100px; margin-right: 10px;">';
                imageContainer.append(imgTag);
            });
        }

        $("#editFlowerModal").modal("show");
    });

    $(document).on("click", ".delete", function() {
        var id = $(this).data("id");
        $("#delete-id").val(id);
        $("#deleteFlowerModal").modal("show");
    });
</script>



<?php include 'footer.php'; ?>