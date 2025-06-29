<?php
require_once __DIR__ . '/../../configs/config.php';         // chứa $conn
require_once __DIR__ . '/../models/CourseModel.php';

class CoursesController {
    public function index() {
        global $conn; // hoặc dùng trực tiếp nếu được require đúng

        $courseModel = new CourseModel($conn);
        $courseModel->createTable(); // tạo bảng
        $courses = $courseModel->getAllCourses();
        // Load view
        include __DIR__ . '/../views/partials/header.php';
        include __DIR__ . '/../views/pages/courses.php';
        include __DIR__ . '/../views/partials/footer.php';
    }
}