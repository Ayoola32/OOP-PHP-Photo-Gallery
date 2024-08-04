<?php $photos = Photo::find_all();?>

<table class="table  hovered table-hover table-striped">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Id</th>
            <th>Title</th>
            <th>Filename</th>
            <th>Size</th>
            <!-- <th>Description</th> -->
            <!-- <th>Type</th> -->
        </tr>
    </thead>
    <tbody>
        <?php foreach($photos as $photo) : ?>
            <tr>
                <td>
                    <img src="<?php echo $photo->picture_path(); ?>" alt="" style="width: 200px; height: auto;">
                    <div class="picture_link">
                        <a class='btn-warning' href=''>View</a>
                        <a class='btn-info mr-2' href='photos.php?source=photo_update&photo_id=<?php echo $photo->photo_id;?>'>Edit</a>
                        <a class='btn-danger' href='photos.php/?source=photo_delete&photo_id=<?php echo $photo->photo_id;?>'>Delete</a>
                    </div>
                </td>
                <td><?php echo $photo->photo_id?></td>
                <td><?php echo $photo->title?></td>
                <td><?php echo $photo->filename?></td>
                <td><?php echo $photo->size?></td>
                <td><?php //echo $photo->description?></td>
                <td><?php //echo $photo->type?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table> 