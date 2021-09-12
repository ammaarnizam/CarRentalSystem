<?php
    if(isset($_POST["txtUN"])){
        //Get form data
        $un = $_POST["txtUN"];
        $pw = $_POST["txtPW"];
        $type = $_POST["cmbType"];

        //Connect with MySQL Server to compare table data
        $con = mysqli_connect("localhost:3306","","");
        mysqli_select_db($con,"");
        $sql = "SELECT * FROM ___ WHERE uname='$un' AND pword='$pw' AND type='$type' ";
        $result = mysqli_query($con,$sql);
        if($row = mysqli_fetch_array($result)){
            session_start();
            $_SESSION["uname"] = $un;
            $_SESSION["utype"] = $type;

            //Redirect to home page
            header("Location:home.php");
        }
        else{
            echo "Invalid username or password";
        }  

        mysqli_close($con);
    }
?>

<html>
<head>
    <title>Login</title>
</head>
<body>
    <form name="frmLogin" method="post" action="#">
        Username: <input type="text" name="txtUN" /><br />
        Password: <input type="Password" name="txtPW" /><br />
        User Type: <select name="cmbType">
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select><br />
        <input type="submit" name="btnLogin" value="Login" />
    </form>
</body>
</html>