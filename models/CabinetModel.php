<?php
class CabinetModel extends Model {
    public function getOrdersCount() {
        $sql = "SELECT COUNT(*) FROM `order`"; //колво строк(заказов)
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn(); //возвращает колво колонок
        return $res;
    }
    public function getProductsCount() {
        $sql = "SELECT COUNT(*) FROM product";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }
    public function getUsersCount() {
        $sql = "SELECT COUNT(*) FROM user";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }

    public function getOrders() {
		$sql = "SELECT
					`order`.id_order as id,
					`order`.amount as total,
					user.fullname,
					user.email
				FROM `order`
				 JOIN user ON user.id_user = `order`.user_id_user
				";
		$result = array();
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[$row['id']] = $row;
		}
     
		return $result;		
	}

}
 ?>