<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Catálogo de héroes</title>
        <style>
            body {
              background-color: linen;
            }

            h1 {
              color: maroon;
              margin-left: 40px;
            }
            #heroesh {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #heroesh td, #heroesh th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #heroesh tr:nth-child(even){background-color: #f2f2f2;}

            #heroesh tr:hover {background-color: #ddd;}

            #heroesh th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #b3ffd0;
                color: black;
            }
            input[type=submit] {
                width: 100%;
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
        <h1> Bienvenido al Catálogo de héroes </h1>
        <h2> ¿Qué quieres mirar?</h2>
        <input type="submit" value="Elementos" onclick="location.href='elementos.php'" />
        <input type="submit" value="Clases" onclick="location.href='clases.php'" />
        <input type="submit" value="Familias" onclick="location.href='familias.php'"/>
        <input type="submit" value="Heroes con A" onclick="location.href='heroesA.php'"/>
        <br>
        <table id="heroesh">
            <tr>
                <th>Nombre</th>
                <th>Color</th>
                <th>Elemento</th>
                <th>Clase</th>
                <th>Stars</th>
                <th>Familia</th>
                <th>Defensa</th>
                <th>Ataque</th>
            </tr>
        
        <?php
            $heroes = mysqli_query($con, "SELECT name, colour, element, class, stars, family, defence, attack FROM heroes");
            if(mysqli_num_rows($heroes)<1){
                exit("No hay heroes");
            }
            while($row = mysqli_fetch_array($heroes)){
                echo "<tr><td>" . htmlentities($row["name"]) . "</td>";
                echo "<td>" . htmlentities($row["colour"]) . "</td>";
                echo "<td>" . htmlentities($row["element"]) . "</td>";
                echo "<td>" . htmlentities($row["class"]) . "</td>";
                echo "<td>" . htmlentities($row["stars"]) . "</td>";
                echo "<td>" . htmlentities($row["family"]) . "</td>";
                echo "<td>" . htmlentities($row["defence"]) . "</td>";
                echo "<td>" . htmlentities($row["attack"]) . "</td></tr>\n";
            }
            mysqli_free_result($heroes);
            mysqli_close($con);
        ?>
        </table>
    </body>
</html>
