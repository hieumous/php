<?php
class AboutController {
    public function index() {
        include __DIR__ . '/../views/partials/header.php';
        include __DIR__ . '/../views/pages/about.php';
        include __DIR__ . '/../views/partials/footer.php';
    }
}