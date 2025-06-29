<?php
require_once __DIR__ . '/../configs/config.php';
require_once __DIR__ . '/../app/models/CourseModel.php';

$courseModel = new CourseModel($conn);
$course = null;
$imagePath = null;

// Nếu là sửa
if (isset($_GET['id'])) {
    $course = $courseModel->getCourseById((int)$_GET['id']);
}

// Nếu form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Xử lý upload ảnh nếu có
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $fileName = basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $fileName;

        // Tạo thư mục nếu chưa có
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $imagePath = $targetPath;
        }
    }

    // Nếu là cập nhật
    if (isset($_POST['update'])) {
        $courseModel->updateCourse(
            $_POST['id'],
            $_POST['title'],
            $_POST['price'],
            $_POST['rating'],
            $_POST['total_reviews'],
            $_POST['instructor_name'],
            $_POST['duration'],
            $_POST['student_count'],
            $imagePath ?: $course['image_path'], // nếu không upload thì giữ nguyên ảnh cũ
            $_POST['description']
        );
    } else {
        // Thêm mới
        $courseModel->addCourse(
            $_POST['title'],
            $_POST['price'],
            $_POST['rating'],
            $_POST['total_reviews'],
            $_POST['instructor_name'],
            $_POST['duration'],
            $_POST['student_count'],
            $imagePath, // ảnh bắt buộc upload
            $_POST['description']
        );
    }

    header("Location: mannager.php");
    exit;
}
?>

<?php include __DIR__ . '/../app/views/partials/header.php'; ?>

<div class="container my-5">
    <h3><?= $course ? "✏️ Sửa khóa học" : "➕ Thêm khóa học mới" ?></h3>

    <form method="post" enctype="multipart/form-data" class="row g-3">
        <?php if ($course): ?>
            <input type="hidden" name="id" value="<?= $course['id'] ?>">
            <input type="hidden" name="update" value="1">
        <?php else: ?>
            <input type="hidden" name="add" value="1">
        <?php endif; ?>

        <!-- Tiêu đề -->
        <div class="col-md-6">
            <label class="form-label">Tiêu đề <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" required value="<?= $course['title'] ?? '' ?>">
        </div>

        <!-- Giá -->
        <div class="col-md-3">
            <label class="form-label">Giá ($) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="price" class="form-control" required value="<?= $course['price'] ?? '' ?>">
        </div>

        <!-- Số sao -->
        <div class="col-md-3">
            <label class="form-label">Số sao (0–5)</label>
            <input type="number" name="rating" min="0" max="5" class="form-control" value="<?= $course['rating'] ?? '' ?>">
        </div>

        <!-- Lượt đánh giá -->
        <div class="col-md-4">
            <label class="form-label">Lượt đánh giá</label>
            <input type="number" name="total_reviews" class="form-control" value="<?= $course['total_reviews'] ?? '' ?>">
        </div>

        <!-- Giảng viên -->
        <div class="col-md-4">
            <label class="form-label">Tên giảng viên</label>
            <input type="text" name="instructor_name" class="form-control" value="<?= $course['instructor_name'] ?? '' ?>">
        </div>

        <!-- Thời lượng -->
        <div class="col-md-4">
            <label class="form-label">Thời lượng</label>
            <input type="text" name="duration" class="form-control" value="<?= $course['duration'] ?? '' ?>">
        </div>

        <!-- Số học viên -->
        <div class="col-md-4">
            <label class="form-label">Số học viên</label>
            <input type="number" name="student_count" class="form-control" value="<?= $course['student_count'] ?? '' ?>">
        </div>

        <!-- Ảnh -->
        <div class="col-md-8">
            <label class="form-label">Tải ảnh khóa học</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <?php if (!empty($course['image_path'])): ?>
                <p class="mt-2">Ảnh hiện tại:</p>
                <img src="<?= htmlspecialchars($course['image_path']) ?>" width="100" class="img-thumbnail">
            <?php endif; ?>
        </div>

        <!-- Mô tả -->
        <div class="col-12">
            <label class="form-label">Mô tả khóa học</label>
            <textarea name="description" rows="3" class="form-control"><?= $course['description'] ?? '' ?></textarea>
        </div>

        <!-- Nút Lưu -->
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-<?= $course ? 'warning' : 'success' ?>">
                <?= $course ? '💾 Cập nhật' : '💾 Thêm mới' ?>
            </button>
            <a href="mannager.php" class="btn btn-secondary">🔙 Quay lại</a>
        </div>
    </form>
</div>


<?php include __DIR__ . '/../app/views/partials/footer.php'; ?>
