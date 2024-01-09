<?php
class ProfileController extends Controller {
	private $pageTpl = "/view/profile.tpl.php";
	public function __construct() {
		$this->model = new ProfileModel();
		$this->view = new View();
	}
	public function index() {
		if(!$_SESSION['user']) {
			header("Location: /");
		}
		$userId = $_SESSION['userId'];
		echo $userId;
		$userInfo = $this->model->getAccountInfo($userId);
		$this->pageData['userInfo'] = $userInfo;
		$this->pageData['title'] = "Мой аккаунт";
		$this->view->render($this->pageTpl, $this->pageData);
	}
	public function updateProfile() {
		if(!$_SESSION['user']) {
			header("Location: /");
		}
		if(!isset($_POST['login']) || !isset($_POST['email'])) {
			echo json_encode(array("success" => false, "text" => "Введите все данные"));
		} else {
			$profileId = $_POST['id'];
			$profileLogin = $_POST['login'];
			$profileEmail = $_POST['email'];
		
			 if($this->model->updateProfile($profileId, $profileLogin, $profileEmail)) {
			 	echo json_encode(array("success" => true));
             
			 } else {
			 	echo json_encode(array("success" => false, "texti" => "Ошибка при обновлении"));
			 }
		
	}
}
	public function updatePassword() {
		if(!$_SESSION['user']) {
			header("Location: /");
		}
		if(empty($_POST) || !isset($_POST['newpass']) || !isset($_POST['repeatpass'])) {
			echo json_encode(array("success" => false, "text" => "Ошибка ввода пароля"));
		} else {
			$profileId = $_POST['id'];
			$newPass = trim($_POST['newpass']);
			$repeatPass = trim($_POST['repeatpass']);
			if($newPass != $repeatPass) {
				echo json_encode(array("success" => false, "text" => "Пароли не совпадают"));
			} else {
				if($this->model->updatePassword($profileId, $newPass)) {
					echo json_encode(array("success" => true));
				} else {
					echo json_encode(array("success" => false, "text" => "Ошибка"));
				}
			}
		}		
	}
}