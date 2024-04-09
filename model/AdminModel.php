<?php


class AdminModel
{
    public function AdminLogin()
    {
        if(isset($_POST['submit'])) {
            $pdo = Database::getInstance()->pdo;
            $query = "SELECT * FROM `admin` WHERE `name`= 'admin'";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':name', $_POST['name']);

            try {
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row && $row['name'] == $_POST['name']) {
                        header('Location: ../public/index.php?route=home');
                        exit();

                } else {
                    echo 'Wrong user name or password';
                }
            } catch (PDOException $e) {
                die("Query failed: " . $e->getMessage());
            }
        }
    }
}
