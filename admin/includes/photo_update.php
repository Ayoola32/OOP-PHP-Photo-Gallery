<?php
if (isset($_POST['update'])) {

}



?>





<!-- Update Photo Form -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-7">
        <h2>Update Photo</h2>
            <div class="form-group">
                <label for="title">Photo Title</label>
                <input type="text" class="form-control" name="title" value="" >
            </div>
            
            <div class="form-group">
                <label for="caption">Caption</label>
                <input type="text" class="form-control" name="caption" value="" >
            </div>
            
            <div class="form-group">
                <label for="alternate_text">Alternate Text</label>
                <input type="text" class="form-control" name="alternate_text" value="" >
            </div>

            <div class="form-group">
                <label for="description">Photo Description</label>
                <textarea class="form-control" name="description" col="30" rows="10" ></textarea>
            </div>

            <div class="form-group">
                <label for="file_upload">Change Photo (optional)</label>
                <input type="file" name="file_upload">
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
                        <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                    </h4>
                    <h5 class="text ">
                        Photo Id: <span class="data photo_id_box">34</span>
                    </h5>
                    <h5 class="text">
                        Filename: <span class="data">image.jpg</span>
                    </h5>
                    <h5 class="text">
                        File Type: <span class="data">JPG</span>
                    </h5>
                    <h5 class="text">
                        File Size: <span class="data">3245345</span>
                    </h5>
                </div>
                
                <div class="info-box-footer clearfix">
                    <div class="info-box-delete pull-left">
                        <a href="photos.php/?source=photo_delete&photo_id=<?php //echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                    </div>
                    
                    <div class="info-box-update pull-right ">
                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                    </div>   
                </div>
            </div>          
        </div>
    </div>
</form>
    
    