<h1> Thêm tin tức mới </h1>

<form method = "POST">
    <label for="title"> Tiêu đề: </label>
    <input type="text" name="title" id="title" required><br>
    <label for="content"> Nội dung: </label>
    <textarea name="content" id="content" required></textarea><br>
    <label for="image">Ảnh:</label>
    <input type="text" name="image" id="image"><br>
    <label for="category_id"> Danh mục:</label>
    <select name="category_id" id="category_id" required>
        <?php foreach ($data['categories'] as $category): ?>
            <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit"> Lưu </button>
</form>
