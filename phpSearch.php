<?php
    require('connection.php');
    require('vendors/fpdf.php');
    $search = $_POST['search'];
    $servername = "localhost:3308";
    $username = "formdb_user";
    $password = "abc123";
    $db = "form_entriesdb";
    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
    $sql = "select * from contactform_entries where firstname_fid like '%$search%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $pdf = new FPDF();
        $pdf -> AddPage();
        $width_cell=array(10,25,25,26,40,28,20,15);
        $pdf->SetFont('Arial','B',11);
        //Background color of header//
        $pdf->SetFillColor(193,229,252);
        // Header starts /// 
        //First header column //
        $pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
        //Second header column//
        $pdf->Cell($width_cell[1],10,'First Name',1,0,'C',true);
        //Third header column//
        $pdf->Cell($width_cell[2],10,'Last Name',1,0,'C',true); 
        //Fourth header column//
        $pdf->Cell($width_cell[3],10,'Phone No.',1,0,'C',true);
        //Fifth header column//
        $pdf->Cell($width_cell[4],10,'Street Address',1,0,'C',true);
        //Sixth header column//
        $pdf->Cell($width_cell[5],10,'City',1,0,'C',true); 
        //Seventh header column//
        $pdf->Cell($width_cell[6],10,'State',1,0,'C',true);
        //Eighth header column//
        $pdf->Cell($width_cell[7],10,'ZIP',1,1,'C',true); 
        //// header ends ///////
        $pdf->SetFont('Arial','',9);
        //Background color of header//
        $pdf->SetFillColor(235,236,236); 
        //to give alternate background fill color to rows// 
        $fill=false;
        /// each record is one row  ///
        foreach ($dbo->query($sql) as $row) {
            $pdf->Cell($width_cell[0],10,$row['id'],1,0,'C',$fill);
            $pdf->Cell($width_cell[1],10,$row['firstname_fid'],1,0,'C',$fill);
            $pdf->Cell($width_cell[2],10,$row['lastname_fid'],1,0,'C',$fill);
            $pdf->Cell($width_cell[3],10,$row['phone_fid'],1,0,'C',$fill);
            $pdf->Cell($width_cell[4],10,$row['addressl1_fid'],1,0,'C',$fill);
            $pdf->Cell($width_cell[5],10,$row['city_fid'],1,0,'C',$fill);
            $pdf->Cell($width_cell[6],10,$row['state_fid'],1,0,'C',$fill);
            $pdf->Cell($width_cell[7],10,$row['zip_fid'],1,1,'C',$fill);
            //to give alternate background fill  color to rows//
            $fill = !$fill;
        }
        /// end of records /// 
        $pdf->Output();
        // while($row = $result->fetch_assoc() ){
        //     echo $row["firstname_fid"]."  ".$row["lastname_fid"]."  ".$row["phone_fid"]."  ".$row["addressl1_fid"]."  ".$row["city_fid"]."  ".$row["state_fid"]."  ".$row["zip_fid"]."<br>";
        // }
    }
    else {
        echo "No records found";
    }
    $conn->close();
?>