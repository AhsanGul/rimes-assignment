<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['articleTitle']) && isset($_POST['articleContent'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    $userId = $_SESSION['user_id'];
	$title = validate($_POST['articleTitle']);
	$content = validate($_POST['articleContent']);

	if (empty($title)) {
        $_SESSION['error'] = "Article title is required";
		header("Location: article.php");
	    exit();
	}else if(empty($content)){
        $_SESSION['error'] = "Article content is required";
        header("Location: article.php");
	    exit();
	}else{
		$insUser = "INSERT INTO articles (title, article, article_user_id) VALUES ('$title', '$content', '$userId')";
           	$response = mysqli_query($conn, $insUser);
			if ($response) {
                $_SESSION['success'] = "Article has been created successfully.";
				header("Location: home.php");
				exit();
			}else {
                $_SESSION['error'] = "Unknown error occurred";
				header("Location: home.php");
				exit();
			}
	}
	
}else{
	header("Location: index.php");
	exit();
}