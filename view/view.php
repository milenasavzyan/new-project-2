<?php
?>
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>
<div class="head">
    <h1>Article</h1>
<form action="../public/index.php?route=update">
    <label for="name">Name</label><br>
    <input type="text" name="name" placeholder="name" id="name" value="<?= $article['name']; ?>"><br>
    <label for="description">Description</label><br>
    <textarea name="description" placeholder="description" id="description" rows="4" cols="30"><?= $article['description']; ?></textarea><br>

    <a href='../public/index.php?route=update'><button type="submit" name="submit" class="submit">Update</button> </a>

</form>
    <a href='../public/index.php?route=delete'><button type="button" name="submit" class="submit">Delete</button></a>
</div>
</body>
