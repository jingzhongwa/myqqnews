<meta charset="utf-8" />
<?php
include_once( 'init.php' );

//act == cmt_num_order start
if( isset( $_REQUEST['act']) && $_REQUEST['act'] == 'up_num_order' ){
	$sql = "SELECT `news`.real_id as id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments` as cmt JOIN `news` ON `news`.real_id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100";
	$source = $db->exe_sql( $sql );
	while( $row = mysql_fetch_assoc( $source ) ){
		$res[] = $row;
	}
	$smarty->assign( 'page_title', '点赞数最多的100条评论' );
	$smarty->assign( 'row_list', $res );
	$smarty->display( 'comments.htm' );
}