<?php
class HomeController {
    public function index() {
        include __DIR__ . '/../views/partials/header.php';
        include __DIR__ . '/../views/pages/home.php';
        include __DIR__ . '/../views/partials/footer.php';
    }
}