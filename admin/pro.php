


          <?php
          $server = "localhost";
          $dbn =  "ecom_web";
          $pass = "root";
          $user = "root";

          // try{
            // $conn = new PDO ("mysql:host=$server;dbname=funaab_data", $user, $pass);
            // $conn->setAttribut(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn = new mysqli ($server, $user, $pass, $dbn);
            if($conn){
            echo "Connected Sucessfuly";
            }
            else{
              echo "Error" . $conn->error;
            }
          // }
          // catch (PDOException $e){
          //   echo "Connection Failed" . $e->getMesage();
          // }
          ?>

          <?php
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "funaab_data";
// $dsn = "mysql:host=localhost; dbname=funaab_data; user=root; password=root; charset=utf8mb4";

// try {
//   $conn = new PDO($dsn);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully yeah";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }

// $statement = $conn->prepare("select *  from courses");
// $statement->execute();
// $post = $statement->fetchAll(PDO::FETCH_ASSOC);
// foreach($post as $pos){
//   echo "<li>". $pos['course_code'] . "</li>";
// }

class database {

  public $connection;

  public function __construct(){

    $dsn = "mysql:host=localhost; dbname=funaab_data; user=root; password=root; charset=utf8mb4";
    $this->connection = new PDO($dsn);
  }

  public function query($query){

    $statement = $this->connection->prepare($query);
    $statement->execute();
    return $statement;

  }
}

$database = new database;

$posts = $database->query("select * from departments")->fetchAll(PDO::FETCH_ASSOC);
foreach($posts as $pos){
  echo "<li>". $pos['names_of_hod'] . "</li>";
  echo "<li>". $pos['name_of_dept'] . "</li>";
}

class Fruits {
  public $name;
  public $color;

  public function __construct ($type) {
   $this->name = $type;
  }

 

  public function __destruct (){
    echo "This is " . $this->name;
    echo "</br>";
  }
}

$mango = new Fruits("mango");
// $mango->setName("mango");
// echo $mango->getName();
echo  "</br>";
$orange = new Fruits("orange");
// echo $orange->getName("orange"); 

class greetings{
    const GREETING = "You are welcome";

    public function book(){
      echo "</br>";
      echo self::GREETING;
      echo "</br>";
    }
  }
$greeting = new greetings;
echo $greeting::GREETING;
 $greeting->book();

 abstract class parentClass{
 abstract protected function prefixName($name);
 }

 class childClass extends parentClass{
  public function prefixName($name, $greeting = "Dear", $sepa = "."){
    if($name == "Jane"){
      $prefix = "Mr ";
    }
    elseif($name == "Joy"){
      $prefix = "Mrs ";
    }
    else{
      $prefix = "";
    }

    return $greeting . $sepa . $prefix  . $name;
  }
 }

 $class = new childClass;
 echo "</br>";
 echo $class->prefixName("Joy");
 echo "</br>";

 interface Animal{
  public function makeSound();
 }

 class cat implements Animal{
  public function makeSound(){
    echo "Meow";
  }
 }

 class dog implements Animal{
  public function makeSound(){
    echo "Bark";
  }
 }

 class lion implements Animal{
  public function makeSound(){
    echo "Roar";
  }
 }

 $cat = new cat;
 $dog = new dog;
 $lion = new lion;

 $animals = [$cat, $dog, $lion];

 foreach($animals as $animal){
  $animal->makeSound();
  echo "</br>";
 }
?>