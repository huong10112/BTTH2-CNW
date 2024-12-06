<h1>SỬa tin tức</h1>
<form method="POST">
    <label>Tiêu đề :</label><br>
    <input type="text" name="title" value="<?= $newsDetail['title'] ?>" required><br><br>

    <label>Nội dung :</label><br>
    <textarea name="content" required><?= $newsDetail['content'] ?></textarea><br><br>

    <label> Ảnh :</label><br>
    <input type="text" name="image" value="<?= $newsDetail['image'] ?>"><br><br>

    <label>Category:</label><br>
    <select name="category_id" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?= htmlspecialchars($category['id']) ?>" 
                <?= $category['id'] == $newsDetail['category_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($category['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit"> Lưu </button>
</form>
