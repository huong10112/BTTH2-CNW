<h1>Quản lý người dùng</h1>
<table class="table">
    <thead>
        <tr>
            <th>Tên người dùng</th>
            <th>Quyền</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['username'] ?></td>
                <td><?= $user['role'] == 1 ? 'Quản trị viên' : 'Người dùng' ?></td>
                <td>
                    <a href="index.php?controller=user&action=edit&id=<?= $user['id'] ?>" class="btn btn-warning">Sửa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
