<?php
class IndexModel extends Model {
	
	public function checkUser() {
		$login = $_POST['login'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM user WHERE `login` = :login AND `password` = :password";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":login", $login, PDO::PARAM_STR);
		$stmt->bindValue(":password", $password, PDO::PARAM_STR);
		$stmt->execute();
		$res = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($res)) {
			$_SESSION['user'] = $_POST['login'];
			$_SESSION['userId'] = $res['id_user'];
			$_SESSION['role_id_role'] = $res['role_id_role'];
			header("Location: /cabinet");
		} else {
			return false;
		}
	}
}
