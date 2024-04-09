<?php


class ArticlesModel
{
    public function articleInsertOrUpdate($id, $name, $description)
    {
        $pdo = Database::getInstance()->getConnection();
        try {
            if (empty($id)) {
                $stmt = $pdo->prepare('INSERT INTO articles (`name`, `description`) VALUES (?, ?)');
                $stmt->execute([$name, $description]);
            } else {
                $stmt = $pdo->prepare('UPDATE articles SET `name` = ?, `description` = ? WHERE id = ?');
                $stmt->execute([$name, $description, $id]);
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function articleDelete($id)
    {
        $pdo = Database::getInstance()->getConnection();
        try {
            $stmt = $pdo->prepare('DELETE FROM articles WHERE id = ?');
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getArticle($id)
    {
        $pdo = Database::getInstance()->pdo;
        try {

            $stmt = $pdo->prepare('SELECT * FROM articles WHERE id= ?');
            $stmt->execute([$id]);
            $article = $stmt->fetch(PDO::FETCH_ASSOC);
            return $article;


        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
