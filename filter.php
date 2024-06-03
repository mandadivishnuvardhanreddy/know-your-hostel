filter

<!DOCTYPE html>
<html>
<head>
    <title>Hostel Data Filter</title>
   
    <style>
        body
        {
            background-size: 100% 100%;
background-position: 0px 0px;
background-image: linear-gradient(90deg, #00FF02FF 0%, #71C4FFFF 100%);
        }
       .con
       {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
       
       }

       .form1
       {
        display: flex;
        flex-direction: column;
       }
       .uv
       {
        display: block;
       }
       .result1
       {
        margin:10%;
        display: grid;
       }
    

       .results {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
  
;
}
.mr-3
{
    border: palevioletred;
}

.item {
    border: 1px solid black;
    padding: 10px;
    background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
;
}

.grid-box {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5px;
    
;
}

.label {
    font-weight: bold;
}

.info {
    display: flex;
    flex-direction: column;
}

.result-box {
    display: grid;
    grid-template-columns: auto auto;
    gap: 10px;
}

    

        
.head
{
    font-style: italic;
    font-size: larger;
    font-weight: 300;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0093E9;
}







</style>
</head>
<body>
    <div class="head"><h1>KNOW YOUR HOSTEL<h1></div>
    <div class="con" >
   <div class="mr-3" >
   <label for="minPrice"><h3>Filter based on your priority</h3></label>
        <div class="form1" ><form method="POST" action="r1.php">
        <label for="gender"><h4>Gender:<h4></label>
        <input type="radio" name="filterGender"  value="boys">Boys
        <input type="radio" name="filterGender" value="girls" >Girls
        <br>

        <label for="minPrice"><h4>Room type:<h4></label>
        <input type="checkbox" name="filterRoomTypes[]" value="1 sharing" class="uv" >1 sharing
        <input type="checkbox" name="filterRoomTypes[]" value="2 sharing" class="uv" >2 sharing
        <input type="checkbox" name="filterRoomTypes[]" value="3 sharing" class="uv" >3 sharing
        <input type="checkbox" name="filterRoomTypes[]" value="4 sharing" class="uv" >4 sharing
        <br>
        <label for="minPrice"><h4>Min Price:<h4></label>
        <input type="number" name="minPrice" id="minPrice" class="uv">
        <br>
        <label for="maxPrice"><h4>Max Price:<h4></label>
        <input type="number" name="maxPrice" id="maxPrice" class="uv">
        <br>
        <?php include 'retrievel.php'; ?>
        <br>
        <input type="submit" value="Filter">
    </form>
</div>
   </div>
<div class="container">
        <div class="filters">
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $severname="localhost";
        $username="root";
        $password="";
        $database="hostel128";
        $conn=mysqli_connect($severname,$username,$password,$database);

        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        $filterGender = isset($_POST['filterGender']) ? $_POST['filterGender'] : '';
        $filterLocation = isset($_POST['filterLocation']) ? $_POST['filterLocation'] : '';
        $minPriceFilter = isset($_POST['minPrice']) ? $_POST['minPrice'] : '';
        $maxPriceFilter = isset($_POST['maxPrice']) ? $_POST['maxPrice'] : '';
        $filterRoomTypes = array(); 
        if (isset($_POST['1bhk'])) {
            $filterRoomTypes[] = 'rooms1';
        }
        if (isset($_POST['2bhk'])) {
            $filterRoomTypes[] = 'rooms2';
        }
        if (isset($_POST['3bhk'])) {
            $filterRoomTypes[] = 'rooms3';
        }
        if (isset($_POST['4bhk'])) {
            $filterRoomTypes[] = 'rooms4';
        }
        $sql = "SELECT * FROM `hostel133` WHERE 1=1";
        if (!empty($filterGender)) {
            if ($filterGender === 'boys') {
                $sql .= " AND boys = 1";
            } elseif ($filterGender === 'girls') {
                $sql .= " AND girls = 1";
            }
        }

        if (!empty($filterRoomTypes)) {
            $roomTypes = implode("', '", $filterRoomTypes);
            $sql .= " AND (" . implode(" = 1 OR ", $filterRoomTypes) . " = 1)";
        }

        if (!empty($filterLocation)) {
            $sql .= " AND collegename = '$filterLocation'";
        }
       
        
       
       
        if (!empty($minPriceFilter)) {
            $sql .= " AND minPrice >= $minPriceFilter";
        }
        if (!empty($maxPriceFilter)) {
            $sql .= " AND maxPrice <= $maxPriceFilter";
        }
       
        $result = mysqli_query($conn, $sql);

        
        if (!$result) {
            die('Query failed: ' . mysqli_error($conn));
        }
    
        ?>
        </div>
        <div class="results">
       
            <?php 
        
        if (mysqli_num_rows($result) > 0) {
           
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $email = $row['email'];
                $hostelname = $row['hostelname'];
                $boys = $row['boys'];
                $girls = $row['girls'];
                $collegename = $row['collegename'];
                $minPrice = $row['minPrice'];
                $maxPrice = $row['maxPrice'];
                echo "<div class='result1'>";
                echo "<div class='item'>";
                echo "<div class='grid-box'>";
                echo "<div class='info'>" . $hostelname . "</div>";

            
                echo "<div class='label'>Available Room Types:</div>";
                echo "<div class='info'>";
                if ($row['rooms1'] == 1) {
                    echo "<span class='sharing'>1 sharing</span><br>";
                }
                if ($row['rooms2'] == 1) {
                    echo "<span class='sharing'>2 sharing</span><br>";
                }
                if ($row['rooms3'] == 1) {
                    echo "<span class='sharing'>3 sharing</span><br>";
                }
                if ($row['rooms4'] == 1) {
                    echo "<span class='sharing'>4 sharing</span><br>";
                }
                echo "</div>";
                echo "</div>";
                
                echo "<div class='grid-box'>";
                echo "<div class='label'>Nearby College:</div>";
                echo "<div class='info'>" . $collegename . "</div>";
                echo "</div>";
                
                echo "<div class='grid-box'>";
                echo "<div class='label'>Boys:</div>";
                echo "<div class='info'>" . ($boys ? 'Yes' : 'No') . "</div>";
                echo "</div>";
                
                echo "<div class='grid-box'>";
                echo "<div class='label'>Girls:</div>";
                echo "<div class='info'>" . ($girls ? 'Yes' : 'No') . "</div>";
                echo "</div>";
                
                echo "<div class='grid-box'>";
                echo "<div class='label'>Min Price:</div>";
                echo "<div class='info'>" . $minPrice . "</div>";
                echo "</div>";
                
                echo "<div class='grid-box'>";
                echo "<div class='label'>Max Price:</div>";
                echo "<div class='info'>" . $maxPrice . "</div>";
                echo "  <form  action:mail:";
                echo "  <button type='button'>book a visit!</button>";
                echo "</div>";
                
                echo "</div>";
                echo "</div>";
              

            }             
        
        mysqli_close($conn);
    
        }
}
    ?>
    
      </div>
        </div>
       
        <body>
    
    </div>

</div>
</div>
    
    
</body>
</html>
