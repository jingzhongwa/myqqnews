<?php
//获取点赞前100的评论数组
function cmts_up_num_order(){
	//$sql = "SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments` as cmt JOIN `news` ON `news`.real_id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100";
	$sql = "(SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments_0` as cmt JOIN `news` ON `news`.id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100)
			UNION
			(SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments_1` as cmt JOIN `news` ON `news`.id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100)
			UNION
			(SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments_2` as cmt JOIN `news` ON `news`.id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100)
			UNION
			(SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments_3` as cmt JOIN `news` ON `news`.id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100)
			UNION
			(SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments_4` as cmt JOIN `news` ON `news`.id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100)
			UNION
			(SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments_5` as cmt JOIN `news` ON `news`.id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100)
			UNION
			(SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments_6` as cmt JOIN `news` ON `news`.id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100)
			UNION
			(SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments_7` as cmt JOIN `news` ON `news`.id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100)
			UNION
			(SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments_8` as cmt JOIN `news` ON `news`.id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100)
			UNION
			(SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments_9` as cmt JOIN `news` ON `news`.id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100)
		ORDER BY up LIMIT 100;";

	$source = $db->exe_sql( $sql );
	while( $row = mysql_fetch_assoc( $source ) ){
		$res[] = $row;
	}
	return $res;
}

//评论数最多的20条新闻
function news_cmt_num_order(){
	$sql = "SELECT real_id as id, `news`.news_url as link, `news`.title, count(*) as cmt_num FROM `comments` as cmt JOIN `news` ON `news`.real_id = `cmt`.targetid GROUP BY cmt.targetid ORDER BY count(*) DESC LIMIT 20";
	$source = $db->exe_sql( $sql );
	$res = array();
	while( $row = mysql_fetch_assoc( $source ) ){
		$res[] = $row;
	}
	return $res;
}