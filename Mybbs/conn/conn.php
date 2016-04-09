<?php
function get_connect()
{
	@$db=mysqli_connect('localhost','root','root','db_guestbook');
	if(mysqli_connect_errno())
	{
		return null;
	}
	$db->query("set names 'utf8'");
	return $db;
}

