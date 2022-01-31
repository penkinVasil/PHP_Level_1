<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?=$content?>
<br>
<form class = "userImg" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <input type="submit" value="load">
</body>
</html>