<?php

class ArticlesController
{
    public function displayArticles()
    {
        $pdo = Database::getInstance()->pdo;
        $page = $_GET['page'] ?? 1;
        $articlesPerPage = 7;
        $offset = ($page - 1) * $articlesPerPage;


        $stmt = $pdo->prepare('SELECT * FROM articles LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':limit', $articlesPerPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare('SELECT COUNT(*) FROM articles');
        $stmt->execute();
        $totalArticles = $stmt->fetchColumn();

        $totalPages = ceil($totalArticles / $articlesPerPage);

        include '../view/home.php';
    }

    public function handleInsert()
    {
        if ($_POST) {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            if (!empty($name) && !empty($description)) {
                $articlesModel = new ArticlesModel();
                $article = $articlesModel->articleInsertOrUpdate(null, $name, $description);
                header("Location: index.php?route=home");
                die();
            } else {
                echo '<h2>name and description are required</h2>';
            }
        }
        include '../view/articles.php';
    }

    public function handleUpdate()
    {
        $id = $_GET['id'] ?? null;
        $articlesModel = new ArticlesModel;
        $article = $articlesModel->getArticle($id);

        if (isset($_POST['name'])) {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            if (!empty($name)) {
                $article = $articlesModel->articleInsertOrUpdate($id, $name, $description);
                header("Location: index.php?route=home");
                die();
            }

        }


        include '../view/update.php';


    }

    public function handleDelete()
    {
        $id = $_GET['id'] ?? null;

        $articlesModel = new ArticlesModel();
        $article = $articlesModel->articleDelete($id);
        header("Location: index.php?route=home");
        die();
    }

    public function handleView()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'] ?? null;

            $articlesModel = new ArticlesModel();
            $article = $articlesModel->getArticle($id);
        }
        include '../view/view.php';
    }

}


