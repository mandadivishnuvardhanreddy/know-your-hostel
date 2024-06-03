<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style1.css">  
    </head>
    <body>
    <?php
     
      if($_SERVER['REQUEST_METHOD']=="POST")
      { 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $hostelname = $_POST['h1name'];
        $boys = isset($_POST['boys']) ? 1 : 0;
        $girls = isset($_POST['girls']) ? 1 : 0;
        $rooms1 = isset($_POST['1bhk']) ? 1 : 0;
        $rooms2 = isset($_POST['2bhk']) ? 1 : 0;
        $rooms3 = isset($_POST['3bhk']) ? 1 : 0;
        $rooms4 = isset($_POST['4bhk']) ? 1 : 0;
        $minPrice = $_POST['quantity1'];
        $collegename = $_POST['hname'];
        $maxPrice = $_POST['quantity2'];
        $severname="localhost";
        $username="root";
        $password="";
        $database="hostel128";
        $conn=mysqli_connect($severname,$username,$password,$database);
  
        if(!$conn)
        {
            die("failed to connect".mysqli_connect_error());
        }
        else{
         echo "connected";
        }
        
        $sql = "INSERT INTO `hostel133` (`name`, `email`, `hostelname`, `boys`, `girls`, `rooms1`, `rooms2`, `rooms3`, `rooms4`, `collegename`, `minPrice`, `maxPrice`) VALUES ('$name', '$email', '$hostelname', $boys, $girls, $rooms1, $rooms2, $rooms3, $rooms4, '$collegename', $minPrice, $maxPrice)";
        mysqli_query($conn,$sql);
        echo "inserted";
      
    }
    ?>
        <h1  class="head">JOIN US</h1>
        <h1 class="head">UPGRADE YOUR BUSINESS</h1>
        <div class="containe" >
            <div class="container" >
            <form action='post.php' method="post">
                <h2>Login</h2>
                <input type="name" required placeholder="name" name="name" />
                <input type="name" required placeholder="Email Address" name="email"/>
                
                <h4>Enter Hostel name</h4>
                <input type="text" id="h1name" name="h1name"><br>
                <h4>Accomdation for</h4>
                <input type="checkbox" name="boys" value="boys">Boys<br>
        <input type="checkbox" name="girls" value="boys">Girls<br>
                <h4>types of rooms available</h4>
                <input type="checkbox" name="1bhk"  class="checkbox" value="1 sharing">1 sharing<br>
        <input type="checkbox" name="2bhk"class="checkbox"  value="2 sharing">2 sharing<br>
        <input type="checkbox" name="3bhk" class="checkbox"  value="3 sharing">3 sharing<br>
        <input type="checkbox" name="4bhk"class="checkbox"  value="4 sharing">4 sharing<br>
        <h4>Enter nearby college</h4>
        <input type="text" id="hname" name="hname"><br>
        <h4>Hostel price</h4>
        <input type="number" id="min" name="quantity1" min="1" max="100000">
        <input type="number" id="max" name="quantity2" min="1" max="100000">
                <button>Login</button>
            </form>
        </div>
        </div>
    </body>
</html>



