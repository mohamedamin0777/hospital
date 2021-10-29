<?php  include '../shared/head.php';
       include '../shared/nav.php';
       include '../general/configDatabase.php';
       include '../general/function.php';

       $select="SELECT doctors.id , doctors.name doctor , doctors.email , fields.name field FROM `doctors` JOIN fields ON
       doctors.fieldID=fields.id";
       $s=mysqli_query($conn, $select);

       if(isset($_GET['delete'])){
           $id=$_GET['delete'];
           $delete="DELETE FROM `doctors` WHERE id = $id";
           $d=mysqli_query($conn,$delete);
           header("location:/hospital/doctors/list.php");
        }
        auth();
?>

<div class="container col-6">
    <h1 class="text-info text-center">List Doctor</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>FieldID</th>
                    <th>Actions</th>
                </tr>
                <?php foreach($s as $data){ ?>
                <tr>
                    <th><?php echo $data['id'] ?></th>
                    <td><?php echo $data['doctor'] ?></th>
                    <td><?php echo $data['email'] ?></th>
                    <td><?php echo $data['field'] ?></th>
                    <td><a href="delete.php?delete=<?php echo $data['id'] ?> " class="btn btn-danger">Delete</a></td>
                    <td><a href="add.php?edit=<?php echo $data['id'] ?> " class="btn btn-info">Update</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php  include '../shared/script.php' ?>