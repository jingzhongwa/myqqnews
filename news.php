<?php
include_once( 'init.php' );

//act == cmt_num_order start
if( isset( $_REQUEST['act']) && $_REQUEST['act'] == 'cmt_num_order' ){
	$sql = "SELECT real_id as id, `news`.news_url as link, `news`.title, count(*) as cmt_num FROM `comments` as cmt JOIN `news` ON `news`.real_id = `cmt`.targetid GROUP BY cmt.targetid ORDER BY count(*) DESC LIMIT 20";
	$source = $db->exe_sql( $sql );
	$res = array();
	while( $row = mysql_fetch_assoc( $source ) ){
		$res[] = $row;
	}
	$smarty->assign( 'page_title', "评论数最多的20条新闻" );
	$smarty->assign( 'row_list', $res );
	$smarty->display( 'news.htm' );
}
else if( isset( $_REQUEST['act']) && $_REQUEST['act'] == 'cmt_time_info' ){
	if( empty( $_REQUEST['news_id'] ) ){
		throw new Exception("get news_id failed", 1);
	}
	$id = intval( $_REQUEST['news_id'] );
	$day_num = isset( $_REQUEST['day_num'] ) ? intval( $_REQUEST['day_num'] ) : 10;
	if( $day_num < 1 || $day_num > 31 ){
		$day_num = 10;
	}
	/* 获取新闻发布日期0点时间戳 */
	$sql = "SELECT real_id as id, news_url as url, title, time FROM `news` WHERE `news`.real_id=$id LIMIT 1";
	$source = $db->exe_sql( $sql );
	$news_row = mysql_fetch_assoc( $source );
	$start_day = date( "d F Y", intval( $news_row['time'] ) );
	$start_time = strtotime( $start_day );

	/* 获取新闻发布后30天的评论信息 */
	$end_time = $start_time + 3600 * 24 * $day_num;
	$sql = "SELECT time, up, rep FROM `comments` WHERE targetid=$id AND time < $end_time";
	$source = $db->exe_sql( $sql );
	$chart_num_arr = array();//保存
	$chart_up_arr = array();
	$chart_rep_arr = array();
	for( $i = 1; $i <= $day_num; $i++ ){
		$chart_rep_arr[ $i ] = 0;
		$chart_up_arr[ $i ] = 0;
		$chart_num_arr[ $i ] = 0;
	}
	while( $row = mysql_fetch_assoc( $source) ){
		foreach( $row as &$word ){
			$word = intval( $word );
		}
		unset( $word );

		$temp = intval( $row['time'] ) - $start_time;
		$n = $temp / ( 3600 * 24 );
		$chart_rep_arr[ $n + 1 ] += $row['rep'];
		$chart_up_arr[ $n + 1] += $row['up'];
		$chart_num_arr[ $n + 1 ]++;
	}
	$cmt_num = $cmt_up = $cmt_rep = $day = "";
	for( $i = 1; $i <= $day_num; $i++ ){
		$cmt_num .= "$chart_num_arr[$i],";
		$cmt_up .= "$chart_up_arr[$i],";
		$cmt_rep .= "$chart_rep_arr[$i],";
		$day .= "\"day$i\",";
	}
	//echo $cmt_num, $cmt_up;
	$smarty->assign( 'cmt_num', $cmt_num );
	$smarty->assign( 'cmt_up', $cmt_up );
	$smarty->assign( 'cmt_rep', $cmt_rep );
	$smarty->assign( 'day', $day );
	$smarty->display( 'news_cmt_time_info.htm' );
}