<?php
//获取点赞前100的评论数组
function cmts_up_num_order( $db ){
	//$sql = "SELECT `news`.id, `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments` as cmt JOIN `news` ON `news`.real_id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100";
	$sql = "SELECT * FROM (
		  (SELECT
			 `news`.id,
			 `news`.news_url AS link,
			 `news`.title,
			 `cmt`.content   AS cmt,
			 up
		   FROM `comments_0` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
		   ORDER BY `cmt`.up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 `news`.id,
			 `news`.news_url AS link,
			 `news`.title,
			 `cmt`.content   AS cmt,
			 up
		   FROM `comments_1` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
		   ORDER BY `cmt`.up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 `news`.id,
			 `news`.news_url AS link,
			 `news`.title,
			 `cmt`.content   AS cmt,
			 up
		   FROM `comments_2` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
		   ORDER BY `cmt`.up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 `news`.id,
			 `news`.news_url AS link,
			 `news`.title,
			 `cmt`.content   AS cmt,
			 up
		   FROM `comments_3` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
		   ORDER BY `cmt`.up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 `news`.id,
			 `news`.news_url AS link,
			 `news`.title,
			 `cmt`.content   AS cmt,
			 up
		   FROM `comments_4` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
		   ORDER BY `cmt`.up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 `news`.id,
			 `news`.news_url AS link,
			 `news`.title,
			 `cmt`.content   AS cmt,
			 up
		   FROM `comments_5` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
		   ORDER BY `cmt`.up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 `news`.id,
			 `news`.news_url AS link,
			 `news`.title,
			 `cmt`.content   AS cmt,
			 up
		   FROM `comments_6` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
		   ORDER BY `cmt`.up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 `news`.id,
			 `news`.news_url AS link,
			 `news`.title,
			 `cmt`.content   AS cmt,
			 up
		   FROM `comments_7` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
		   ORDER BY `cmt`.up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 `news`.id,
			 `news`.news_url AS link,
			 `news`.title,
			 `cmt`.content   AS cmt,
			 up
		   FROM `comments_8` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
		   ORDER BY `cmt`.up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 `news`.id,
			 `news`.news_url AS link,
			 `news`.title,
			 `cmt`.content   AS cmt,
			 up
		   FROM `comments_9` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
		   ORDER BY `cmt`.up
			 DESC
		   LIMIT 100)
		) result
		ORDER BY `result`.up LIMIT 100;";
	$res = array();
	$source = $db->exe_sql( $sql );
	while( $row = mysql_fetch_assoc( $source ) ){
		$res[] = $row;
	}
	return $res;
}

