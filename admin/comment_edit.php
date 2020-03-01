<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}
/**kijken of er een id in de url aanwezig is*/
if(empty($_GET['id'])){
    redirect('comments.php');
}
/**ophalen van de aangeklikte user*/
$comment = Comment::find_by_id($_GET['id']);

/*wegschrijven data in DB*/
if(isset($_POST['update_comment'])){
    if($comment){
        $comment->author  = trim($_POST['author']);
        $comment->body  = trim($_POST['body']);
//        if(empty($_FILES['user_image'])){
//            $user->save();
//        }else{
//            $user->set_file($_FILES['user_image']);
//            $user->save_user_and_image();
//        }
        redirect('comments.php');
    }
}
?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Edit/Wijzigen comment</h1>
        <hr>
        <form action="comment_edit.php?id=<?php echo $comment->id;  ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">

                    <div class="form-group">
                        <label for="">Author</label>
                        <input type="text" name="author" class="form-control"
                        value="<?php echo $comment->author; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Body</label>
                        <input type="text" name="body" class="form-control"
                               value="<?php echo $comment->body; ?>">
                    </div>
<!--                    <div class="form-group">-->
<!--                        <img class="img-fluid"  width="40" height="40"-->
<!--                             src="--><?php //echo $comment->image_path_and_placeholder(); ?><!--" alt="">-->
<!--                        <label for="">comment image</label>-->
<!--                        <input type="file" name="comment_image" class="form-control">-->
<!--                    </div>-->
                 </div>
                <div class="d-flex">
                    <input type="submit" name="update_comment" value="Update Comment"
                           class="btn btn-warning btn-lg rounded-0">
                    <a href="comment_delete.php?id=<?php echo $comment->id; ?>"  class="btn btn-danger btn-lg rounded-0">Delete
                        Comment</a>
                </div>

            </div>
        </form>
    </div>
</div>
<!--End Page Content-->

<?php
include("includes/footer.php");
?>
