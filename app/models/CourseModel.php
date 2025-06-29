<?php

class CourseModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS courses (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            rating TINYINT NOT NULL DEFAULT 0,
            total_reviews INT DEFAULT 0,
            instructor_name VARCHAR(100) NOT NULL,
            duration VARCHAR(50),
            student_count INT DEFAULT 0,
            image_path VARCHAR(255),
            description TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";

        return $this->conn->query($sql); // dùng mysqli
    }
 
    // Lấy danh sách khóa học
    public function getAllCourses() {
    $sql = "SELECT * FROM courses ORDER BY created_at DESC";
    $result = $this->conn->query($sql);
    $courses = [];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
    }

    return $courses;
}  
   // Thêm khóa học mới
public function addCourse($title, $price, $rating, $total_reviews, $instructor_name, $duration, $student_count, $image_path, $description) {
    $stmt = $this->conn->prepare("
        INSERT INTO courses (
            title, price, rating, total_reviews,
            instructor_name, duration, student_count,
            image_path, description, created_at
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ");

    if (!$stmt) {
        echo "Lỗi prepare: " . $this->conn->error;
        return false;
    }

     $stmt->bind_param(
        "sdiisssss",
        $title,
        $price,
        $rating,
        $total_reviews,
        $instructor_name,
        $duration,
        $student_count,
        $image_path,
        $description
    );

    if (!$stmt->execute()) {
        echo "Lỗi execute: " . $stmt->error;
        return false;
    }

    return true;
}
public function deleteCourse($id) {
    $stmt = $this->conn->prepare("DELETE FROM courses WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

public function getCourseById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM courses WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

public function updateCourse($id, $title, $price, $rating, $total_reviews, $instructor_name, $duration, $student_count, $image_path, $description) {
    $stmt = $this->conn->prepare("
        UPDATE courses SET
            title = ?, price = ?, rating = ?, total_reviews = ?,
            instructor_name = ?, duration = ?, student_count = ?,
            image_path = ?, description = ?
        WHERE id = ?
    ");
    $stmt->bind_param("sdiiissssi", $title, $price, $rating, $total_reviews, $instructor_name, $duration, $student_count, $image_path, $description, $id);
    return $stmt->execute();
}
}
    
   

   
   
