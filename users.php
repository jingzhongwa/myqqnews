<?php
include_once( 'init.php' );

//act == cmt_num_order start
if( isset( $_REQUEST['act']) && $_REQUEST['act'] == 'up_num_order' ){
	if( $redis->GET( 'up_num_order' ) ){
		$res = unserialize( $redis->GET( 'up_num_order' ) );
	}
	else{
		$sql = "SELECT u.nick, count(*) as cmt_num, sum(c.up) as up FROM `users` as u JOIN `comments` as c ON u.userid = c.userid GROUP BY c.userid ORDER BY up DESC LIMIT 100;";
		$source = $db->exe_sql( $sql );
		$res = array();
		while( $row = mysql_fetch_assoc( $source ) ){
			$res[] = $row;
		}
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
		$sql = "SELECT u.nick, count(*) as cmt_num, sum(c.up) as up FROM `users` as u JOIN `comments` as c ON u.userid = c.userid GROUP BY c.userid ORDER BY cmt_num DESC LIMIT 100;explain";
		$source = $db->exe_sql( $sql );
		$res = array();
		while( $row = mysql_fetch_assoc( $source ) ){
			$res[] = $row;
		}
		$redis->set( 'cmt_num_order', serialize( $res ) );
	}
	$smarty->assign( 'row_list', $res );
	$smarty->assign( 'page_title', '发表评论最多的100位用户' );
	$smarty->display( 'users.htm' );
}