<?php  include '../shared/head.php';
       include '../shared/nav.php';
       include '../general/configDatabase.php';
       include '../general/function.php';

       if(isset($_POST['send'])){
           $name=$_POST['name'];
           $email=$_POST['email'];
           $fieldID=$_POST['fieldID'];

           $insert="INSERT INTO `doctors` VALUES (NULL, '$name', '$email', $fieldID)";
           $i=mysqli_query($conn, $insert);

           testMessege($i, "Insert");
       }
       $select="SELECT * FROM `fields`";
       $s=mysqli_query($conn, $select);
       $name="";
       $email="";
       $update=false;
       if(isset($_GET['edit'])){
           $update=true;
           $id=$_GET['edit'];
           $select="SELECT * FROM `doctors` WHERE id=$id";
           $ss=mysqli_query($conn, $select);
           $row=mysqli_fetch_assoc($ss);
           $name=$row['name'];
           $email=$row['email'];

           if(isset($_POST['update'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $fieldID=$_POST['fieldID'];
 
            $update="UPDATE `doctors` SET name='$name', email='$email', fieldID=$fieldID WHERE id=$id";
            $u=mysqli_query($conn, $update);
            header("location:/hospital/doctors/list.php");
        }
       }
       auth();
?>

<div class="container col-6">
    <?php if($update): ?>
        <h1 class="text-info text-center">Update Doctor</h1>
    <?php else : ?>
        <h1 class="text-info text-center">Add Doctor</h1>
    <?php endif; ?>
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Doctor name</label>
                    <input type="text" value="<?php echo $name ?>" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Doctor email</label>
                    <input type="text" value="<?php echo $email ?>" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Doctor fieldID</label>
                    <select name="fieldID" class="form-control">
                        <?php foreach($s as $data){ ?>
                            <option value="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <?php if($update): ?>
                    <button name="update" class="btn btn-primary col-3">Update Data</button>
                <?php else : ?>
                    <button name="send" class="btn btn-info">Send Data</button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<?php  include '../shared/script.php' ?>