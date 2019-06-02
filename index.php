<?php  
 $connect = mysqli_connect("localhost", "root", "", "sdproject");  
 ?>  
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sell Your vehicle at best price | Home</title>
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <style>
        table, th, td {
        border: 1px solid black;
        height:50px;
        width: 40px;
        p { color:blue; }
        h1 {
            text-shadow: 3px 2px red;
        }

    }
    </style>
</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <!-- <div class="amado-navbar-brand">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div> -->
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li>Welcome</li> 
                    <li class="active">
                       <i> <?php
                            session_start();
                            echo $_SESSION["email"];
                        ?></i>
                    </li>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="try.php">Sell now</a></li>
                   
                    <li><a href="aboutUs.html">About Us</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <!-- <a href="cart.html" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a> -->
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <div class="container" style="width:650px;">  
            <h1 >Want to sell your product?</h1>  
            
            <br />  
            <table class="table table-bordered" width= "500 %">  
                <?php   
                    $query = "SELECT * FROM product_details ORDER BY id DESC";  
                    $result = mysqli_query($connect, $query);  
                    while($row = mysqli_fetch_array($result))  
                    {   
                        $id = $row['id'];
                        $field1name = $row["pname"];
                        $field2name = $row[ 'price' ];
                        echo '  
                            <tr>  
                                <td colspan=2>  
                                        <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="300" width="700" class="img-thumnail" />  
                                </td>  
        
                                
                            </tr>  
                            <tr>
                                <td>
                                    '.$field1name.'
                                </td>
                                <td>
                                    RS. '.$field2name.'
                                </td>
                            </tr>
                            <tr>  
                            <td colspan=2>  
                            <a href="someshit.php?id=' . $id . '"> <button class="btn btn-success">View Product details </button></a>
                            </td>  
                            </tr>
                        
                            
                        </tr>  
                            
                        ';  
                    }  
                ?>  
            </table>  
        </div>  
    
    </div>
    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

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
      });  
 });  
 </script>  
     <!-- <tr>
                            <td colspan=2>  
                            <a href="updated.php?id=' . $id . '"> <button class="btn btn-success">Delete </button></a>
                            </td>  
                            </tr> -->
    