<meta charset="utf-8" />
<?php
include_once( 'init.php' );

//act == cmt_num_order start
if( isset( $_REQUEST['act']) && $_REQUEST['act'] == 'up_num_order' ){
	$sql = "SELECT `news`.news_url as link, `news`.title, `cmt`.content as cmt, up FROM `comments` as cmt JOIN `news` ON `news`.real_id = `cmt`.targetid ORDER BY `cmt`.up DESC LIMIT 100";
	$source = $db->exe_sql( $sql );
	while( $row = mysql_fetch_assoc( $source ) ){
		$res[] = $row;
	}
?>

<h1>点赞数最多的100条评论</h1>
<table>
<tr>
	<th>新闻标题</th>
	<th>评论内容</th>
	<th>点赞数</th>
</tr>
<?php foreach( $res as $row ){ ?>
	<tr>
		<td><a href="<?php echo $row['link']; ?>"><?php echo $row['title']; ?></a></td>
		<td><?php echo $row['cmt']; ?></td>
		<td><?php echo $row['up']; ?></td>
	</tr>
<?php }//foreach ?>
</table>
<?php }//if ?>

<p>本页功能：</p>
<ul>
	<li><a href="comments.php?act=up_num_order">点赞数最多的100条评论</a></li>
</ul>
