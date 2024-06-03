<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style1.css">  
    </head>
    <body>
    <?php
     
      if($_SERVER['REQUEST_METHOD']=="POST")
      { 
        $name = $_POST['Agency'];
        $email = $_POST['email'];
        $phone=$_POST['phone'];

        
      
        $severname="localhost";
        $username="root";
        $password="";
        $database="maps";
        $conn=mysqli_connect($severname,$username,$password,$database);
  
        if(!$conn)
        {
            die("failed to connect".mysqli_connect_error());
        }
        else{
         echo "connected";
        }
        
        $sql = "INSERT INTO `register` (`Name of Agency`,`Phone`,`Email`,`longitude`,`latitude` ) VALUES ('name','email',phone)";
        mysqli_query($conn,$sql);
        echo "inserted";
      
    }
    ?>
  
        <form action="form1.php">
            <div class="c1">
                <h1>Register</h1>
                <hr>
                <label for="text"><b>Name of Agency</b>
                </label>
                <input type="text" placeholder="Enter name" name="Agency" id="ag" required>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter email" name="email" id="email" required>
                <label for="psw"><b>Password</b></label>
              
                <input type="number" placeholder="Enter phone" name="phone" id="phone" required>
                <label for="addr"><b>Address</b></label>
                
                <input type="checkbox" id="e1" name="e1" value="Floods">
                <label for="e1">Floods</label><br>
                <input type="checkbox" id="e2" name="e2" value="Earthquake">
                <label for="e1">Earthquakes</label><br>
                <input type="checkbox" id="e3" name="e3" value="Fire accidents">
                <label for="e1">Fire accidents</label><br>
                <p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script>

                <button type="submit" class="sub">Register</button>
            </div>
            <div class="c2">
                <p>Already have an accont?<a href="#">Sign in</a></p>
            </div>
        </form>
    </body>
</html>