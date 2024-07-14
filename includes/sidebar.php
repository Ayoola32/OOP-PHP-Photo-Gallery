<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method ="post">
    <div class="input-group">
        <input type="text" name="search"class="form-control">
        <span class="input-group-btn">
        <button name = "submit" class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form> <!--search form -->
    <!-- /.input-group -->
</div>

<div class="well">
        <h4>Login</h4>
        <form action="" method ="post">
            <div class="form-group">
                <input type="text" name="username"class="form-control" placeholder="Enterr Username">
            </div>
            
            <div class="input-group">
                <input type="password" name="password"class="form-control" placeholder="Enter Password">
                <span class="input-group-btn">
                    <button name = "submit" class="btn btn-primary" type="submit">
                        Submit
                    </button>
                </span>
            </div>
            
            <div class="form-group">
                <a href="">Forgot Password</a>
            </div>
            
        </form> <!--Login form -->
</div>



<!-- Blog Categories Well -->
<div class="well">
<h4>Blog Categories</h4>
<div class="row">
    <div class="col-lg-6">
        <ul class="list-unstyled">
        <?php
           
        ?>
        </ul>
    </div>
</div>
<!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "includes/widget.php";?>