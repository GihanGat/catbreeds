<?php
$breed_name = htmlentities($_POST["breed_name"]);
$friendliness = htmlentities($_POST["friendliness"]);
$playfulness = htmlentities($_POST["playfulness"]);
$intelligence = htmlentities($_POST["intelligence"]);
$activity = htmlentities($_POST["activity"]);

// Create the PDO object for CloudSQL MySQL.
//$dsn = "mysql:dbname=cats;unix_socket=/cloudsql/catbreeds:northamerica-northeast1:catbreeds";
//$user = "root";
//$password = "oshi1984";
//$pdo = new PDO($dsn, $user, $password);

// $hostname = "maria-db-cmp1005-prof.mariadb.database.azure.com";
// $dbname = "mid-term";
// $username = "baritchie@maria-db-cmp1005-prof";
// $password = "SuperPassword123";


$hostname = "yashdb.mariadb.database.azure.com";
$dbname = "yashdb";
$username = "A00205520@yashdb";
$password = "y@JARI0508";

$pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);// 1, Good Job


// Create the database if it doesn't exist
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->query('CREATE TABLE IF NOT EXISTS catbreeds ' .
    '( `id` INT(5) NOT NULL ,  `breed_name` VARCHAR(100) NOT NULL ,  `friendliness` INT(5) NOT NULL , 
     `playfulness` INT(5) NOT NULL ,  `activity` INT(5) NOT NULL ,  `intelligence` INT(5) NOT NULL ,
         PRIMARY KEY  (`id`)) ENGINE = InnoDB');        
// Add the PDO object to our Silex application.
$app['pdo'] = $pdo;

// Insert a visit into the database.
/** @var PDO $pdo */
$pdo = $app['pdo'];
if $breed_name != ''{
    //$insert = $pdo->prepare('INSERT INTO catbreeds (id,breed_name,friendliness,playfulness,activity,intelligence) values (?,?,?,?,?,?)');
    $insert = $pdo->prepare('INSERT INTO catbreeds (breed_name,friendliness,playfulness,activity,intelligence) values (?,?,?,?,?)');
    $insert->execute(array($breed_name, $friendliness, $playfulness, $activity, $intelligence,));
    // $insert->execute(array("2","test breed2",4,2,3,5));
    // $insert->execute(array("3","test breed3",3,2,4,5));
    // $insert->execute(array("4","test breed4",5,3,2,4));
}
$select = $pdo->prepare('SELECT * FROM catbreeds');
$select->execute();
$catBreeds = [];
while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
    //array_push($catBreeds, sprintf('Breed Name: %s   Friendliness: %s', $row['breed_name'],$row['friendliness']));
    //array_push($catBreeds, $row['breed_name'] , $row['friendliness']);
    //array_push($catBreeds,$catBreeds[$row['breed_name']] => $row['friendliness']);
    $catBreeds[] = array('breed_name'=> $row['breed_name'], 'friendliness'=> $row['friendliness']); 
}
//return new Response(implode("\n", $catBreeds), 200,['Content-Type' => 'text/plain']);

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET"){
    $json = json_encode($catBreeds);
    header("content-type: application/json");
    //echo($json);
}else{}
return new Response($json, 200,['Content-Type' => 'application/json']);
?>

