<?php
    session_start();
    

    $id=$_GET['id'];
    include("connection.php");
    
    $query="select * from tbl_user where user_id='$id'";
    $result=mysqli_query($con,$query);
    While($data1=mysqli_fetch_array($result))
    {
                            $status=$data1['status'];
    }
    if($status=='1')
    {
        $query="update tbl_user set status='0' where user_id='$id'";
        $result=mysqli_query($con,$query);
        ?>
        <script>
             window.location.href='admin.php';
            </script>
            <?php
    }
    else{
        $query="update tbl_user set status='1' where user_id='$id'";
        $result=mysqli_query($con,$query);
        ?>
        <script>
            window.location.href='admin.php';
            </script>
            <?php
    }
    ?>