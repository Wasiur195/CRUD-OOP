<?php

session_start();


require_once('./db_config.php');
$db_obj = new dbconfig();

$cookieTime = 60 * 10;





class db_operation extends dbconfig
{




    //login match query

    public function match_record()
    {
        global $cookieTime;
        if (isset($_POST['login'])) {

            $check = isset($_POST['remember']) ? "checked" : "unchecked";
            if (!empty($_POST['name']) && !empty($_POST['password'])) {
                $name = $_POST['name'];
                $pass = md5($_POST['password']);


                $val = $this->match_query($name, $pass);
                $row = $val->fetch_assoc();



                if (!empty($row['username']) && !empty($row['password'])) {

                    if ($row['username'] == $name && $row['password'] == $pass) {

                        if ($check == "checked") {

                            setcookie('name', $name, time() + $cookieTime);
                            setcookie('password', $pass, time() + $cookieTime);
                            $_SESSION['message'] = "welcome $name";
                            $_SESSION['msg_type'] = "success";
                            header("location: view.php");
                            exit();
                        } else {

                            setcookie('name', $name, time() + 2);
                            setcookie('password', $pass, time()+ 2);


                            $_SESSION['message'] = "welcome $name";
                            $_SESSION['msg_type'] = "warning";
                            header("location: view.php");
                            exit();
                        }
                    }
                } else {

                    $_SESSION['message'] = "wrong username or password ";
                    $_SESSION['msg_type'] = "danger";
                    header("location: login.php");
                }
            } else {

                $_SESSION['message'] = "All fields are required";
                $_SESSION['msg_type'] = "warning";
                header("location: login.php");
            }
        }
    }
    //match query code

    public function match_query($a, $b)
    {
        global $db_obj;

        $query4 = "SELECT * FROM usertable WHERE username='$a' AND password = '$b'";
        $result4 = mysqli_query($db_obj->connection, $query4);

        return $result4;
    }


    //insert function


    public function insert_record()
    {
        global $cookieTime;
        if (isset($_POST['submit'])) {
            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['address'])) {


                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $pass = md5($_POST['password']);

                if ($this->submit_query($name, $email, $address, $pass)) {
                    $_SESSION['message'] = "Record has been Saved";
                    $_SESSION['msg_type'] = "success";
                    setcookie('name', $name, time() + $cookieTime);
                    setcookie('password', $pass, time() + $cookieTime);
                    header("location: index1.php");
                } else {
                    $_SESSION['message'] = "Error is saving";
                    $_SESSION['msg_type'] = "danger";
                    header("location: index1.php");
                }
            } else {

                $_SESSION['message'] = "All fields are required";
                $_SESSION['msg_type'] = "warning";
                header("location: index1.php");
            }
        }
    }



    // insert query

    public function submit_query($a, $b, $c, $d)
    {
        global $db_obj;

        $query = "INSERT INTO usertable(username,email,address,password) VALUES ('$a','$b','$c','$d')";
        $result = mysqli_query($db_obj->connection, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    //update record


    public function update_record()
    {
        if (isset($_POST['update'])) {
            if (!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['address'])) {


                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $pass = $_POST['password'];
                $id = $_POST['id'];

                if ($this->update_query($name, $email, $address, $pass, $id)) {
                    $_SESSION['message'] = "Record has been updated";
                    $_SESSION['msg_type'] = "primary";
                    header("location: view.php");
                } else {
                    $_SESSION['message'] = "password needed for changing";
                    $_SESSION['msg_type'] = "warning";
                    header("location: index1.php");
                }
            } else {

                $_SESSION['message'] = "All fields are required";
                $_SESSION['msg_type'] = "danger";
                header("location: index1.php");
            }
        }
    }

    public function update_query($a, $b, $c, $pass, $id)
    {
        global $db_obj;

        $query = "UPDATE usertable set username='$a', email='$b', address='$c',password='$pass' where id='$id'";
        $result = mysqli_query($db_obj->connection, $query);
        if ($result) {

            return true;
        } else {

            return false;
        }
    }






    public function deleteData($a)
    {
        global $db_obj;

        $id = $a;


        $query3 = "delete from usertable where id='$id'";
        $result3 = mysqli_query($db_obj->connection, $query3);
        return $result3;
    }

    public function showData()
    {
        global $db_obj;
        $query2 = "SELECT * FROM usertable";
        $result2 = mysqli_query($db_obj->connection, $query2);
        if ($result2) {

            return $result2;
        } else {
            echo "array empty";
        }
    }
    public function showRecord($a)
    {
        global $db_obj;
        $id = $a;
        $query2 = "SELECT * FROM usertable WHERE id='$id'";
        $result2 = mysqli_query($db_obj->connection, $query2);
        if ($result2) {

            return $result2;
        } else {
            echo "array empty";
        }
    }
}




$obj = new db_operation();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    if ($obj->deleteData($id)) {

        $_SESSION['message'] = "Record has been deleted";
        $_SESSION['msg_type'] = "secondary";
        header("location: view.php");
    } else {
        $_SESSION['message'] = "could not delete record";// session===  00111110001010100000010101010100111000
        $_SESSION['msg_type'] = "danger";                // AF66G7
        header("location: view.php");                   // $_SESSION
    }
}
