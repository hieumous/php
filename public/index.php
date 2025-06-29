
<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        require_once '../app/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;

    case 'about':
        require_once '../app/controllers/AboutController.php';  
        $controller = new AboutController();
        $controller->index();
        break; 

     case 'courses':
        require_once '../app/controllers/CoursesController.php';    
        $controller = new CoursesController();
        $controller->index();
        break; 
    case 'contact':
        require_once '../app/controllers/ContactController.php';    
        $controller = new ContactController();
        $controller->index();
        break;  
    case 'team':
        require_once '../app/controllers/TeamController.php';    
        $controller = new TeamController();
        $controller->index();
        break;
    case 'testimonial':
        require_once '../app/controllers/TestimonialController.php';    
        $controller = new TestimonialController();
        $controller->index();
        break;
    default:
       
        break;
}

