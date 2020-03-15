<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "myfirstdb";

    $connection = mysqli_connect( $servername,$username,$password,$databasename);

    if(!$connection)
    {
        die("Connection failed: ".mysqli_connect_error());
    }

    session_start();
    $username=$_SESSION['user'];

    $query = "Select Name from Customer where Username='$username';";
    $result = $connection -> query($query);
    $name = $result->fetch_assoc();

    $closeConnection = mysqli_close($connection);
    
?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Volleyball</title>
        <link rel="stylesheet" type="text/css" href="css/sportsstyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <div class="container">
                <div id="logo">
                    <img src="css/images/logo.jpg">
                </div>
                <nav>
                <ul style="margin-top:-34px;margin-left:22px;"> 
                            <li style="text-transform:uppercase;"><?php echo $name['Name']; ?></li>
                            <li><a href="customerlogin.php">Sign Out</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section id="details">
            <div class="container">
                <form method="POST" action="kit.php">
                    <h2 id="heading" style="margin-left: 19em">VOLLEYBALL KIT</h2>
                     <div>
                        <label>Kit</label>
                        <select name="kit" style="width: 174px">
                            <option value="ball">Ball</option>
                            <option value="net">Net</option>
                            <option value="shoe">Shoe</option>
                            <option value="fingertape">FingerTape</option>
                            <option value="shorts">Shorts</option>
                            <option value="jersey">Jersey</option>
                        </select>
                    </div>
                    <br>
                     <div>
                        <label>Brand</label>
                        <select name="brand" style="width: 174px">
                            <option value="cosco">Cosco</option>
                            <option value="nivia">Nivia</option>
                            <option value="wilson">Wilson</option>
                            <option value="molten">Molten</option>
                            <option value="adidas">Adidas</option>
                            <option value="nike">Nike</option>
                        </select>
                    </div>
                    <br>
                     <div>
                        <label>Size</label>
                        <select name="size" style="width: 174px">
                            <option value="kid">Kids</option>
                            <option value="adults">Adults</option>
                            <option value="experts">Experts</option>
                        </select>
                    </div>
                   <br>
                   <div>
                        <label>Price(rupees)</label>
                        <input type="number" name="price" id="price" readonly>
                   </div>
                   <br>
                   <div>
                    <button type="button" name="generate" onclick="myFunction()">Generate price</button>

                    <script>
                        function myFunction(){
                            document.getElementById("price").defaultValue = "855";
                        }
                    </script>

                   </div>
                   <br>
                   <div>
                        <a href="#">
                            <button>PURCHASE</button>   
                        </a>
                        <br><br>
                        
                   </div>
                </form>
            </div>
        </section>
        <footer>
            AA Sports Company,Copyright &copy;2019
        </footer>
    </body>
</html>