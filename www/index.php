<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <?php
  $servername = "db";
  $username = "root";
  $password = "1Password";
  $dbname = "persones";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    echo "ERROR CONNECTION";
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT id, nom, any FROM noms";
  $result = $conn->query($sql);
  if (!$result) {
    echo $conn->error;
  } else {
    if ($result->num_rows > 0) {
      ?>
      <div class="fondo">
        <ol>
          <?php
          //funcion para calcular la edad actual
          function edat($anyNaix)
          {
            $anyActual = date("Y");
            return $anyActual - $anyNaix;
          }
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $anyNaix = $row["any"];
            ?>
              <li>
                <?php
                echo "id: " . $row["id"] . " - Nom: " . $row["nom"] . " - Edat: " . edat($anyNaix) . "<br>";
                ?>
              </li>
              <?php
          }
          ?>
      </ol>
      <a href="afegir_persones.php" id="afegir">Afegir</a>
    </div>
      <?php
    } else {
      echo "0 results";
    }
  }
  $conn->close();

  ?>
</body>
</html>
