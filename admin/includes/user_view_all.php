<?php $users = User::find_all();?>

<table class="table  hovered table-hover table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user) : ?>
            <tr>
                <td><?php echo $user->user_id?></td>
                <td>
                    <img src="<?php echo $user->image_path_placeholder(); ?>" alt="" style="width: 150px; height: auto;">
                    <div class="picture_link">
                        <a class='btn-warning' href=''>View</a>
                        <a class='btn-info mr-2' href='users.php?source=user_update&user_id=<?php echo $user->user_id;?>'>Edit</a>
                        <a class='btn-danger' href='users.php?source=user_delete&user_id=<?php echo $user->user_id;?>'>Delete</a>
                    </div>
                </td>
                <td><?php echo $user->username?></td>
                <td><?php echo $user->first_name?></td>
                <td><?php echo $user->last_name?></td>
                <td><?php echo $user->user_email?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table> 