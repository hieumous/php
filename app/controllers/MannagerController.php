<?php
class MannagerController {
    public function index() {
        require_once __DIR__ . '/../../configs/config.php';
        require_once __DIR__ . '/../models/CourseModel.php';

        $courseModel = new CourseModel($conn);
         

        if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $courseModel->deleteCourse($id);
    header("Location: mannager.php"); // hoặc tự động làm mới lại trang hiện tại
    exit;
}
       
        // 5. Lấy danh sách khoá học
        $courses = $courseModel->getAllCourses();

        // 6. Gọi view
        include __DIR__ . '/../views/pages/mannager.php';
        include __DIR__ . '/../views/partials/footer.php';
    }
}
