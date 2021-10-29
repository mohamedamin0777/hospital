<?php  include '../shared/head.php';
       include '../shared/nav.php';
       include '../general/configDatabase.php';
       include '../general/function.php';
       
       if(isset($_POST['login'])){
           $email=$_POST['email'];
           $password=$_POST['password'];

           $select="SELECT * FROM `admin` WHERE email='$email' and password='$password'";
           $s=mysqli_query($conn,$select);
           $numRows=mysqli_num_rows($s);
           $row=mysqli_fetch_assoc($s);
           if($numRows>0){
               echo "true admin";
               $_SESSION['admin']=$email;
               header("location: /hospital/index.php");
           }
           else{
               echo "false admin";
           }
       }
       print_r($_SESSION);
       ?>

<div class="container col-6">
        <h1 class="text-info text-center">Login Page</h1>
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">User Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">User Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button name="login" class="btn btn-info btn-block">Login</button>
            </form>
        </div>
    </div>
</div>



<?php  include '../shared/script.php' ?>