<?php
$mac=$_POST['mac'];
$ip=$_POST['ip'];
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
$n15="Уважаемые абоненты 15 сектора, у вас запущен биллинг. Если у вас нет интернета - звоните 291-66-86";
$n16="";
$n17="";
require "etc/connect.php";
$balansa = mysql_query("SELECT deposit FROM users WHERE local_mac = '$mac'");
if($balansa){
$balansb = mysql_result($balansa,0);
}
$blockeda = mysql_query("SELECT blocked FROM users WHERE local_mac = '$mac'");
if($blockeda){
$blockedb = mysql_result($blockeda,0);
}
$credita = mysql_query("SELECT credit FROM users WHERE local_mac = '$mac'");
if($credita){
$creditb = mysql_result($credita,0);
}
$macbilla = mysql_query("SELECT local_mac FROM users WHERE local_mac = '$mac'");
if($macbilla){
$macbillb = mysql_result($macbilla,0);
}
$tarifa = mysql_query("SELECT gid FROM users WHERE local_mac = '$mac'");
if($tarifa){
$tarifb = mysql_result($tarifa,0);
}
$tarifc = mysql_query("SELECT packet FROM packets WHERE gid = '$tarifb'");
if($tarifc){
$tarifd = mysql_result($tarifc,0);
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
	<div class="sd-contact"><p>Телефон тех.поддержки: 335-72-27</p></br>
							<p>Телефон офиса: 380-77-15</p></br>
							
	</div>
        <div class="sd-header-position">
            <div class="sd-header-wrapper">
                <div class="cleared reset-box"></div>
				
                <div class="sd-header-inner">
                <div class="sd-logo">
                                 <h1 class="sd-logo-name">СибДата Телеком</h1>
                                                 <h2 class="sd-logo-text">Нестандартные технологические решения</h2>
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
<!--                                <h2 class="sd-postheader">
                                </h2> -->
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
}else{ // Если mac пустой. Например если тупо зайти на http://hotspot.domain.com
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
echo '<form name="login" action="'; echo $linkloginonly; echo '" method="post" onsubmit="return doLogin()" id="login">';
echo '<input type="hidden" name="dst" value="'; echo $linkorig; echo '" /> <input type="hidden" name="popup" value="true" /> <input style="width: 80px" name="username" type="hidden" value="'; echo $mac; echo '" /> <input value="" style="width: 80px" name="password" type="hidden" /> <input class="button" type="submit" value="Начать работу в сети" />';
echo '</form>';



 echo "</br><p>Ваш баланс: <B>";
 echo "<FONT SIZE=4>";
 echo  substr($balansb, 0, -4);
 echo " руб.</B>" ;
 echo "</FONT></p></br>";
 echo "<p>Ваш тариф: ";
 echo substr($tarifd, 0, -9);
 echo "</p></br>";
}





if($blockedb == 1 && $mac != "" ) // Если абонент заблокирован
{
echo "</br><font color='red'><b>Вы заблокированы! Возможно у вас не хватает средств на счету. Пополнить можно в <a href='http://lk.sibdata.ru' target='_blank' title='Личный кабинет'>личном кабинете</a> или в нашем офисе (ул. Гурьевская 37а).</b></font></br></br>"; 
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
        <center><font color="white"><B>Новости вашего сектора</B></font></center>
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
<div class="sd-box sd-block"></br>
    <div class="sd-box-body sd-block-body">
                <div class="sd-bar sd-blockheader">
                    <h3 class="t">Новости</h3>
                </div>
                <div class="sd-box sd-blockcontent">
                    <div class="sd-box-body sd-blockcontent-body">
                
					<p>1. Напоминаем нашим абонентам что сеть sibdata ведет тестовое вещание. Возможны кратковременные перебои со 
связью.</p></br>
					<p>2. Ведется разработка сайта для наших абонентов.</p></br>
					<p>3. Ваши пожелания просим направлять на электронную почту <a 
href="mailto:support@sibdata.ru">support@sibdata.ru</a></p></br>
					
            <p>4.  Для наших абонентов всегда доступны сайты <a href="http://sibdata.ru" target="_blank" title="Главная страница вашего 
провайдера">sibdata.ru</a>, <a href="http://ngs.ru" target="_blank" title="Городские новости">ngs.ru</a> и <a href="http://lk.sibdata.ru" 
target="_blank" title="Ваш личный кабинет">личный кабинет</a></li>
        			
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

<!-- Speedtest -->
<center>            
<script type="text/javascript" src="speedtest/swfobject.js?v=2.2"></script>
 <div id="mini-demo">
 Speedtest.net Mini requires at least version 8 of Flash. Please <a href="http://get.adobe.com/flashplayer/">update your client</a>.
 </div><!--/mini-demo-->
<script type="text/javascript">
var flashvars = {
upload_extension: "php"
};
var params = {
wmode: "transparent",
quality: "high",
menu: "false",
allowScriptAccess: "always"
};
var attributes = {};
swfobject.embedSWF("http://speedtest.net/mini/speedtest.swf?v=2.1.8", "mini-demo", "350", "200", "9.0.0", "speedtest/expressInstall.swf", flashvars, params, attributes);
</script>
</center>
<!-- Speedtest -->

            <div class="cleared"></div>
            <div class="sd-footer">
                <div class="sd-footer-body">
                            <div class="sd-footer-text">


                                <p>Copyright © 2012. All Rights Reserved.</p>
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
</body>
</html>
