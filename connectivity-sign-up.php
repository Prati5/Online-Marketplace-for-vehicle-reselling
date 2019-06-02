<html>
    <head>
        <style>
            #button1{
                background-color: #4CAF50;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 300px;
                height: 60px;
                opacity: 0.9;
            }
        </style>
    </head>
</html>
<?php 
// if($_POST['password'] != $_POST['cpass']){ 
// 	 $error_message = 'Passwords should be same<br>'; 
// 	 }
define('DB_HOST', 'localhost');
define('DB_NAME', 'sdproject'); 
define('DB_USER','root'); 
define('DB_PASSWORD',''); 
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
function NewUser() { 
    $fullname = $_POST['name']; 
    $userName = $_POST['user']; 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $query = "INSERT INTO WebsiteUsers (fullname,userName,email,password) VALUES ('$fullname','$userName','$email','$password')"; $data = mysql_query ($query)or die(mysql_error()); 
    if($data) { 
        echo "Done !!Please Login to continue";
        echo nl2br("<button  id='button1' onclick=\"location.href='bg.php'\">Login</button>");
     }
} 
function SignUp() { 
    if(!empty($_POST['user'])){
        $query = mysql_query("SELECT * FROM WebsiteUsers WHERE userName = '$_POST[user]' AND password = '$_POST[password]'") or die(mysql_error()); 
        if(!$row = mysql_fetch_array($query) or die(mysql_error())) { 
            newuser(); 
        } 
        else { 
            echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; 
        } 
    } 
} 
if(isset($_POST['submit'])) { SignUp(); } 
?>
