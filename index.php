<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
      <title>Leaderboard</title>
   </head>
   <body style="height:100% ;background-image: url('img/back.jpg'); background-size: cover; background-repeat: no-repeat;">
      <style type="text/css">
         @font-face {
         font-family: 'GTA';
         src: url('font.otf') format('opentype');
         }
         @font-face {
         font-family: 'camel';
         src: url('camel.ttf') format('opentype');
         }
         .custom-font {
         font-family: 'GTA', sans-serif;
         text-transform: uppercase;
         }
         .camel {
         font-family: 'camel', sans-serif;
         text-transform: uppercase;
         }
         .custom {
         background-color: rgba(255, 255, 255, 0.2); /* Replace with your desired color */
         width: 100%;
         margin-bottom: 1rem;
         vertical-align: top;
         }
         thead {
         background-color: #e0e0e0; /* Replace with your desired color */
         }
         td, th { padding-left:10px; }
         td { color:white; 
         font-family: Serif;
         }
      </style>
      <br><br>
      <div class="container">
         <h3 class="custom-font text-center" style="color: white;"> World Of Tech - Scoreboard </h3>
         <br>
         <div class="row">
            <div class="col-sm">
               <img style="width:100%;" class="" src="img/team1.jpg"> 
               <h3 class="custom-font text-center" style="margin-top: 3px; color: red;">Testeur</h3>
            </div>
            <div class="col-sm">
               <img style="width:100%;" src="img/team2.jpg"> 
               <h3 class="custom-font text-center" style="margin-top: 3px; color: yellow;">SysAdmin</h3>
            </div>
            <div class="col-sm">
               <img style="width:100%;" src="img/team3.jpg"> 
               <h3 class="custom-font text-center" style="margin-top: 3px; color: green;">Hacker</h3>
            </div>
            <div class="col-sm">
               <img style="width:100%;" src="img/team4.jpg"> 
               <h3 class="custom-font text-center" style="margin-top: 3px; color: blue;">Théoricien</h3>
            </div>
         </div>
      </div>
      <div class="container">
      <div class="row">
         <div class="col">
            <br><br>
            <h3 class="custom-font text-center" style="color:white;"> LeaderBoard </h3>
            <br>
            <table class="custom">
               <thead>
                  <tr>
                     <th scope="col">Name</th>
                     <th scope="col">Point</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <?php
                        // Include the database connection file
                        include 'inc/db.php';
                        
                        // Query to select all users and order by point in ascending order
                        $sql = "SELECT * FROM users ORDER BY point DESC";
                        
                        // Execute the query
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            // Output data in a table format
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='camel'; style='color: #bd5b87;font-size:28px;'>" . $row["Name"] . "</td>";
                                echo "<td class='camel'; style='color: #bd5b87;font-size:28px;'>" . $row["Point"] . "</td>";
                            }
                        } else {
                            echo "Rien à afficher pour le moment.";
                        }
                        
                        // Close the database connection
                        $conn->close();
                        ?>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="col-lg-6">
            <br><br> 
            <h3 class="custom-font text-center" style="color: white;"> Live View of Points </h3>
            <br>
            <table class="custom">
               <thead>
                  <tr>
                     <th scope="col"></th>
                     <th scope="col">Name</th>
                     <th scope="col">Point</th>
                     <th scope="col">Motif</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <?php
                        // Include the database connection file
                        include 'inc/db.php';
                        
                        // Query to select all users
                        $sql = "SELECT * FROM display_point ORDER by ID desc";
                        
                        // Execute the query
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row["team"] == "Yellow") { $teamname = "<center><img class='img-fluid' src='img/team2.jpg' style='width:34px;'></center>"; }
                                if ($row["team"] == "Red") { $teamname = "<center><img class='img-fluid' src='img/team1.jpg' style='width:34px;'></center>"; }
                                if ($row["team"] == "Green") { $teamname = "<center><img class='img-fluid' src='img/team3.jpg' style='width:34px;'></center>"; }
                                if ($row["team"] == "Blue") { $teamname = "<center><img class='img-fluid' src='img/team4.jpg' style='width:34px;'></center>"; }
                                echo "<tr>";
                                echo "<td>" . $teamname . "</td>";
                                echo "<td class='camel' style='font-size:28px; text-transform: uppercase; color: " .  $row["team"] . ";'>" . $row["name"] . "</td>";
                                echo "<td class='camel' style='font-size:28px; text-transform: uppercase; color: " .  $row["team"] . ";'>" . $row["point"] . "</td>";
                                echo "<td class='camel' style='font-size:28px; text-transform: uppercase; color: " .  $row["team"] . ";'>" . $row["motif"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Rien à afficher pour le moment</td></tr>";
                        }
                        
                        // Close the database connection
                        $conn->close();
                        ?>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="col-lg-3 col-sm-12">
            <br><br>
            <h3 class="custom-font text-center" style="color:white;"> Team LeaderBoard </h3>
            <br>
            <table class="custom">
               <thead>
                  <tr>
                     <th scope="col"></th>
                     <th scope="col">Point</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <?php
                        // Include the database connection file
                        include 'inc/db.php';
                        
                        // Query to select all users and order by point in ascending order
                        $sql = "SELECT * FROM team_point ORDER BY Point DESC";
                        
                        // Execute the query
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            // Output data in a table format
                            while ($row = $result->fetch_assoc()) {
                        
                                if ($row["Team_Color"] == "Yellow") { $teamname = "<center><img class='img-fluid' src='img/team2.jpg' style='width:34px;'></center>"; }
                                if ($row["Team_Color"] == "Red") { $teamname = "<center><img class='img-fluid' src='img/team1.jpg' style='width:34px;'></center>"; }
                                if ($row["Team_Color"] == "Green") { $teamname = "<center><img class='img-fluid' src='img/team3.jpg' style='width:34px;'></center>"; }
                                if ($row["Team_Color"] == "Blue") { $teamname = "<center><img class='img-fluid' src='img/team4.jpg' style='width:34px;'></center>"; }
                        
                        
                                echo "<tr>";
                                echo "<td class='camel' style='font-size:28px; color: " .  $row["Team_Color"] . ";'>" . $teamname . "</td>";
                                echo "<td class='camel' style='font-size:28px; color: " .  $row["Team_Color"] . ";'>" . $row["Point"] . "</td>";
                            }
                        } else {
                            echo "No users found.";
                        }
                        
                        // Close the database connection
                        $conn->close();
                        ?>
                  </tr>
               </tbody>
            </table>
         </div>
         <br><br><br><br>
         <br><br><br><br>
         <div class="text-center" style="width: 100%; bottom: 0; position: relative; background-color: rgba(255, 255, 255, 0.5);">
            Que le sort vous soit favorable !
         </div>
      </div>
      <BR>
   </body>
</html>