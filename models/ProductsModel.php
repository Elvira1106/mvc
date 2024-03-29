<?php
class ProductsModel extends Model {
    public function getAllProducts() { //Вывод асех товаров
        $result = array();
        $sql = "SELECT * FROM product";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id_product']] = $row;
        }
        return $result;
    }
    public function addFromCSV($data) { //
        $sql = "INSERT INTO product(name_pr, price) VALUES(:name_pr, :price)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name_pr", $data[0], PDO::PARAM_STR);
        $stmt->bindValue(":price", $data[1], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getProductById($id) {
        $result = array();
        $sql = "SELECT * FROM product WHERE id_product = :id_product";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id_product", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function saveProductInfo($id, $name, $price) {
        $sql = "UPDATE product
                SET price = :price, name_pr = :name
                WHERE id_product = :id
                ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":price", $price, PDO::PARAM_INT);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    public function addProduct($productName, $productPrice) {
        $sql = "INSERT INTO product(name_pr, price)
                VALUES(:productName, :productPrice)
                ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":productName", $productName, PDO::PARAM_STR);
        $stmt->bindValue(":productPrice", $productPrice, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    public function deleteProduct($id) {
        $sql = "DELETE FROM product WHERE id_product = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->rowCount(); //количество строк, затронутым запросом
        if($count > 0) {
            return true;
        } else {
            return false;
        }
    }

}
 ?>