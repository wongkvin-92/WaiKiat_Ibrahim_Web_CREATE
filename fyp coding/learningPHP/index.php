<?php
error_reporting(E_ALL);
//include 'vendor/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';
include 'dbconfig.php';

$klein = new \Klein\Klein();

$admin  = new AdminController($con);

$root = "/learningPHP";

session_start();

function getPost($var){
  if(isset($_POST[$var])){
    if($_POST[$var] == ""){
      throw new \Exception($var. " was empty!");
    }
    return $_POST[$var];
  }
  throw new \Exception($var. " was not set.");
}

$klein->respond('GET', $root.'/', function () {
    return 'index is working';
});

$klein->respond('POST', $root.'/admin/login/', function() use ($admin){

  $email = getPost('email');
	$password = getPost('password');

  $admin->login($email,$password);
});

$klein->respond('GET', $root.'/admin/', function() use ($admin){
  if($admin->checkLoginState()){
    $admin->getCredentials();
  }else{
    return "false";
  }
});

if($admin->checkLoginState()){ //Only perform if I am logged in
  $klein->respond('GET', $root.'/admin/logout/', function() use ($admin){
    $admin->logout();
  });

  $klein->respond('GET', $root.'/classes/pending/', function() use ($admin){
    $admin->viewPendingRequest();
  });
                                    //i = int, id = var name    //r = request
  $klein->respond('GET', $root.'/classes/[i:id]/approve/', function($r) use ($admin){
    $admin->approveClass($r->id);
  });

}

$klein->onHttpError(function(){
  print("ERROR OCCURED!");
});

try{
  $klein->dispatch();
}catch(\Exception $ex){
  $response = [
    'result' => 'error',
    'msg' => $ex->getMessage()
  ];
  print(json_encode($response));
  http_response_code(400);
}
 ?>