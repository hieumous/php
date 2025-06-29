<?php
require_once __DIR__ . '/../../configs/config.php';       // <- để có $conn
require_once __DIR__ . '/../models/CourseModel.php';

class HomeController {
    public function index() {
        global $conn; // hoặc truyền $conn vào trực tiếp constructor

        $courseModel = new CourseModel($conn);  // <- CHÍNH XÁC
        $courses = $courseModel->getAllCourses();

        include __DIR__ . '/../views/partials/header.php';
        include __DIR__ . '/../views/pages/home.php';
        include __DIR__ . '/../views/partials/footer.php';
    }
}