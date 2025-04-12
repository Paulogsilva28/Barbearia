<?php

// class User {
//     private $conn;
//     private $table_name = "user"; // Nome da tabela de usuários

//     public $iduser;
//     public $name_user;
//     public $phone;
//     public $email_user;
//     public $password;

//     public function __construct($db) {
//         $this->conn = $db;
//     }

//     // Função para criar um novo usuário
//     public function create() {
//         $query = "INSERT INTO " . $this->table_name . " (name_user, phone, email_user, password) VALUES (:name_user,:phone, :email_user, :password)";
        
//         $stmt = $this->conn->prepare($query);
        
//         $stmt->bindParam(":name_user", $this->name_user);
//         $stmt->bindParam(":phone", $this->phone);
//         $stmt->bindParam(":email_user", $this->email_user);
//         $stmt->bindParam(":password", $this->password);
        
//         if ($stmt->execute()) {
//             return true;
//         }
//         return false;
//     }

//     // Função para verificar login
//     public function login() {
//         $query = "SELECT * FROM " . $this->table_name . " WHERE email_user = :email_user LIMIT 0,1";
        
//         $stmt = $this->conn->prepare($query);
//         $stmt->bindParam(":email_user", $this->email_user);
        
//         $stmt->execute();
        
//         if ($stmt->rowCount() > 0) {
//             $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
//             if (password_verify($this->password, $row['password'])) {
//                 return $row; // Retorna os dados do usuário
//             }
//         }
//         return null; // Caso o login falhe
//     }
// }
?>
