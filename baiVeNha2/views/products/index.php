<?php include 'views/layouts/header.php'; ?>

<main>
    <h2>Danh Sách Sản Phẩm</h2>
    <div class="container">
        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">Thêm Sản Phẩm</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Hình Ảnh</th>
                    <th>Giá</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'dulieu.php';
                if (!empty($this->products) && is_array($this->products)):
                    foreach ($this->products as $id => $product): ?>
                        <tr>
                            <td><?= $id + 1 ?></td>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><img src="<?= htmlspecialchars($product['image']) ?>" width="50"></td>
                            <td><?= number_format($product['price']) ?> VND</td>
                            <td>
                                <a href="#editEmployeeModal"
                                    class="btn btn-primary edit-btn"
                                    data-id="<?= $id ?>"
                                    data-name="<?= htmlspecialchars($product['name']) ?>"
                                    data-price="<?= htmlspecialchars($product['price']) ?>"
                                    data-image="<?= htmlspecialchars($product['image']) ?>"
                                    data-toggle="modal">Sửa</a>

                                <form method="post" action="index.php?action=delete" style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <button type="submit" name="delete" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Không có sản phẩm nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Modals -->
<!-- Add Product Modal -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="index.php?action=add" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Giá thành</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                    <input type="submit" name="add" class="btn btn-success" value="Thêm">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<!-- Edit Product Modal -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="index.php?action=edit" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit-id">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="name" id="edit-name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Giá thành</label>
                        <input type="number" name="price" id="edit-price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control">
                        <small id="current-image"></small> <!-- Hiển thị ảnh hiện tại -->
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                    <input type="submit" name="edit" class="btn btn-primary" value="Sửa">
                </div>
            </form>
        </div>
    </div>
</div>


<?php include 'views/layouts/footer.php'; ?>