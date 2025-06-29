<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="/xampp/app/views/assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/xampp/app/views/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/xampp/app/views/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/xampp/app/views/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/xampp/app/views/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Admin</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="index.php?page=home" class="nav-item nav-link active">Home</a>
         <a href="index.php?page=about" class="nav-item nav-link">About</a>
        <a href="index.php?page=courses" class="nav-item nav-link">Courses</a>
<div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
    <div class="dropdown-menu fade-down m-0">
        <a href="index.php?page=team" class="dropdown-item">Our Team</a>
        <a href="index.php?page=testimonial" class="dropdown-item">Testimonial</a>
        <a href="index.php?page=404" class="dropdown-item">404 Page</a>
    </div>
</div>
                <a href="index.php?page=contact" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

<div class="container my-4">
    <h2 class="mb-4">📚 Danh sách khóa học</h2>
   <div class="d-flex justify-content-end mb-3">
   <a href="/xampp/public/add_courses.php" class="btn btn-success">
        ➕ Thêm khóa học mới
    </a>
</div>
    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Giá</th>
                <th>⭐ Sao</th>
                <th>🎯 Đánh giá</th>
                <th>👨‍🏫 Giảng viên</th>
                <th>⏱️ Thời lượng</th>
                <th>👥 Học viên</th>
                <th>🖼️ Ảnh</th>
                <th>📄 Mô tả</th>
                <th>⚙️ Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= $course['id'] ?></td>
                    <td><?= htmlspecialchars($course['title']) ?></td>
                    <td class="text-success fw-bold">$<?= number_format($course['price'], 2) ?></td>
                    <td><?= $course['rating'] ?></td>
                    <td><?= $course['total_reviews'] ?></td>
                    <td><?= htmlspecialchars($course['instructor_name']) ?></td>
                    <td><?= $course['duration'] ?></td>
                    <td><?= $course['student_count'] ?></td>
                    <td>
                        <img src="<?= htmlspecialchars($course['image_path']) ?>" alt="Ảnh khóa học" width="80" class="img-thumbnail">
                    </td>
                    <td class="text-start"><?= nl2br(htmlspecialchars($course['description'])) ?></td>
                    <td>
                        <a href="/xampp/public/add_courses.php?id=<?= $course['id'] ?>" class="btn btn-sm btn-warning mb-1">✏️ Sửa</a>

                        <a href="?delete=<?= $course['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">🗑️ Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</div>
</body>
</html>