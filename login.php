<?php
if(isset($_POST['mac'])){
$mac = $_POST['mac'];
}else{
$mac = 0;
}
$ip=$_POST['ip'];
?>

<?php
$username=$_POST['username'];
$linklogin=$_POST['link-login'];
$linkorig=$_POST['link-orig'];
$error=$_POST['error'];
$chapid=$_POST['chap-id'];
$chapchallenge=$_POST['chap-challenge'];
$linkloginonly=$_POST['link-login-only'];
$linkorigesc=$_POST['link-orig-esc'];
$macesc=$_POST['mac-esc'];
$servername=$_POST['server-name'];
$n3="";
$n4="";
$n5="";
$n6="";
$n7="";
$n8="";
$n9="";
$n10="";
$n11="";
$n12="";
$n13="";
$n14="";
$n15="";
$n16="";
$n17="";
$n18="";
$n19="";
$n20="";
$n29="";
$n202="";

require "etc/connect.php";


$user_uid_query = mysql_query("SELECT uid FROM users WHERE local_mac = '$mac'");
if($user_uid_query){
$user_uid = mysql_result($user_uid_query,0);
}


#Начало снятия баланса из БД
// $balansa = mysql_query("SELECT balances.balance FROM balances,mac_staff,vgroups WHERE mac_staff.mac='$mac' AND balances.date=CURDATE() AND mac_staff.vg_id=vgroups.vg_id AND vgroups.agrm_id=balances.agrm_id");
$balansa = mysql_query ("SELECT agreements.balance FROM agreements,mac_staff,vgroups,accounts WHERE mac_staff.mac='$mac' AND mac_staff.vg_id=vgroups.vg_id AND vgroups.uid=agreements.uid LIMIT 0,1");
if($balansa){
$balansb = mysql_result($balansa,0);
}
#Конец снятия баланса из БД


$blockeda = mysql_query("SELECT blocked FROM users WHERE local_mac = '$mac'");
if($blockeda){
$blockedb = mysql_result($blockeda,0);
}

$credita = mysql_query("SELECT credit FROM users WHERE local_mac = '$mac'");
if($credita){
$creditb = mysql_result($credita,0);
}

#Выборка mac
$macbilla = mysql_query("SELECT mac FROM mac_staff WHERE mac = '$mac'");
if($macbilla){
$macbillb = mysql_result($macbilla,0);
}
#Конец Выборка mac

$tarifa = mysql_query("SELECT gid FROM users WHERE local_mac = '$mac'");
if($tarifa){
$tarifb = mysql_result($tarifa,0);
}

#Начало снятия тарифа из БД
$tarifc = mysql_query("SELECT packet FROM packets WHERE gid = '$tarifb'");
if($tarifc){
$tarifd = mysql_result($tarifc,0);
}
#Конец снятия тарифа из БД

$user_address_query = mysql_query("SELECT CONCAT(lanes.lane,CONCAT(' ',lanes_houses.house)) FROM lanes,lanes_houses WHERE lanes.laneid LIKE (SELECT laneid FROM lanes_houses WHERE houseid LIKE (SELECT houseid FROM users WHERE uid LIKE '{$user_uid}')) AND lanes_houses.houseid LIKE (SELECT houseid FROM users WHERE uid LIKE '{$user_uid}')");
if($user_address_query){
$user_address = mysql_result($user_address_query,0);
}

$user_email_query = mysql_query("SELECT email FROM users WHERE local_mac = '$mac'");
if($user_email_query){
$user_email = mysql_result($user_email_query,0);
}

$user_prim_query = mysql_query("SELECT prim FROM users WHERE local_mac = '$mac'");
if($user_prim_query){
$user_prim = mysql_result($user_prim_query,0);
}

$user_mobtel_query = mysql_query("SELECT mob_tel FROM users WHERE local_mac = '$mac'");
if($user_mobtel_query){
$user_mobtel = mysql_result($user_mobtel_query,0);
}



