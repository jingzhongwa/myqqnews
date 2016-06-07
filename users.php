<?php
include_once( 'init.php' );

//act == cmt_num_order start
if( isset( $_REQUEST['act']) && $_REQUEST['act'] == 'up_num_order' ){
	if( $redis->GET( 'up_num_order' ) ){
		$res = unserialize( $redis->GET( 'up_num_order' ) );
	}
	else{
		$res = users_up_num_order( $db );
		$redis->set( 'up_num_order', serialize( $res ) );
	}
	$smarty->assign( 'row_list', $res );
	$smarty->assign( 'page_title', '获得赞最多的100位用户' );
	$smarty->display( 'users.htm' );
}

else if( isset( $_REQUEST['act']) && $_REQUEST['act'] == 'cmt_num_order' ){
	if( $redis->GET( 'cmt_num_order' ) ){
		$res = unserialize( $redis->GET( 'cmt_num_order' ) );
	}
	else{
		$res = users_cmt_num_order( $db );
		$redis->set( 'cmt_num_order', serialize( $res ) );
	}
	$smarty->assign( 'row_list', $res );
	$smarty->assign( 'page_title', '发表评论最多的100位用户' );
	$smarty->display( 'users.htm' );
}