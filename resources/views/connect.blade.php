<?php
$connect_error = 'Sorry, we\'re experiencing connection problems';
mysql_connect('localhost','root','');
mysql_select_db('views') or die($connect_error);
?>