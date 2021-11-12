<?php
    
    require_once('./db_config.php');
    $db= new db_operation();

    $result=$db->showData();

    if(!isset($_COOKIE['name']) || !isset($_COOKIE['password'])){
        

        header("location: login.php");
    }
    

    //print_r($result);

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
<body class="bg-light">
    <div class="container">
    <div class="card justify-content mt-3">
        <div class="row justify-content-center mt-4">
            

            
                <div class="row">

                <div class=" col-lg-11">
                        <div class="text-center my-3">
                                <h2>Welcome <?php if(isset($_COOKIE['name'])){ 
                                    echo $_COOKIE['name'];
                                    }
                                    ?> to dashboard</h2>
                        </div>

                </div> 
                    <div class=" col-lg-1">             
                            
                            <div class="text-end my-3">
                                    <button class="btn btn-outline-danger" onclick="location.href='./logout.php'">logout</button>
                            </div>

                                
                    </div>

                 </div>
            </div>
            
            
        
  

            <table class="table table-bordered table-striped table-dark table-hover">
                <thead class="thead-dark">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th colspan="2">Action</th>
                </thead>
                <?php
                while($row= $result->fetch_assoc()){
                  ?>
                  <tr>
                      <td><?php echo  $row['username'] ?></td>
                      <td><?php echo  $row['email'] ?></td>
                      <td><?php echo  $row['address'] ?></td>
                      <td>
                          <a href="index1.php?edit=<?php echo $row['id']?>" class="btn btn-info">Edit</a>
                      </td>
                      <td>
                          <a href="operations.php?delete=<?php echo $row['id']?>" class="btn btn-danger" name="delete" >Delete</a> 
                      </td>
                  </tr>
                  
                 <?php
                }
                ?>

                <?php
                    if(isset($_SESSION['message'])){?>
                    

                    <div class="alert alert-<?=$_SESSION['msg_type']?>">
                
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                    
                    </div>

                    <?php } ?>

            </table>
            
            

    </div>
        </div>
        

    </div>
    







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>