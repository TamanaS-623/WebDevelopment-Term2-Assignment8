<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>a8-Tamana-Seddiqi</title>
    <link rel="stylesheet" type="text/css" href="css.css"
  </head>

  <body>
    <div class="title">
      <h1> Library Managment System</h1>
    </div>

    <div class="routeButton">
      <button> <a href="index.php"> Home </a></button>
      <button> <a href="insert.php"> Insert Book </a></button>
    </div>

    <div class="form">
      <form action="viewphp.php" method="post">
        <input id = "searchBar" type="text" name="search" placeholder="Search..." />
        <input id="searchButton" type="submit" name"go" value="Search"/>
        <br /><br />
      </form>
    </div>

    <div class="table">
      <div class = subtitle>
        <h3>Library Database</h2>
      </div>

      <table>
        <tr >
            <th>BookID</th>
            <th>BookName</th>
            <th>Author</th>
            <th>ProductionYear</th>
        </tr>

    <?php
      $host = 'localhost';
      $user = 'seddiqi_Admin';
      $password = ']DU7@Jb-,*dt';
      $dbname = 'seddiqi_Tamana';

      $conn = mysqli_connect($host, $user, $password, $dbname);
      if(empty($conn))
        die("Connection Failed! ".mysqli_connect_error());

      $search = $_POST['search'];
      if(isset($_POST['search']) && !empty($_POST['search'])){
        $query = "select * from tblLibrary where BookName like '%$search%';";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)){
            $row['BookID'] += 9;
              echo "<tr>";
              echo "<td  id = 'one'>" .$row['BookID']. "</td>";
              echo "<td>" . $row['BookName'] . "</td>";
              echo "<td>" . $row['Author'] . "</td>";
              echo "<td  id = 'one'>" . $row['ProductionYear'] . "</td>";
              echo "</tr>";
            }
          }
        }

        else if($search == ""){
          $query = "select * from tblLibrary;";
          $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              $i = 10;
              while ($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td  id = 'one'>" .$i. "</td>";
                echo "<td>" . $row['BookName'] . "</td>";
                echo "<td>" . $row['Author'] . "</td>";
                echo "<td  id = 'one'>" . $row['ProductionYear'] . "</td>";
                echo "</tr>";
                $i++;
              }
            }
          }

          if(!empty($_POST['search']) && mysqli_num_rows($result) == 0) {
            echo "<p id = 'message' style='color : red'> <strong> '". $search."'</strong> does not exist in the database!</p>";
          }
        ?>
      </table>
    </div>
  </body>
</html>
