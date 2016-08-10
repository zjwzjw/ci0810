<meta charset=UTF-8>
<base href="<?php echo site_url();?>">
<form action="" method="post">
	标题:<input type="text" name="title">
	文章分类:
	<select name='ca'>
		<?php foreach($catalog as $v){?>
			<option value="<?php echo $v->catalog_id?>"><?php echo $v->catalog_name;?></option>
			<?php }?>
		</select>
		<br />
		<textarea rows=10 cols=30 name="con"></textarea>
	
	</form>