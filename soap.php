<?php
include_once("/usr/local/billing/phpclient/admin/soap.class.php");
include_once("/usr/local/billing/phpclient/admin/main.class.php");
// Вывод ошибок
ini_set("display_errors", true);
error_reporting(E_ALL^E_NOTICE);


// Параметры входа
$_POST['login'] = 'techdir';
$_POST['password'] = 'Coolzer0';

// Данный метод сам вызовет метод авторизации по полученным login/pass из $_POST
$lb = new LANBilling();

if(!$lb->authorized) { 
	die("Not authorized");
	$lb->Logout();
// Wrong login/pass !?
}
$filter = array(
	"ip" => '127.0.0.1', // segment ip
	"agentid" => 3 // agent id
);

$data = $lb->get('getSegments', array( "flt" => $filter ) );
print_r($data)

// put your code here
?>