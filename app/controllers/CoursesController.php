<?php
class CoursesController {
    public function index() {
        include __DIR__ . '/../views/partials/header.php';
        include __DIR__ . '/../views/pages/Courses.php';
        include __DIR__ . '/../views/partials/footer.php';
    }
}