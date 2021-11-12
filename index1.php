<?php
    require_once('./db_config.php');
    $db= new db_operation();
    

    $show_value['id']="";
    $show_value['username']="";
    $show_value['email']="";
    $show_value['password']="";
    $show_value['address']="";
    $update=false;


    if(isset($_GET['edit'])){
        $ID=$_GET['edit'];
        $show_data= $db->showRecord($ID);

    
        if($show_data){

            $show_value=mysqli_fetch_assoc($show_data);
            $update=true;
    
        }
        else{
            $_SESSION['message']= "could not find record";
            $_SESSION['msg_type']= "danger";
            
            header("location: index1.php");
        }
    }

    

    

    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>CURD OOP project</title>
</head>
<body class="bg-dark">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 m-auto">
            <?php
                    if(isset($_SESSION['message'])){?>
                    

                    <div class="alert alert-<?=$_SESSION['msg_type']?>">
                
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                    
                    </div>

                    <?php } ?>
                <div class="card mt-5">
                    <div class="card-header">

                    <?php if($update==true){
                        ?>
                        <h2> Update Form </h2>
                        <?php
                    }else{
                        ?>
                        <h2>Signup Form</h2>

                        
                        <?php
                    }
                        ?>
                    </div>
                    <div class="card-body">
                        <?php $db->insert_record();
                            $db->update_record();
                        ?>

                        <form  method="POST">
                            <div class="form-group">
                                <label for="userName">User name</label>
                                <input type="hidden" class="form-control mt-2 mb-2" name="id" id="id"  value="<?php echo $show_value['id'];?>" >
                                <input type="text" class="form-control mt-2 mb-2" name="name" id="userName"  placeholder="Enter User Name" value="<?php echo $show_value['username'];?>" >
                            </div>
                            <div class="form-group">
                                <label for="emailAddress">Email address</label>
                                <input type="email" class="form-control mt-2 mb-2" name="email" id="emailAddress"  placeholder="Enter email" value="<?php echo $show_value['email'];?>">
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control mt-2 mb-2" name="password" id="password"  placeholder="Enter your password" value="<?php echo $show_value['password'];?>" >
                            </div>
                            <div class="form-group">
                                <label for="userAddress">Address</label>
                                <input type="text" class="form-control mt-2 mb-2" name="address" id="userAddress"  placeholder="Enter your address"  value="<?php echo $show_value['address'];?>">
                            </div>
                           
                            
                    </div>
                    <div class="card-footer">
                        <?php 
                        if($update==true){

            

                            ?>
                            <div class="form-group">
                            <button type="submit" class="btn btn-info" name="update" id="update" >Update</button>
                            </div>
                        <?php
                        }else{
                            require_once('./setCookie.php');

                            ?>

                            <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Register</button>
                            <a href="login.php" class="btn btn-info">login</a>
                            </div>
                            
                            
                     <?php
                        }
                        
                        ?>

                    </div>
                        </form>
                    

                 </div>

                

            </div>

        </div>

    </div>
    







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>