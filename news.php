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
?>

<h1>评论数最多的20条新闻</h1>
<table>
<tr>
	<th>新闻标题</th>
	<th>新闻评论数</th>
</tr>
<?php foreach( $res as $row ){ ?>
	<tr>
		<td><a href="<?php echo $row['link']; ?>"><?php echo $row['title']; ?></a></td>
		<td><?php echo $row['cmt_num']; ?></td>
	</tr>
<?php }//foreach ?>
</table>
<?php }//if ?>

<p>本页功能：</p>
<ul>
	<li><a href="news.php?act=cmt_num_order">评论数最多的20条新闻</a></li>
</ul>
