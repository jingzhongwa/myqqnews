<meta charset="utf-8" />
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
?>

<h1>获得赞最多的100位用户</h1>
<table>
<tr>
	<th>用户昵称</th>
	<th>用户获得赞数</th>
	<th>用户发表评论数</th>
</tr>
<?php foreach( $res as $row ){ ?>
	<tr>
		<td><?php echo $row['nick']; ?></td>
		<td><?php echo $row['up']; ?></td>
		<td><?php echo $row['cmt_num']; ?></td>
	</tr>
<?php }//foreach ?>
</table>
<?php }//if ?>

<?php if( isset( $_REQUEST['act']) && $_REQUEST['act'] == 'cmt_num_order' ){
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
?>

<h1>发表评论最多的100位用户</h1>
<table>
<tr>
	<th>用户昵称</th>
	<th>用户获得赞数</th>
	<th>用户发表评论数</th>
</tr>
<?php foreach( $res as $row ){ ?>
	<tr>
		<td><?php echo $row['nick']; ?></td>
		<td><?php echo $row['up']; ?></td>
		<td><?php echo $row['cmt_num']; ?></td>
	</tr>
<?php }//foreach ?>
</table>
<?php }//else if ?>



<p>本页功能：</p>
<ul>
	<li><a href="users.php?act=up_num_order">获得赞最多的100位用户</a></li>
	<li><a href="users.php?act=cmt_num_order">发表评论最多的100位用户</a></li>
</ul>
