<style>
ol {
  background: #ff9999;
  padding: 20px;
}

ul {
  background: #3399ff;
  padding: 20px;
}

ol li {
  background: #ffe5e5;
  padding: 5px;
  margin-left: 35px;
}

ul li {
  background: #cce5ff;
  margin: 5px;
}
</style>
<h3>Hi <?=$user->name?></h3>

<b>My Posts</b>
<?php foreach($posts as $post):?>
	<ul>
	<li><b>Title:</b><?=$post->title?></li>
	<li><b>description:</b><?=$post->description?></li>
	</ul>
<?php endforeach?>


<a href="<?=base_url('user/logout')?>">Logout</a>
