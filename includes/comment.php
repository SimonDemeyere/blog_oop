<?php
// Get access to Comment (Class)
$comments = Comment::find_the_comments($_GET['id']);
// Get active page ID
$photo_id = $_GET['id'];
// Get active user ID
$user_id = $session->user_id;
$user = User::find_by_id($user_id);

// Creating new empty comment
$comment = new Comment();
// Fill comment
if(isset($_POST['add_comment'])){
    $comment->photo_id = $_GET['id'];
    $comment->author  = $user->first_name;
    $comment->body  = trim($_POST['body']);
    $comment->save();
//        redirect("photo.php?id='$comment->photo_id'");
}

$comment_reply = new Comment_reply();

if(isset($_POST['add_reply'])){
    $comment_reply->comment_id = $_POST['comment_id'];
    $comment_reply->author  = $user->first_name;
    $comment_reply->body  = trim($_POST['body']);
    $comment_reply->save();
//        redirect("photo.php?id='$comment->photo_id'");
}
?>

<!-- Comments Form -->
<!--Show form when logged in-->
<?php if($session->is_signed_in()): ?>
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form method="post" action="photo.php?id=<?= $_GET['id']; ?>">
                <div class="form-group">
                    <textarea name="body" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="add_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<?php endif; ?>

<!-- Single Comment -->
<!--Show all comments-->

<!-- Comment with nested comments -->
<?php foreach ($comments as $comment) : ?>
<?php $comment_replies = Comment_reply::find_the_comment_replies($comment->id); ?>

<div class="media mb-4">
    <img class="d-flex mr-3 rounded-circle" src="<?= $user->user_image ?>>" alt="">
    <div class="media-body">
        <h5 class="mt-0"><?= $comment->author ?></h5>
        <?= $comment->body ?>
        <a class="btn btn-danger rounded-0" href="admin/comment_delete.php?id=<?php echo $comment->id;
        ?>"><i class="far fa-trash-alt"></i></a>

        <?php if(!empty($comment_replies)) : ?>
            <?php foreach ($comment_replies as $comment_reply) : ?>
            <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0"><?= $comment_reply->author ?></h5>
                    <?= $comment_reply->body ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif ?>
        <?php if($session->is_signed_in()): ?>
            <div class="card my-4">
                <h5 class="card-header">Leave a Reply:</h5>
                <div class="card-body">
                    <form method="post" action="photo.php?id=<?= $_GET['id']; ?>">
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <input type="text" class="d-none" name="comment_id" value="<?= $comment->id ?>">
                        <button type="submit" name="add_reply" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; ?>