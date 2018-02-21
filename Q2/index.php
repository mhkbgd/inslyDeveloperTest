<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  



<h2>Calculator</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="Calculator.php">  
  Car Value: <input type="text" name="basePrice" id="basePrice" placeholder="Car price">
  
  <br><br>
  Tax Pacentage: <input type="text" name="tax" placeholder="Tax percentage">
 
  <br><br>
  Installments: <input type="text" name="installments" placeholder="Installments">
  
  <br><br>
  <input type="submit" name="submit" value="Calculate">  
</form>


</body>
</html>