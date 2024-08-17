<?php


if (empty($_GET['photo_id'])) {
    redirect("../admin/photos.php");
}else {
    $photo = Photo::find_by_id($_GET['photo_id']);

    if (isset($_POST['update'])) {
        if ($photo) {
            $photo->title = $_POST['title'];
            $photo->author = $_POST['author'];
            $photo->caption = $_POST['caption'];
            $photo->alternate_text = $_POST['alternate_text'];
            $photo->description = $_POST['description'];
            // $photo->set_file($_FILES['file_upload']);

            if ($photo->save()) {
                $message = "<p class='alert alert-success'>Photo updated successfully.</p>";
            }else{
                $message = join("<br>", $photo->errors);
            }
        } else {
            $message = "<p class='alert alert-danger'>Error updating photo.</p>";
        }
    }
}
$message = "";






?>





<!-- Update Photo Form -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-7">
        <?php echo $message?>
        <h2>Update Photo</h2>
            <div class="form-group">
                <label for="title">Photo Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $photo->title?>" >
            </div>

            <div class="form-group">
                <a class="thumbnail" href="#">
                    <img src="<?php echo $photo->picture_path();?>" alt="" style="width: 300px; height: auto;">
                    <!-- <label for="file_upload">Change Photo (optional)</label>
                    <input type="file" name="file_upload" value=""> -->
                </a>
            </div>
            
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" name="author" value="<?php echo $photo->author?>" >
            </div>

            <div class="form-group">
                <label for="caption">Caption</label>
                <input type="text" class="form-control" name="caption" value="<?php echo $photo->caption?>" >
            </div>
            
            <div class="form-group">
                <label for="alternate_text">Alternate Text</label>
                <input type="text" class="form-control" name="alternate_text" value="<?php echo $photo->alternate_text?>" >
            </div>

            <div class="form-group">
                <label for="description">Photo Description</label>
                <textarea id="summernote" class="form-control" name="description" col="30" rows="10"><?php echo $photo->description?></textarea>
            </div>
    </div>
    
    
    <div class="col-md-4" >
        <div  class="photo-info-box">
            <div class="info-box-header">
                <h3>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h3>
            </div>
            <div class="inside">
                <div class="box-inner">
                    <h4 class="text">
                        <span class="glyphicon glyphicon-calendar"></span> Uploaded on: <?php echo date('F d, Y \a\t g:i A', strtotime($photo->date));?>
                    </h4>
                    <h5 class="text ">
                        Photo Id: <span class="data photo_id_box"><?php echo $photo->photo_id?></span>
                    </h5>
                    <h5 class="text">
                        Filename: <span class="data"><?php echo $photo->filename?></span>
                    </h5>
                    <h5 class="text">
                        Author: <span class="data"><?php echo $photo->author?></span>
                    </h5>
                    <h5 class="text">
                        File Type: <span class="data"><?php echo $photo->type?></span>
                    </h5>
                    <h5 class="text">
                        File Size: <span class="data"><?php echo $photo->size?> kb</span>
                    </h5>
                </div>
                
                <div class="info-box-footer clearfix">
                    <div class="info-box-delete pull-left">
                        <a href="photos.php/?source=photo_delete&photo_id=<?php echo $photo->photo_id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                    </div>
                    
                    <div class="info-box-update pull-right ">
                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                    </div>   
                </div>
            </div>          
        </div>
    </div>
</form>
    
    