$user_fio_query = mysql_query("SELECT fio FROM users WHERE local_mac = '$mac'");
if($user_fio_query){
$user_fio = mysql_result($user_fio_query,0);
}

$user_user_query = mysql_query("SELECT user FROM users WHERE local_mac = '$mac'");
if($user_user_query){
$user_user = mysql_result($user_user_query,0);
}

$user_password_query = mysql_query("SELECT password FROM users WHERE local_mac = '$mac'");
if($user_password_query){
$user_password = mysql_result($user_password_query,0);
}

mysql_close();


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>SibData hotspot &gt; login</title>



    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
   <style type="text/css">
.sd-post .layout-item-0 { padding-right: 10px;padding-left: 10px; }
   .ie7 .sd-post .sd-layout-cell {border:none !important; padding:0 !important; }
   .ie6 .sd-post .sd-layout-cell {border:none !important; padding:0 !important; }
   </style>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>
<body>

<script type='text/javascript'>

Chatra('updateIntegrationData', {
    name: '<?php echo $user_address;?>',
    email: '<?php echo $user_email;?>',
    phone: '<?php echo $user_mobtel;?>',
    'ФИО': '<?php echo $user_fio;?>',
    'UID': '<?php echo $user_uid;?>',
    'ip': '<?php echo $ip;?>',
    'mac': '<?php echo $mac;?>',
    'Логин': '<?php echo $user_user;?>',
    'Пароль': '<?php echo $user_password;?>',
    'Тариф': '<?php echo substr($tarifd, 0);?>',
    'Баланс счета': '<?php echo substr($balansb, 0, -4). " Руб.";?>'
    });

</script>

<div id="sd-main">
    <div class="cleared reset-box"></div>
<div class="sd-bar sd-nav">
<div class="sd-nav-outer">
<div class="sd-nav-wrapper">
<div class="sd-nav-inner">
	<ul class="sd-hmenu">
	</ul>
</div>
</div>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="sd-header">
	<div class="sd-sibdata"></div>
	<div class="sd-contact">

	</div>
        <div class="sd-header-position">
            <div class="sd-header-wrapper">
                <div class="cleared reset-box"></div>
				
                <div class="sd-header-inner">
                <div class="sd-logo">
                                 <h1 class="sd-logo-name">Центр Сетевых Решений</h1>
                                </div>
                </div>
            </div>
        </div>
      
    </div>
    <div class="cleared reset-box"></div>
    <div class="sd-box sd-sheet">
        <div class="sd-box-body sd-sheet-body">
            <div class="sd-layout-wrapper">
                <div class="sd-content-layout">
                    <div class="sd-content-layout-row">
                        <div class="sd-layout-cell sd-content">
<div class="sd-box sd-post">
    <div class="sd-box-body sd-post-body">
 <div class="sd-post-inner sd-article">
                                                <div class="sd-postcontent">
 <div class="sd-content-layout">
    <div class="sd-content-layout-row">
    <div class="sd-layout-cell layout-item-0" style="width: 100%;">

 </div>
    </div>
 </div>

 <div class="sd-content-layout">
    <div class="sd-content-layout-row">

<!-- Начало абонентского раздела -->
    
                        <div class="sd-layout-cell sd-sidebar1">
 <div class="sd-box sd-block"> 
    <div class="sd-box-body sd-block-body"> 
                <div class="sd-bar sd-blockheader">
                    <h3 class="t">Абонентский раздел</h3>
                </div>
                <div class="sd-box sd-blockcontent">
                    <div class="sd-box-body sd-blockcontent-body">

