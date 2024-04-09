<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>
<div class="head">
    <h1>Articles</h1>


    <table border = '1px'>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>description</td>
        </tr>


            <?php foreach ($articles as $article):?>

            <tr>
                <td><?=$article['id'];?></td>
                <td><?= $article['name'];?></td>
                <td><?= $article['description'];?></td>
                <td>
                    <a href='../public/index.php?route=update&id=<?= $article['id']; ?>'>update</a>
                    <a href='../public/index.php?route=delete&id=<?= $article['id']; ?>'>delete</a>
                    <a href='../public/index.php?route=view&id=<?= $article['id']; ?>'>view</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>


    <form method="post">
        <a href="../public/index.php?route=create">Create
<!--            <button type="submit" name="submit" class="submit">Create</button>-->
        </a>
    </form>

</div>
</body>
