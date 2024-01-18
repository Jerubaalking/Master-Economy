<?php
include "../config/session.php";
//$SQL = "SELECT  * from transaction";
$SQL = "SELECT *, SUM(dramount) as disbusment, SUM(cramount*70/100) as principalcr, SUM(dramount*30/100) as iamount, SUM(cramount*30/100) as interestcr FROM trans WHERE Branchcode = 'Loan' GROUP BY Fullname";

$header = '';
$result ='';
$exportData = mysqli_query ($conn,$SQL ) or die ("Sql error : " . mysqli_error( ) );

$fields = mysqli_num_fields ( $exportData );

for ( $i = 0; $i < $fields; $i++ )
{
   // $header .= mysqli_field_name( $exportData , $i ) . "\t";
}

while( $row = mysqli_fetch_row( $exportData ) )
{
    $line = '';
    foreach( $row as $value )
    {
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );

if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";

?>
