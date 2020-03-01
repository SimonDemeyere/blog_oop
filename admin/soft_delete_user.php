<?php
include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}
if(empty($_GET['id'])){
    redirect('users.php');
}
$user= User::find_by_id($_GET['id']);
if($user){
    $user->softDelete();
    redirect('users.php');
}else{
    redirect('users.php');
}
include("includes/sidebar.php");
include("includes/content-top.php");?>
<h1>Welkom op de soft delete pagina van users</h1>
<?php
include("includes/footer.php");
?>








