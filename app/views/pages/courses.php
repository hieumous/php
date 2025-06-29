     <!-- Header Start -->
   
    <!-- Header End -->


    <!-- Categories Start -->
    
    <!-- Categories Start -->
 
 
 <!-- Courses Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Popular Courses</h1>
        </div>

        <!-- Swiper wrapper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php if (!empty($courses)): ?>
                    <?php foreach ($courses as $course): ?>
                        <div class="swiper-slide">
                            <div class="course-item bg-light rounded shadow">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid" src="<?= htmlspecialchars($course['image_path']) ?>" alt="Ảnh khóa học">

                                    <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                        <a href="index.php?page=course_detail&id=<?= $course['id'] ?>"
                                           class="btn btn-sm btn-primary px-3 border-end"
                                           style="border-radius: 30px 0 0 30px;">Read More</a>
                                        <a href="index.php?page=register&id=<?= $course['id'] ?>"
                                           class="btn btn-sm btn-primary px-3"
                                           style="border-radius: 0 30px 30px 0;">Join Now</a>
                                    </div>
                                </div>

                                <div class="text-center p-4 pb-0">
                                    <h3 class="mb-0">$<?= number_format($course['price'], 2) ?></h3>
                                    <div class="mb-3">
                                        <?php for ($i = 0; $i < $course['rating']; $i++): ?>
                                            <small class="fa fa-star text-primary"></small>
                                        <?php endfor; ?>
                                        <small>(<?= $course['total_reviews'] ?>)</small>
                                    </div>
                                    <h5 class="mb-4"><?= htmlspecialchars($course['title']) ?></h5>
                                </div>

                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-user-tie text-primary me-2"></i>
                                        <?= htmlspecialchars($course['instructor_name']) ?>
                                    </small>
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-clock text-primary me-2"></i>
                                        <?= htmlspecialchars($course['duration']) ?>
                                    </small>
                                    <small class="flex-fill text-center py-2">
                                        <i class="fa fa-user text-primary me-2"></i>
                                        <?= $course['student_count'] ?> Students
                                    </small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="swiper-slide">
                        <p class="text-center">Không có khóa học nào để hiển thị.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Nút điều hướng -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<!-- Courses End -->

<!-- Swiper CSS + JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Khởi tạo Swiper -->
<script>
    new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        loop: true,
        breakpoints: {
            0: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            992: { slidesPerView: 3 }
        }
    });
</script>