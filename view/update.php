<?php
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="../view/style.css">
</head>
<div class="head">
    <h1>Articles update</h1>
    <form method="post">
        <div class="container">
            <input type="text" name="name" placeholder="name" value = '<?= $article['name']; ?>'><br>
            <textarea name="description" placeholder="description" rows="4" cols="30"><?= $article['description']; ?></textarea><br>
            <button type="submit" name="submit" class="submit">Update</button>
        </div>

    </form>
</div>

