<?php
require_once 'config.php';

class Category {
    public function getAllCategories() {
        global $conn;
        $sql = "SELECT * from categories";
        $result = $conn->query($sql);

        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
        return $categories;
    }
}
?>
