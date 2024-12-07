<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage News</title>
</head>
<body>
    <h1> QUẢN LÝ TIN TỨC </h1>
    <a href="index.php?controller=news&action=add">Add News</a>
    <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th> <!-- Thêm cột Content -->
            <th>Category</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($newsList)): ?>
            <?php foreach ($newsList as $news): ?>
                <tr>
                    <td><?= htmlspecialchars($news['id']) ?></td>
                    <td><?= htmlspecialchars($news['title']) ?></td>
                    <td><?= htmlspecialchars($news['content']) ?></td> <!-- Hiển thị nội dung -->
                    <td><?= htmlspecialchars($news['category_name']) ?></td>
                    <td><?= htmlspecialchars($news['created_at']) ?></td>
                    <td>
                        <a href="index.php?controller=news&action=edit&id=<?= $news['id'] ?>">Edit</a>
                        <a href="index.php?controller=news&action=delete&id=<?= $news['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No news available.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</body>
</html>