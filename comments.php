<meta charset="utf-8" />
<?php
include_once( 'init.php' );

//act == cmt_num_order start
if( isset( $_REQUEST['act']) && $_REQUEST['act'] == 'up_num_order' ){
	$res = get_up_num_order();
	$smarty->assign( 'page_title', '点赞数最多的100条评论' );
	$smarty->assign( 'row_list', $res );
	$smarty->display( 'comments.htm' );
}