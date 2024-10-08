    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Service</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>

                </ul>

                <!-- Dont display admin if not logged in -->
                <?php if ($session->is_signed_in()): ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="admin">Admin</a></li>
                    </ul>
                    <?php else: ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="./login.php">Signin</a></li>
                            <li><a href="./registration.php">Signup</a></li>
                        </ul>
                    <?php endif; ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>