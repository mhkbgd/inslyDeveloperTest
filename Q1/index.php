<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$generationErr = $namesErr = "";
$generation = $names ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["generation"])) {
    $generationErr = "Generation is required";
  } else {
    $generation = test_input($_POST["generation"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$generation)) {
      $generationErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["names"])) {
    $namesErr = "Names are required";
  } else {
    $names = $_POST["names"];
    $array = explode(',', $names);
    sort($array);
    $names= implode(",",$array);
  }
  

    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Generation: <input type="text" placeholder="Generation " name="generation" >
  <span class="error">* <?php echo $generationErr;?></span>
  <br><br>
  Names: <input type="text" placeholder="names seperated by coma" name="names" >
  <span class="error">* <?php echo $namesErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Add new Generation">  
</form>

<?php


 class ListGrouping { 
   
   private $generations = array(); 
   
   public function __construct() {
     $this->generations["First Generation"]  = array("Bames,Aary");
     
   }
   
   function addGeneration($nameOfGeneration) { 
     $this->generations[$nameOfGeneration] = array();
   }
  
  function getGeneration(){
    return $this->generations;  
  }
  
  function addMember($generationLevel, $names){
    array_push($this->generations[$generationLevel],$names);
  }

  
} 



$listGrouping = new ListGrouping;
$listGrouping->addGeneration($generation);

$listGrouping->addMember($generation,$names);
$myJSON = json_encode($listGrouping->getGeneration());

echo $myJSON;

?>

</body>
</html>