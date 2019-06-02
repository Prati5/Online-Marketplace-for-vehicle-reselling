<?php  
     $backgroundimg="/opt/lampp/htdocs/vehicleReselling/img/bg-img/1.jpg" ;
     session_start();
     $connect = mysqli_connect("localhost", "root", "", "sdproject");  
     if(isset($_POST["insert"]))  
     {  
        
        $Pname = mysqli_real_escape_string($connect, $_POST['pname']);
        $Price = mysqli_real_escape_string($connect, $_POST['price']);
        $Milage = mysqli_real_escape_string($connect, $_POST['milage']);
        $Rstatus = mysqli_real_escape_string($connect, $_POST['rstatus']);
        $Mobile=mysqli_real_escape_string($connect, $_POST['Mobile']);
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $email= mysqli_real_escape_string($connect, $_POST['email']);
        //$query = "INSERT INTO tbl_images(name) VALUES ('$file')";  
        //echo "Form data is coming name is".$Pname . "Price" .$Price ."Milage". $Milage."RunStatus".$Rstatus;
        $query = "INSERT INTO product_details(pname,price,milage,r_status,name,email,Mobile) VALUES ('$Pname','$Price','$Milage','$Rstatus','$file','$email','$Mobile')";
    
        if(mysqli_query($connect, $query))  
        {  
            echo '<script>alert("Details inserted into Database")</script>';  
        }  
        else
        {
        echo 'Not inserted in to database';
        }

    }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Insert and Display Images From Mysql Database in PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
           <style>
               .button {
                    background-color: #4CAF50; /* Green */
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
               }

               .button2 {background-color: #008CBA;}  
          </style>
      </head>  
      <body background=href="http://www.example.com/bgimage.gif">  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Enter your product Details</h3>  
                <br />  
                <form method="post" action="" enctype="multipart/form-data"> 
                    <label>Product Name</label>
                    <input type="text" id='pname' name="pname" maxlength="30" placeholder="Enter your product name" class='form-control' required />
                    </br>
                    <label> Price </label>
                    <input type="number" min="1" id='price' name="price" placeholder="Enter price in Rupees" class='form-control' required />
                    </br>
                    <label> Current Milage </label>
                    <input type="number" min='1' id ='milage' name='milage' placeholder="Enter milage in kms/hr" class='form-control' required/>
                    </br>
                    <label> Running Status </label>
                    <input type="number" min='1' id ='rstatus' name='rstatus' placeholder="Running Status in kms" class='form-control' required/>
                    </br>
                    <label>Email </label>
                    <input type="email" min='1' id ='email' name='email' placeholder="Enter your Email" class='form-control' required/>
                    </br>
                    <label>Mobile Number</label>
                    <input type="" min='1' id ='Mobile' name='Mobile' placeholder="Enter your Mobile Number" class='form-control' required/>
                    </br>
                    <input type="file" name="image" id="image" />  
                    <br />  
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />  
                <a href="index.php"> <button class="button button2">Go back to Home Page </button></a>
          </div>  
     </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  

           var p_name=$('#pname').val();
           if(p_name == ''){
                alert("Please Enter Vehicle name");
                return false;
           }
           var mobile=$('#Mobile').val();
           if(mobile == ''){
                alert("Please Enter Your Mobile Number");
                return false;
           }
      });  
 });  
 </script>  