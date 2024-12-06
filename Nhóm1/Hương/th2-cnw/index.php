<?php
// Đảm bảo đã include các file controller
require_once 'controllers/AdminController.php';
require_once 'models/User.php';

// Lấy controller và action từ URL (hoặc mặc định)
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Kiểm tra controller và action
switch ($controller) {
    case 'admin':
        $adminController = new AdminController();
        if ($action == 'login') {
            $adminController->login();
        } elseif ($action == 'logout') {
            $adminController->logout();
        } elseif ($action == 'dashboard') {
            $adminController->dashboard();
        } else {
            echo "Trang không tồn tại";  // Nếu action không tồn tại
        }
        break;
    
    case 'user':
        $userController = new UserController();
        // Thêm các action cho controller user nếu có
        break;

    default:
        echo "Trang không tồn tại";  // Nếu controller không tồn tại
        break;
}
?>
