<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="afegir_persones.php" method="POST">
        <input required type="text" name="nom" placeholder="nom" maxlength="10">
        <input required type="number" name="any" placeholder="any naixement">
        <input type="submit" value="enviar">
    </form>
    <?php
        $servername = "db";
        $username = "root";
        $password = "1Password";
        $dbname = "persones";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            //echo "ERROR CONNECTION";
            die("Connection failed: " . $conn->connect_error);
        }
        if(isset($_POST['enviar'])){
            $nom = $_POST["nom"];
            $any = $_POST["any"];

        //$sql = "SELECT nom FROM noms WHERE nom = '$nom'";
        /*if(mysqli_query($conn, $sql)){
            echo "<script type='text/javascript'>
            alert('Aquest usuari ja existeix');
            window.location.href='afegir_persones.html';
            </script>";
        }else{*/
            $sql = "INSERT INTO noms (nom, any) VALUES ('$nom',$any)";

            if(mysqli_query($conn, $sql)){
                header('Location: http://localhost:9090/index.php');
            } else {
                echo "Error: ". $sql . "<br>" . mysqli_error($conn);
            }
        //}
        }
        mysqli_close($conn);
?>
</body>
</html>