<div class="container my-4">
    <h3 class="mb-3">➕ Thêm khóa học mới</h3>

    <!-- Form gửi dữ liệu POST về chính trang mannager.php -->
    <form method="post" action="" class="row g-3">
        <!-- Đánh dấu là hành động thêm -->
        <input type="hidden" name="add" value="1">

        <!-- Tiêu đề -->
        <div class="col-md-6">
            <label class="form-label">Tiêu đề <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <!-- Giá -->
        <div class="col-md-3">
            <label class="form-label">Giá ($) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <!-- Số sao -->
        <div class="col-md-3">
            <label class="form-label">Số sao (0-5) <span class="text-danger">*</span></label>
            <input type="number" name="rating" min="0" max="5" class="form-control" required>
        </div>

        <!-- Lượt đánh giá -->
        <div class="col-md-4">
            <label class="form-label">Lượt đánh giá</label>
            <input type="number" name="total_reviews" class="form-control">
        </div>

        <!-- Giảng viên -->
        <div class="col-md-4">
            <label class="form-label">Tên giảng viên</label>
            <input type="text" name="instructor_name" class="form-control">
        </div>

        <!-- Thời lượng -->
        <div class="col-md-4">
            <label class="form-label">Thời lượng</label>
            <input type="text" name="duration" class="form-control">
        </div>

        <!-- Số học viên -->
        <div class="col-md-4">
            <label class="form-label">Số học viên</label>
            <input type="number" name="student_count" class="form-control">
        </div>

        <!-- Ảnh khóa học -->
        <div class="col-md-8">
            <label class="form-label">Đường dẫn ảnh</label>
            <input type="text" name="image_path" class="form-control">
        </div>

        <!-- Mô tả -->
        <div class="col-12">
            <label class="form-label">Mô tả khóa học</label>
            <textarea name="description" rows="3" class="form-control"></textarea>
        </div>

        <!-- Nút lưu -->
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-success">
                💾 Lưu khóa học
            </button>
        </div>
    </form>
</div>

<hr class="my-4">
