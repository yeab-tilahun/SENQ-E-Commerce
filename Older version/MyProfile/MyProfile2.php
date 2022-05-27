<?php
require("../connect.php");
$con=getConnect();
$currentUser= 'yodahe@gmail.com'; //get_current_user();
$query="select * from Customers where email='$currentUser'";
$result=sqlsrv_query($con, $query);

while(sqlsrv_fetch_array($result)){
    $name=$row['Fname'];
    $lname=$row['Lname'];
    $email=$row['Email'];
    $password=$row['PassWrd'];
    $phone=$row['phoneNo'];
}

// $_POST['fname']=$fname;
// $_POST['lname']=$lname;
// $_POST['pass']=$password;
// $_POST['email']=$email;
// $_POST['phone']=$phone;



echo 
'<script>
    document.getElementByClassName("fname").value = "'.$name.'";
</script>';


if(isset($_POST['edit'])){

}


?>
    <input type="text" name="email" placeholder="Email" disabled required>

<?php