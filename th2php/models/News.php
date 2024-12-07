<?php

class News {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Lấy tất cả tin tức
    public function getAllNews() {
        $query = "SELECT news.*, categories.name AS category_name 
                  FROM news 
                  JOIN categories ON news.category_id = categories.id 
                  ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy tin tức theo ID
    public function getNewsById($id) {
        $query = "SELECT news.*, categories.name AS category_name 
                  FROM news 
                  JOIN categories ON news.category_id = categories.id 
                  WHERE news.id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $news = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Kiểm tra nếu tin tức tồn tại
        if ($news === false) {
            return false; // hoặc throw một exception hoặc error message tùy vào yêu cầu hệ thống
        }
    
        return $news;
    }
    
    // Thêm tin tức
    public function addNews($title, $content, $image, $category_id) {
        $query = "INSERT INTO news (title, content, image, created_at, category_id) 
                  VALUES (:title, :content, :image, NOW(), :category_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category_id', $category_id);
        return $stmt->execute();
    }

    // Sửa tin tức
    public function updateNews($id, $title, $content, $image, $category_id) {
        $query = "UPDATE news 
                  SET title = :title, content = :content, image = :image, category_id = :category_id 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Xóa tin tức
    public function deleteNews($id) {
        $query = "DELETE FROM news WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}