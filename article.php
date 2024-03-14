<?php
session_start(); 
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Article</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include_once 'menu.php'; 
    if (isset($_SESSION['error'])) {
        echo '<p class="error"> '. $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
      }
      if (isset($_SESSION['success'])) {
        echo '<p class="success"> '. $_SESSION['success'] . '</p>';
        unset($_SESSION['success']);
      }

    ?><br>
    <form action="create_article.php" method="post">
        <div class="mb-3">
            <label for="articleTitle" class="form-label">Article Title</label>
            <input type="text" class="form-control" required name="articleTitle" id="articleTitle">
        </div>
        <div class="mb-3">
            <label for="articleContent" class="form-label">Article Content</label>
            <textarea class="form-control" name="articleContent" required rows="10" id="articleContent" ></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Article</button>
    </form>
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php

}
else{
    header("Location: index.php");
    exit();
}
?>