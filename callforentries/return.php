<?
  $id = $_GET['id'];
  $num = $_GET['payment_number'];
  //$ref = $_GET['payment_reference'];
  //include 'library/config.php';
  //include 'library/opendb.php';
  //$query  = "update musicians_entry set payment_number = '$num',payment_method = 'Credit Card' where id = '$id'";
  //$result = mysql_query($query) or die('Error : ' . mysql_error());
  //echo $id.'<br/>';
  //echo $num.'<br/>';
  //echo $result;
  
  header( 'Location: http://www.stkildafestival.com.au/callforentries/page/add_musicians_payment_cc/'.$id.'/'.$num );
 ?>


