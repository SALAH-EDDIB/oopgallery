<?php include('init.php')?>

<?php 

if($session->is_signed_in()){

    redirect('index.php');


}

if($_POST['submit']){


$username = trim($_POST['username']);
$password = trim($_POST['password']);


$user_found = User::verify_user($username , $password );



if($user_found){

    $session->login($user_found);
    redirect('index.php');

}else{


    $message = ' your password or username are incorrect';

}


}else{

    $username = '';
    $password = '';

}

?>