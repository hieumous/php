<?php
class ContactController {
    public function index() {
        include __DIR__ . '/../views/partials/header.php';
        include __DIR__ . '/../views/pages/contact.php';
        include __DIR__ . '/../views/partials/footer.php';
    }
}