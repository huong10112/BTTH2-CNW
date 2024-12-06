<h1>Quản lý Tin tức</h1>
<a href="/admin/news/add">Thêm mới tin tức</a>
<table>
    <thead>
        <tr>
            <th>Tiêu đề</th>
            <th>Danh mục</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['news'] as $news): ?>
            <tr>
                <td><?php echo $news->title; ?></td>
                <td><?php echo $news->category_name; ?></td>
                <td><?php echo $news->created_at; ?></td>
                <td>
                    <a href="/admin/news/edit/<?php echo $news->id; ?>">Sửa</a> |
                    <a href="/admin/news/delete/<?php echo $news->id; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
