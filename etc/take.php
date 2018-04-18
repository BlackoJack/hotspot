<?php
require "connect.php";
$mac=$_POST['mac'];
$linklogin=$_POST['linklogin'];
$gida = mysql_query("SELECT gid FROM users WHERE local_mac = '$mac'");
$gidb = mysql_result($gida,0);
$creditc = mysql_query("SELECT do_fixed_credit_summa FROM packets WHERE gid = '$gidb'");
$creditd = mysql_result($creditc,0);

mysql_query("UPDATE users SET credit = '$creditd' WHERE local_mac = '$mac'");
mysql_close();
?>

<script type="text/javascript">
window.location.href="<?php echo $linklogin ?>";
</script>