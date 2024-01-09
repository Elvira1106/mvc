<?php
class UsersModel extends Model {
    public function getUsers() {
        $sql = "SELECT user.id_user, user.login, user.fullname, user.email, role.name as role FROM user
                INNER JOIN role ON user.role_id_role = role.id_role";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id_user']] = $row;
        }
        
        return $result;
    }
    public function getUserById($userId) {
        $sql = "SELECT user.id_user, user.email, user.fullname, user.login, role.name as role FROM user
                INNER JOIN role ON user.role_id_role = role.id_role
                WHERE user.id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $userId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
        return $result;
        }
    
    public function getUsersRoles() {
        $result = array();
        $sql = "SELECT * FROM role";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }
    public function updateUserInfo($userId, $userFullName, $userLogin, $userEmail, $userRole) {
        $sql = "UPDATE user, role
                SET login = :login, fullname = :fullName, email = :email, role_id_role = :roleId
                WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $userLogin, PDO::PARAM_STR);
        $stmt->bindValue(":fullName", $userFullName, PDO::PARAM_STR);
        $stmt->bindValue(":email", $userEmail, PDO::PARAM_STR);
        $stmt->bindValue(":roleId", $userRole, PDO::PARAM_INT);
        $stmt->bindValue(":id", $userId, PDO::PARAM_INT);
        $stmt->execute();
        return true;        
    }
    public function addNewUser($userLogin, $userFullName, $userEmail, $userPassword, $userRole) {
        $sql = "INSERT INTO user(login, fullname, email, password, role_id_role)
                VALUES (:login, :fullName, :email, :password, :role_id)   
                ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $userLogin, PDO::PARAM_STR);
        $stmt->bindValue(":fullName", $userFullName, PDO::PARAM_STR);
        $stmt->bindValue(":email", $userEmail, PDO::PARAM_STR);
        $stmt->bindValue(":password", $userPassword, PDO::PARAM_STR);
        $stmt->bindValue(":role_id", $userRole, PDO::PARAM_INT);
        $stmt->execute();
        return true;        
    }
    public function deleteUser($id) {
        $sql = "DELETE FROM user WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
}
