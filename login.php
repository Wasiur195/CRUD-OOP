<?php
require_once('./db_config.php');
$db = new db_operation();
require_once('./setCookie.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>CURD OOP Login</title>
</head>

<body class="bg-light">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 m-auto">
                <?php
                if (isset($_SESSION['message'])) { ?>


                    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>

                    </div>

                <?php } ?>
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Login Form</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        $db->match_record();
                        ?>

                        <form method="POST">
                            <div class="form-group">
                                <label for="userName">User name</label>
                                <input type="text" class="form-control mt-2 mb-2" name="name" id="userName" placeholder="Enter User Name">
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control mt-2 mb-2" name="password" id="password" placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" name= "remember"  id="flexCheckChecked" >
                                <label class="form-check-label" for="flexCheckChecked">
                                    Remember me on this browser
                                </label> 


                            </div>



                    </div>
                    <div class="card-footer">


                        <div class="form-group">
                            <button type="submit" class="btn btn-info" name="login" id="login">Login</button>
                            <a href="index1.php" class="btn btn-primary">Register</a>
                        </div>



                    </div>
                    </form>


                </div>



            </div>

        </div>

    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>