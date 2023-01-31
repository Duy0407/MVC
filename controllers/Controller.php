<?php 
class Controller{

	// + Sau khi xây dựng chức năng login, cần phải check các lỗi bảo mật với chức năng login, vd:
	// - Nếu chưa login thì không cho phép truy cập backend
	// - Nếu login rồi thì ko cho truy cập lại form login
	// + Việc check bảo mật về login sẽ check tại phương thức khởi tạo của class cha
	// Phương thức khởi tạo là phương thức được chạy đầu tiên khi khởi tạo đối tượng
	public function __construct(){
		if (!isset($_SESSION['user']) && $_GET['controller'] != 'user') {
			$_SESSION['error'] = "Bạn chưa đăng nhập";
			header("Location: index.php?controller=user&action=login");
			exit();
		}
	}

	public $content;
	public $error;

	public function render($file, $variables = []){
		extract($variables);
		ob_start();

		require_once $file;

		$render_view = ob_get_clean();

		return $render_view;
	}
}

?>