//news order by comments number
function news_cmt_num_order( $db ){
	$sql = "SELECT `result`.id, `result`.link, `result`.title, SUM( `result`.cmt_num) as cmt_num
			FROM (
			  (SELECT
				 `news`.id,
				 `news`.news_url AS link,
				 `news`.title,
				 count(*)        AS cmt_num
			   FROM `comments_0` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
			   GROUP BY cmt.targetid
			   ORDER BY count(*)
				 DESC
			   LIMIT 200)
			  UNION
			  (SELECT
				 `news`.id,
				 `news`.news_url AS link,
				 `news`.title,
				 count(*)        AS cmt_num
			   FROM `comments_1` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
			   GROUP BY cmt.targetid
			   ORDER BY count(*)
				 DESC
			   LIMIT 200)
			  UNION
			  (SELECT
				 `news`.id,
				 `news`.news_url AS link,
				 `news`.title,
				 count(*)        AS cmt_num
			   FROM `comments_2` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
			   GROUP BY cmt.targetid
			   ORDER BY count(*)
				 DESC
			   LIMIT 200)
			  UNION
			  (SELECT
				 `news`.id,
				 `news`.news_url AS link,
				 `news`.title,
				 count(*)        AS cmt_num
			   FROM `comments_3` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
			   GROUP BY cmt.targetid
			   ORDER BY count(*)
				 DESC
			   LIMIT 200)
			  UNION
			  (SELECT
				 `news`.id,
				 `news`.news_url AS link,
				 `news`.title,
				 count(*)        AS cmt_num
			   FROM `comments_4` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
			   GROUP BY cmt.targetid
			   ORDER BY count(*)
				 DESC
			   LIMIT 200)
			  UNION
			  (SELECT
				 `news`.id,
				 `news`.news_url AS link,
				 `news`.title,
				 count(*)        AS cmt_num
			   FROM `comments_5` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
			   GROUP BY cmt.targetid
			   ORDER BY count(*)
				 DESC
			   LIMIT 200)
			  UNION
			  (SELECT
				 `news`.id,
				 `news`.news_url AS link,
				 `news`.title,
				 count(*)        AS cmt_num
			   FROM `comments_6` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
			   GROUP BY cmt.targetid
			   ORDER BY count(*)
				 DESC
			   LIMIT 200)
			  UNION
			  (SELECT
				 `news`.id,
				 `news`.news_url AS link,
				 `news`.title,
				 count(*)        AS cmt_num
			   FROM `comments_7` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
			   GROUP BY cmt.targetid
			   ORDER BY count(*)
				 DESC
			   LIMIT 200)
			  UNION
			  (SELECT
				 `news`.id,
				 `news`.news_url AS link,
				 `news`.title,
				 count(*)        AS cmt_num
			   FROM `comments_8` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
			   GROUP BY cmt.targetid
			   ORDER BY count(*)
				 DESC
			   LIMIT 200)
			  UNION
			  (SELECT
				 `news`.id,
				 `news`.news_url AS link,
				 `news`.title,
				 count(*)        AS cmt_num
			   FROM `comments_9` AS cmt JOIN `news` ON `news`.id = `cmt`.targetid
			   GROUP BY cmt.targetid
			   ORDER BY count(*)
				 DESC
			   LIMIT 200)
			) result
			GROUP BY `result`.id ORDER BY `result`.cmt_num DESC LIMIT 20;
			";
	$source = $db->exe_sql( $sql );
	$res = array();
	while( $row = mysql_fetch_assoc( $source ) ){
		$res[] = $row;
	}
	return $res;
}

// users order by up number
function users_up_num_order( $db ){
	$sql = "SELECT `result`.id, `result`.nick, SUM(`result`.cmt_num) as cmt_num, SUM(`result`.up) as up FROM (
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_0` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_0` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_0` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_0` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_0` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_1` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_1` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_1` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_1` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_1` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_2` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_2` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_2` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_2` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_2` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_3` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_3` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_3` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_3` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_3` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_4` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_4` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_4` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_4` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_4` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_5` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_5` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_5` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_5` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_5` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_6` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_6` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_6` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_6` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_6` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_7` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_7` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_7` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_7` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_7` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_8` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_8` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_8` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_8` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_8` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_9` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_9` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_9` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_9` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.id,u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_9` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY up
			 DESC
		   LIMIT 100)
		) result
		GROUP BY `result`.id ORDER BY `result`.up LIMIT 100;";
	$source = $db->exe_sql( $sql );
	$res = array();
	while( $row = mysql_fetch_assoc( $source ) ){
		$res[] = $row;
	}
	return $res;
}

//users order by comment number
function users_cmt_num_order( $db ){
	$sql = "SELECT `result`.userid, `result`.nick, SUM(`result`.cmt_num) as cmt_num, SUM(`result`.up) as up FROM (
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_0` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_0` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_0` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_0` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_0` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_1` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_1` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_1` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_1` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_1` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_2` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_2` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_2` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_2` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_2` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_3` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_3` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_3` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_3` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_3` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_4` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_4` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_4` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_4` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_4` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_5` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_5` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_5` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_5` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_5` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_6` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_6` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_6` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_6` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_6` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_7` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_7` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_7` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_7` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_7` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_8` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_8` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_8` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_8` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_8` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_01` AS u JOIN `comments_9` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_23` AS u JOIN `comments_9` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_45` AS u JOIN `comments_9` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_67` AS u JOIN `comments_9` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		  UNION
		  (SELECT
			 u.userid,
			 u.nick,
			 count(*)  AS cmt_num,
			 sum(c.up) AS up
		   FROM `users_89` AS u JOIN `comments_9` AS c ON u.userid = c.userid
		   GROUP BY c.userid
		   ORDER BY cmt_num
			 DESC
		   LIMIT 100)
		) result
		GROUP BY `result`.userid ORDER BY `result`.cmt_num;";
	$source = $db->exe_sql( $sql );
	$res = array();
	while( $row = mysql_fetch_assoc( $source ) ){
		$res[] = $row;
	}
	return $res;
}