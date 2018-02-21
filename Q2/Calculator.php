<?php 
	$basePrice = $_POST['basePrice'];
	$tax = $_POST['tax'];
	$installments = $_POST['installments'];
	

class calculator
{
	private $basePrice ='' ;
	private $taxAmount ='';
	private $installments='' ;

	function __construct($bp, $tax, $installment) {
		$this->basePrice = $bp;	
		$this->taxAmount = $tax;	
		$this->installments = $installment;	
	}

	function basePrimium($basePrice){
		$percentage = $this->basePrimiumParcentage();
		$basePrimium = ($percentage / 100) * $basePrice;

		return $basePrimium;
	}

	function basePrimiumParcentage (){
			if(date("w") == 5 && date('H')<20 && date('H')>15){
		       $parcentage = 13;
		    } else{
		    	$parcentage = 11;

		    }
		    return $parcentage;

	}

	function comission($basePrice){
		$percentage=  17;
		$comission = ($percentage / 100) * $this->basePrimium($basePrice);
		return $comission;
	}

	function tax($basePrice, $tax){		
		$tax = ($tax / 100) * $this->basePrimium($basePrice);
		return $tax;
	}
}

$calculator = new calculator($basePrice, $tax,$installments);

$value = $basePrice;
$calculatedPrimium= number_format((float)$calculator->basePrimium($basePrice), 2, '.', '');
$calculatedComission=number_format((float)$calculator->comission($basePrice), 2, '.', '');
$calculatedTax=number_format((float)$calculator->tax($basePrice, $tax), 2, '.', '');
$calculatedPremiumParcentage = $calculator->basePrimiumParcentage();

$TotalCost=number_format((float)($calculatedPrimium+$calculatedComission+$calculatedTax), 2, '.', '');



if($installments!=''){
	$installmentPrimium = number_format((float)($calculatedPrimium/$installments), 2, '.', '');
	$installmentComission = number_format((float)($calculatedComission/$installments), 2, '.', '');
	$installmentTax = number_format((float)($calculatedTax/$installments), 2, '.', '');
	$installmentTotal = number_format((float)($installmentPrimium+$installmentComission+$installmentTax), 2, '.', '');

}


?>

<table style="float: left">
	<tr>
		<th></th>
		<th>policy</th>
	</tr>
	<tr>
		<td>Value</td>
		<td><?php echo $value ; ?></td>
	</tr>
	<tr>
		<td>Base Primium (<?php echo $calculatedPremiumParcentage ?>%)</td>
		<td><?php echo $calculatedPrimium ?></td>
	</tr>
	<tr>
		<td>Comission (17%)</td>
		<td><?php echo $calculatedComission ; ?></td>
	</tr>
	<tr>
		<td>Tax (10%)</td>
		<td><?php echo $calculatedTax ; ?></td>
	</tr>
	<tr>
		<td>Total Cost</td>
		<td><?php echo $TotalCost ; ?></td>
	</tr>

</table>

<?php
$counter = 1;
while ( $installments>0 ) {
	
	?>
	<table style="float: left;">
	<tr>
		<th>Installment <?php echo $counter; ?></th>
		
	</tr>
	<tr>
		
		<td><br></td>
	</tr>
	<tr>
		
		<td><?php echo $installmentPrimium ?></td>
	</tr>
	<tr>
		
		<td><?php echo $installmentComission; ?></td>
	</tr>
	<tr>
		
		<td><?php echo $installmentTax ; ?></td>
	</tr>
	<tr>
		
		<td><?php echo $installmentTotal ; ?></td>
	</tr>
</table>

<?php
$installments--;
$counter++;
}

 ?>


