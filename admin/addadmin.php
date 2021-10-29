<?php  include '../shared/head.php';
       include '../shared/nav.php';
       include '../general/configDatabase.php';
       include '../general/function.php';
       
       if(isset($_POST['signup'])){
           $email=$_POST['email'];
           $password=$_POST['password'];

           $insert="INSERT INTO `admin` VALUES(NULL, '$email', '$password')";
           $i=mysqli_query($conn, $insert);
           testMessege($i, "Insert Admin");
       }
       auth();
       if($_SESSION['admin']=='mohamed@yahoo.com'){

       
       ?>

<div class="container col-6">
        <h1 class="text-info text-center">Registeration Page</h1>
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
                <button name="signup" class="btn btn-info btn-block">Sign Up</button>
            </form>
        </div>
    </div>
</div>



<?php  
    }else{
        echo "<img class='w-80' src='https://image.shutterstock.com/image-vector/rubber-stamp-text-not-authorized-260nw-292514894.jpg'>";
    }
    include '../shared/script.php' ?>