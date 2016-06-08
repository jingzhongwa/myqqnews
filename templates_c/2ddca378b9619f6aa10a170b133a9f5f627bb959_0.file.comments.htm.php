<?php
/* Smarty version 3.1.29, created on 2016-05-30 23:25:55
  from "/home/wwwroot/default/myqqnews/templates/comments.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574c5b83424a08_97407703',
  'file_dependency' => 
  array (
    '2ddca378b9619f6aa10a170b133a9f5f627bb959' => 
    array (
      0 => '/home/wwwroot/default/myqqnews/templates/comments.htm',
      1 => 1464616270,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:table_header.htm' => 1,
    'file:table_footer.htm' => 1,
  ),
),false)) {
function content_574c5b83424a08_97407703 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
<!-- 这是内容部分 -->
<div class="container">
	<div calss="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 row-newstwo pack_div">
			<nav class="navbar navbar-inverse"> <a class="navbar-brand" href="#"><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</a></nav>
			<table class="table table-striped table-bordered">
				<thead>
					<th>新闻标题</th>
					<th>图表</th>
					<th>评论内容</th>
					<th>点赞数</th>
				</thead>
				<?php
$_from = $_smarty_tpl->tpl_vars['row_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
				<tr>
					<td><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</td>
					<td><a href="news.php?act=cmt_time_info&news_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">查看</a></td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cmt'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['up'];?>
</td>
				</tr>
				<?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
			</table>
		</div>
	</div>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
