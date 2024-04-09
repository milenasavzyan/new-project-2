<?php
require_once '../libraries/Database.php';
require_once '../model/AdminModel.php';
require_once '../controller/AdminController.php';
require_once '../model/ArticlesModel.php';
require_once '../controller/ArticlesController.php';

$route = $_GET['route'] ?? 'admin';

    switch ($route){
        case 'admin':
            $model = new AdminController();
            $model->Login();
            include '../view/admin.php';
            break;
        case 'create':
            $articles = new ArticlesController();
            $articles->handleInsert();
            break;
        case 'update':
            $controller = new ArticlesController();
            $controller->handleUpdate();
           
            break;
        case 'delete':
              $controller = new ArticlesController();
              $controller->handleDelete();
            break;
        case 'view':
            $controller = new ArticlesController();
            $controller->handleView();
            break;
        default:
            $controller = new ArticlesController();
            $controller->displayArticles();
    }
