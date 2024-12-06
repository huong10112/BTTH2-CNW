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
                <th>Tiêu đề </th>
                <th>Loại</th>
                <th>Hành động </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($newsList)): ?>
                <?php foreach ($newsList as $news): ?>
                    <tr>
                        <td><?= $news['title'] ?></td>
                        <td><?= $news['category_name'] ?></td>
                        <td>
                            <a href="index.php?controller=news&action=edit&id=<?= $news['id'] ?>">Sửa</a>
                            <a href="index.php?controller=news&action=delete&id=<?= $news['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No news available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
