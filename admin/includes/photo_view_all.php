<?php $photos = Photo::find_all();?>

<table class="table table-bordered hovered table-hover table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Description</th>
            <th>Filename</th>
            <th>Type</th>
            <th>Size</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($photos as $photo) : ?>
            <tr>
                <td><?php echo $photo->photo_id?></td>
                <td><img src="<?php echo $photo->picture_path(); ?>" alt="" style="width: 100px; height: auto;"></td>
                <td><?php echo $photo->title?></td>
                <td><?php echo $photo->description?></td>
                <td><?php echo $photo->filename?></td>
                <td><?php echo $photo->type?></td>
                <td><?php echo $photo->size?></td>
                <td><a class='btn btn-warning' href=''>View</a></td>
                <td><a class='btn btn-info mr-2' href='photos.php?source=photo_update&photo_id=<?php echo $photo->photo_id;?>'>Edit</a></td>
                <td><a class='btn btn-danger' href='photos.php/?source=photo_delete&photo_id=<?php echo $photo->photo_id;?>'>Delete</a></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table> 