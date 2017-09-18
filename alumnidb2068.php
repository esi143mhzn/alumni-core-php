
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dblogin";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT aid, name, address,batch, internship, company, gmail, fb FROM tbl_alumni2068");
    $stmt->execute();

    // set the resulting array to associative
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $users = $stmt->fetchAll();
// foreach ($users as $user) {
//     echo '<br>'. $user['AID'];
//     echo $user['Name'].'<br>';
// }
// catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }

?>