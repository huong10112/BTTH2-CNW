<?php
require_once 'config.php';

class News {
public function getAllNews() {
    global $conn;
    $sql = "SELECT news.id, news.title, news.content, categories.name AS category_name, news.created_at
            FROM news
            JOIN categories ON news.category_id = categories.id";
    $result = $conn->query($sql);

    $newsList = [];
    while ($row = $result->fetch_assoc()) {
        $newsList[] = $row;
    }
    return $newsList;
}

    public function addNews($title, $content, $image, $category_id) {
        global $conn;
        $sql = "INSERT INTO news (title, content, image, category_id) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $title, $content, $image, $category_id);
        return $stmt->execute();
    }

    public function getNewsById($id) {
        global $conn;
        $sql = "SELECT * FROM news WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateNews( $id, $title, $content, $image, $category_id ) {
        global $conn;
        $sql = "UPDATE news SET title = ?, content = ?, image = ?, category_id = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssii", $title, $content, $image, $category_id, $id);
        return $stmt->execute();
    }

    public function deleteNews($id) {
        global $conn;
        $sql = "DELETE FROM news WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
