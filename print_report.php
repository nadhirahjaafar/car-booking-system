<?php

include_once('database.php');
include_once('pdf.php'); 
if(isset($_GET["bookid"]) && isset($_GET["id"]) && isset($_GET["pdf"]))  
{  
	$bookid = $_GET["bookid"];
	$id = $_GET["id"];
	$sql2 = "SELECT * FROM booking WHERE bookid=$bookid AND id=$id";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0){
		while($row = $result2->fetch_assoc()){
			$bookid = $row ['bookid'];
			$name = $row ['name'];
			$telno = $row ['phone no'];
			$icno = $row ['ic no'];
			$cars = $row['cars'];
			$price = $row['car price'];
			$pickuploc = $row ['pickup location'];
			$dropoffloc = $row ['dropoff location'];
			$pickupdate = $row ['pickup date'];
			$dropoffdate = $row['dropoff date'];
			$pickuptime = $row['pickup time'];
			$paymentstatus = $row['payment_status'];
		}
	} else {
		echo "0 results";
	}

	$output = '';
	$output .= '<h2><center>SPEEDYLUX CAR BOOKING</center></h2>
				<h3><center>CLIENT REPORT</h3>
				<table width="100%" border="1" cellpadding="5" cellspacing="0">
				<tr>
					<td colspan="2">
					<table width="100%" cellpadding="5">
				<tr>
					<td width="65%">
					<b>CLIENT NAME </b><br />
					Name : '.$name.'<br /> 
					Booking ID: '.$bookid.'<br /> 
					Phone Number : '.$telno.'<br />
					</td>
					<td width="35%">         
					Report No. : '.$bookid.'<br />
					Report Date : '.date("d/m/Y").'<br />
					Status : '.$paymentstatus.'<br />
					</td>
				</tr>
					</table>
					<br />
					<table width="100%" border="1" cellpadding="5" cellspacing="0">
				<tr>
					<th align="left">Car Type</th>
					<th align="left">Total Price (RM)</th>
					<th align="left">Pickup Location</th>
					<th align="left">Dropoff Location</th>
					<th align="left">Pickup Date</th>
					<th align="left">Dropoff Date</th> 
				</tr>
				<tr>
					<td align="left">'.$cars.'</td>
					<td align="left">'.$price.'</td>
					<td align="left">'.$pickuploc.'</td>
					<td align="left">'.$dropoffloc.'</td>
					<td align="left">'.$pickupdate.'</td>  
					<td align="left">'.$dropoffdate.'</td>   
				</tr>';
		$output .= '
					</table>
					</td>
				</tr>
				</table>';
}

$dompdf = new Test();
$invoiceFileName = 'Report-'.$id.'.pdf';
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));

?>