<?php
if($macbillb != $mac or $mac == "") // Если абонента нет в базе
{
if($mac != ""){ // Если абонент подключен, но неправильный mac
echo "</br><font color='red'>Вы заблокированы! Ваш mac-адрес не найден в системе. Обратитесь в тех.поддержку.</b></font></br></br>";
echo '<p>mac-адрес: '; echo $mac; echo ' </p></br>';
}else{ // Если mac пустой. Например если тупо зайти на http://hotspot.sibdata.ru
echo "</br><font color='red'>Авторизация не пройдена! Вы не зашли через систему.</b></font></br></br>";
}
}else{ // Если абонент есть в базе

//    <!-- $(if chap-id) -->

echo '<form name="sendin" action="'; echo $linkloginonly; echo '" method="post" id="sendin">';
echo '<input value="" type="hidden" name="username" /> <input value="" type="hidden" name="password" /> <input type="hidden" name="dst" value="'; echo $linkorig; echo '" /> <input type="hidden" name="popup" value="true" />';
echo '</form><script type="text/javascript" src="md5.js">';
echo '</script><script type="text/javascript">';
     //<![CDATA[
//     <!--
echo 'function doLogin() {';
echo 'document.sendin.username.value = document.login.username.value;';
echo 'document.sendin.password.value = hexMD5("'; echo $chapid; echo '" + document.login.password.value + "'; echo $chapchallenge; echo '");';
echo 'document.sendin.submit();';
echo 'return false;';
echo '}';
    //-->
     //]]>
echo '</script>';
//    <!-- $(endif) -->
//if($blockedb != 1){
//echo '<form name="login" action="'; echo $linkloginonly; echo '" method="post" onsubmit="return doLogin()" id="login">';
//echo '<input type="hidden" name="dst" value="'; echo $linkorig; echo '" /> <input type="hidden" name="popup" value="true" /> <input style="width: 80px" name="username" type="hidden" value="'; echo $mac; echo '" /> <input value="" style="width: 80px" name="password" type="hidden" /> <input class="redbutton_im" type="submit" value="" />';
//echo '</form>';
//}


//if($balansb <= 0){
//echo '<center>';
//echo '<form action="'; echo $linkloginonly; echo '" method="post" name="login" id="form-login" onSubmit="return doLogin()">';
//echo '<input type="hidden" name="dst" value="'; echo $linkorig; echo '" />';
//echo '<input type="hidden" name="popup" value="true" />';
//echo '<input id="modlgn_username" type="hidden" name="username" value="free" />';
//echo '<input id="modlgn_passwd" type="password" name="password" value="free" style="visibility: hidden;" />';
//echo '<span class="title"><input type="submit" value="Временный интернет" name="Submit" class="free-button" /><em>Интернет на пониженной скорости, для оплаты услуг. Время сессии 10 минут.<i></i></em></span>';
//echo '</form>';
//echo '</center>';
//}

 echo "</br><p>Ваш баланс: <B>";
 echo "<FONT SIZE=3>";
 echo  substr($balansb, 0, 5);
 echo " руб.</B>" ;
 echo "</FONT></p></br>";
// echo "<p>Ваш тариф: ";
// echo substr($tarifd, 0);
// echo "</p></br>";
}





if($blockedb == 1 && $mac != "" ) // Если абонент заблокирован
{
echo "</br><font color='red'><b>Вы заблокированы! Возможно у вас не хватает средств на счету. Пополнить можно в <a href='http://lk.sibdata.ru' target='_blank' title='Личный кабинет'>личном кабинете</a> или в нашем офисе (ул. Кулагина, 35).</b></font></br></br>"; 
//    if($creditb == 0) // Если не включена отсрочка
//    {
//    echo "Также вы можете взять отсрочку платежа</br>";
//    echo '<form name="takecredit" target="_self" action="etc/take.php" method="post" ><input style="width: 80px" name="mac" type="hidden" value="'; echo $mac ; echo '" /><input style="width: 80px" name="linklogin" type="hidden" value="'; echo $linklogin ; echo '" />';
//    echo '</br><input name="submit" type="submit" value="Острочка" ></form>';
//    echo '</br>';
//    }
}
if ($creditb != 0 && $mac != "" && $mac == $macbillb) // Если отсрочка уже включена, mac не пустой, и абонент авторизован
{
echo "<p>Включена отсрочка платежа.</p></br>";
echo "<p>Ваш кредит: $creditb руб.</p></br>";
}
 ?>

