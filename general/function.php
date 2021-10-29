<?php

function testMessege($condition, $mess){
    if($condition){
        echo "<div class='alert alert-info col-6 mx-auto'>
            $mess is true
        </div>
        ";
    }
    else{
        echo "<div class='alert alert-danger col-6 mx-auto'>
            $mess is false
        </div>
        ";
    }
}
function auth(){
    if($_SESSION['admin']){

    }else{
        header("location: /hospital/admin/login.php");
    }
}
?>