<?php
// controllers/NewsController.php
require_once 'models/News.php';
require_once 'models/Category.php';

class NewsController {
    public function index() {
        $newsModel = new News();
        $newsList = $newsModel->getAllNews();
        require 'views/admin/news/index.php';
    }

    public function add() {
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategories();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];

            $newsModel = new News();
            $newsModel->createNews($title, $content, $category_id);
            header('Location: index.php?controller=news&action=index');
        }

        require 'views/admin/news/add.php';
    }

public function edit() {
    $id = $_GET['id']; // Lấy ID từ URL
    $newsModel = new News();
    $news = $newsModel->getNewsById($id); // Lấy thông tin bản ghi cần sửa

    $categoryModel = new Category();
    $categories = $categoryModel->getAllCategories(); // Lấy danh sách danh mục

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];

        $newsModel->updateNews($id, $title, $content, $category_id); // Cập nhật thông tin
        header('Location: index.php?controller=news&action=index'); // Chuyển hướng sau khi cập nhật
    }

    // Hiển thị form sửa
    require 'views/admin/news/edit.php';
}

    public function delete() {
        $id = $_GET['id'];
        $newsModel = new News();
        $newsModel->deleteNews($id);
        header('Location: index.php?controller=news&action=index');
    }
}
