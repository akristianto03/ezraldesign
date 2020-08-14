<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            include 'links.php'
        ?>
    </head>
    <body>

        <header>
            <div class="container center-div shadow">
                <div class="heading text-center mb-5 text-uppercase text-black">
                    EZRALDESIGN ADMIN LOGIN PAGE
                </div>
                <div class="container row d-flex flex-row justify-content-center mb-5 container-fluid">
                    <div class="admin-form shadow p-2">
                        <form action="logincheck.php" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="user" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pass" value="" class="form-control" autocomplete="off">
                            </div>
                            <input type="submit" class="btn btn-success" name="submit">
                        </form>
                    </div>
                </div>
                
            </div>
        </header>

    </body>
</html>