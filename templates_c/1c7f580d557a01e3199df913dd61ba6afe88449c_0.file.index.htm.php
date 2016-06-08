<?php
/* Smarty version 3.1.29, created on 2016-05-30 23:25:53
  from "/home/wwwroot/default/myqqnews/templates/index.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574c5b818c15a0_73608338',
  'file_dependency' => 
  array (
    '1c7f580d557a01e3199df913dd61ba6afe88449c' => 
    array (
      0 => '/home/wwwroot/default/myqqnews/templates/index.htm',
      1 => 1464616270,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574c5b818c15a0_73608338 ($_smarty_tpl) {
?>
<meta charset="utf-8" />
<ul>
	<li>
		<a href="news.php?act=cmt_num_order">评论数最多的20条新闻</a>
	</li>
	<li>
		<a href="users.php?act=cmt_num_order">发表评论最多的100位用户</a>
	</li>
	<li>
		<a href="users.php?act=up_num_order">获得赞最多的100位用户</a>
	</li>
	<li>
		<a href="comments.php?act=up_num_order">点赞数最多的100条评论</a>
	</li>
</ul><?php }
}