<!-- Если ошибка mikrotik

     $(if error)  <br />
    <div style="color: #FF8080; font-size: 12px; font-weight: bold;">
    <?php echo $error; ?>
     </div>
     $(endif)
     
конец Если ошибка mikrotik     -->
     
     
      <script type="text/javascript">
    //<![CDATA[
     <!--
   document.login.password.focus();
   //-->
   //]]>
</script>


<?php


if($mac != "") // Если mac не пустой, пишем ip адрес и сектор
 {
echo '<p>Ваш mac-адрес: '; echo $mac; echo '</p></br>';
echo '<p>Ваш ip-адрес: '; echo $ip; echo '</p></br>';
echo '<p>Ваш сектор: '; echo $servername; '</p></br>';
 }
?>
 </div>
 </div>
 </div>
</div>
</div>

<!-- конец Абонентского раздела -->

<!-- начало Новостей сектора -->
         <div class="sd-layout-cell layout-item-0" style="width: 60%;">
  
             
        <ul>
        
            <li><font color="white"><B>
            <?php


            if($servername == '3') {$news = $n3;}
            if($servername == '4') {$news = $n4;}
            if($servername == '5') {$news = $n5;}
            if($servername == '6') {$news = $n6;}
            if($servername == '7') {$news = $n7;}
            if($servername == '8') {$news = $n8;}
            if($servername == '9') {$news = $n9;}
            if($servername == '10') {$news = $n10;}
            if($servername == '11') {$news = $n11;}
            if($servername == '12') {$news = $n12;}
            if($servername == '13') {$news = $n13;}
            if($servername == '14') {$news = $n14;}
            if($servername == '15') {$news = $n15;}
            if($servername == '16') {$news = $n16;}
            if($servername == '17') {$news = $n17;}
            if($servername == '18') {$news = $n18;}
            if($servername == '19') {$news = $n19;}
            if($servername == '20') {$news = $n20;}
            if($servername == '29') {$news = $n29;}
            if($servername == '202') {$news = $n202;}
        	    ?>
        	                <?php echo $news; ?>
            </B></font></li>
        </ul>
    </div>
<!-- конец Новостей сектора -->
    </div>
</div>

                </div>
                <div class="cleared"></div>
                </div>

		<div class="cleared"></div>
    </div>
</div>

                          <div class="cleared"></div>
                        </div>
                        <div class="sd-layout-cell sd-sidebar1">
<div class="sd-box sd-block">
</br>
    <div class="sd-box-body sd-block-body">
                <div class="sd-bar sd-blockheader">
                    <h3 class="t">Контакты</h3>
                </div>
                <div class="sd-box sd-blockcontent">
                    <div class="sd-box-body sd-blockcontent-body">
			<p>Телефон: 7(383)207-88-00</p><br>
			<p>Адрес: г. Новосибирск, ул. Михаила Кулагина, 35.</p><br>
			<p><a href="http://lk.sibdata.ru">Войти в Личный кабинет</a></p><br>
                    <div class="cleared"></div>
                    </div>
                </div>
		<div class="cleared"></div>
    </div>
</div>

                          <div class="cleared"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="cleared"></div>
            <div class="sd-footer">
                <div class="sd-footer-body">
                            <div class="sd-footer-text">


                                <p>Copyright © 2007-2018. All Rights Reserved.</p>
                                                            </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <p class="sd-page-footer"></p>
    <div class="cleared"></div>
</div>
<!-- Begin Chatra -->
<script>
    (function(d, w, c) {
        w.ChatraID = 'tDugRf2evytsoQHFh';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = (d.location.protocol === 'https:' ? 'https:': 'http:')
        + '//call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>
<!-- End Chatra -->
</body>
</html>
