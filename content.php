<h2>My gallery</h2>
<div id = "gallery">
<?foreach($content as $file):?> 
	<a href="view.php?id=<?=$file['id']?>&action=oneview"><img class=img src="gallery_img/small/<?=$file['filename']?>" width="150" height="100" alt="<?=$file['filename']?>"></a>	
<?endforeach;?> 
</div>
<h4>Загрузите изображение</h4>
<form class = "userImg" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" value="load">
</form>
