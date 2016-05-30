<meta charset="utf-8" />
<?php
include_once( 'init.php' );

//act == cmt_num_order start
if( isset( $_REQUEST['act']) && $_REQUEST['act'] == 'cmt_num_order' ){
	$sql = "SELECT `news`.news_url as link, `news`.title, count(*) as cmt_num FROM `comments` as cmt JOIN `news` ON `news`.real_id = `cmt`.targetid GROUP BY cmt.targetid ORDER BY count(*) DESC LIMIT 20";
	$source = $db->exe_sql( $sql );
	$res = array();
	while( $row = mysql_fetch_assoc( $source ) ){
		$res[] = $row;
	}
	$smarty->assign( 'row_list', $res );
	$smarty->display( 'news.htm' );
}
