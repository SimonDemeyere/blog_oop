<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
$posts = Post::find_all();

?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Ophalen van alle users</h1>
        <hr>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">short_description</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($posts as $post): ?>
                <tr>
                    <th scope="row"><?php echo $post->id;?></th>
                    <td><?php echo $post->title;?></td>
                    <td><?php echo $post->description;?></td>
                    <td><?php echo $post->short_description;?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!--End Page Content-->

<?php
include("includes/footer.php");
?>

