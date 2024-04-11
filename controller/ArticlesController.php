<?php

class ArticlesController
{
    public function displayArticles()
    {
        $articlesModel = new ArticlesModel();
        $page = $_GET['page'] ?? 1;
        $articlesPerPage = 7;


        $articles = $articlesModel->getArticles($page, $articlesPerPage);
        $totalArticles = $articlesModel->getArticlesCount();

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


