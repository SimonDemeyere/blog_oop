<?php
    include("includes/header.php");
    $photos = Photo::find_all();
?>
<div class="card_container d-flex justify-content-around m-5">
<?php
    foreach ($photos as $photo) :
?><a href="photo.php?id=<?= $photo->id ?>">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="admin/<?= $photo->picture_path(); ?>" alt="Card image cap">
            <div class="card-body d-flex flex-column">
                <p class="card-text"><?= $photo->description ?></p>
<!--                Check if logged in-->
                <?php if($session->is_signed_in()): ?>
                <a href="admin/edit_photo.php?id=<?= $photo->id ?>" class="btn btn-warning align-self-end">Edit</a>
                <?php endif ?>
            </div>
        </div>
    </a>
<?php endforeach; ?>
</div>
<?php include ("includes/footer.php");
