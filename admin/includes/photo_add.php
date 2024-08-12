<?php


$message = "";
if (isset($_POST["submit"])) {
    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->caption = $_POST['caption'];
    $photo->alternate_text = $_POST['alternate_text'];
    $photo->description = $_POST['description'];
    $photo->date = date("Y-m-d H:i:s");
    $photo->set_file($_FILES['file_upload']);



    if ($photo->save()) {
        $message = "<p class='alert alert-success'>Photo Upload Successfully.</p>";
    }else{
        $message ="<p class='alert alert-danger'>Failed to Upload.  " . join("<br>", $photo->errors). "</p>";
    }

}

?>





<div class="col-md-4">
    <?php echo $message?>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Add New Photo</h2>
        
        
        <div class="form-group">
            <label for="title">Photo Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo isset($photo->title) ? $photo->title : ''; ?>">
        </div>
        
        <div class="form-group">
            <label for="caption">Photo Caption</label>
            <input type="text" class="form-control" name="caption" value="<?php echo isset($photo->caption) ? $photo->caption : ''; ?>">
        </div>
        
        <div class="form-group">
            <label for="alternate_text">Alternate Text</label>
            <input type="text" class="form-control" name="alternate_text" value="<?php echo isset($photo->alternate_text) ? $photo->alternate_text : ''; ?>">
        </div>

        <div class="form-group">
            <label for="description">Photo Description</label>
            <textarea class="form-control" name="description" col="30" rows="10"><?php echo isset($photo->description) ? $photo->description : ''; ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="file_upload">Photo Upload</label>
            <input type="file" name="file_upload">
        </div>
        
        <div class="form-group">
            <input class= "btn btn-primary" type="submit" name="submit" value="Add Photo">
        </div>
    </form>
</div>
