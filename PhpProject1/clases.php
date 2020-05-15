<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clases</title>
        <style>
            body {
              background-color: linen;
            }

            h1 {
              color: maroon;
              margin-left: 40px;
            }
            input[type=submit] {
                width: 50%;
                align: center;
                background-color: #f2c2ff;
                color: #0f77ff;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 20px;
            }

            input[type=submit]:hover {
                background-color: #edb3fc;
            }
        </style>
    </head>
    <body>
        <?php
            $con = mysqli_connect("localhost", "root", "", "catDS");
            if (!$con) {
                exit('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
            }
            
            //set the default client character set 
            mysqli_set_charset($con, 'utf-8');
            mysqli_select_db($con, "catDS");
            
        ?>
        <h1>LAS CLASES</h1>
        <?php
        $clases = mysqli_query($con, "SELECT DISTINCT class FROM heroes ORDER BY class");
            if(mysqli_num_rows($clases)<1){
                exit("No hay clases");
            }
            while($row = mysqli_fetch_array($clases)){
                echo "<h3>". htmlentities($row["class"]) ."</h3>";
            }
            
            mysqli_free_result($clases);
            mysqli_close($con);
        ?>
        <input type="submit" value="Inicio" onclick="location.href='index.php'" />
    </body>
</html>
