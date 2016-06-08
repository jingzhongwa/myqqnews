<?php
/* Smarty version 3.1.29, created on 2016-05-30 22:05:25
  from "/home/wwwroot/default/myqqnews/templates/news_cmt_time_info.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574c48a53b5b13_65206774',
  'file_dependency' => 
  array (
    'fb68438b70235c32cf1b8f93132be75b423e4219' => 
    array (
      0 => '/home/wwwroot/default/myqqnews/templates/news_cmt_time_info.htm',
      1 => 1464616270,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574c48a53b5b13_65206774 ($_smarty_tpl) {
?>
<meta charset="utf-8" />
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"><?php echo '</script'; ?>
>
<canvas id="myChart" width="1000" height="400"></canvas>
<?php echo '<script'; ?>
>
var data = {
	labels : [ <?php echo $_smarty_tpl->tpl_vars['day']->value;?>
 ],
	datasets : [
		{
			label : "评论数",
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			pointColor : "rgba(220,220,220,1)",
			pointStrokeColor : "#fff",
			data : [ <?php echo $_smarty_tpl->tpl_vars['cmt_num']->value;?>
 ]
		},
		{
			label : "评论点赞总数",
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			pointColor : "rgba(151,187,205,1)",
			pointStrokeColor : "#fff",
			data : [ <?php echo $_smarty_tpl->tpl_vars['cmt_up']->value;?>
 ]
		}
	]
}

//Get the context of the canvas element we want to select
var ctx = document.getElementById("myChart").getContext("2d");
var myNewChart = new Chart(ctx, {
	    type: 'line',
	    data: data,
	    //options: options
	});
<?php echo '</script'; ?>
><?php }
}
