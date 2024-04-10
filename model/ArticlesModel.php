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
    public function getLimit($page, $articlesPerPage)
    {
        $pdo = Database::getInstance()->getConnection();
        $offset = ($page - 1) * $articlesPerPage;
        try {
            $stmt = $pdo->prepare('SELECT * FROM articles LIMIT :limit OFFSET :offset');
            $stmt->bindValue(':limit', $articlesPerPage, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $articles;


        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getArticlesCount()
    {
        $pdo = Database::getInstance()->getConnection();
        try {
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM articles');
            $stmt->execute();
            $totalArticles = $stmt->fetchColumn();
            return $totalArticles;


        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}
