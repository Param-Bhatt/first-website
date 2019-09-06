<!DOCTYPE html>
<html>
<head>
    <title>Admission letter</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <?php
        $con=mysqli_connect("localhost","root","param2000","swd");
        
        //now successfully connected. try catch block was to check for errors
        //Getting values from the login page
        $id=$_POST['user'];
        $password=$_POST['password'];
        
        //to prevent mysql injection
        $id=stripcslashes($id);
        $password=stripcslashes($password);
            
        $password = hash('sha256', (get_magic_quotes_gpc() ? stripslashes($password) : $password));
    
        $id=mysqli_real_escape_string($con,$id);
        $password=mysqli_real_escape_string($con,$password);
    
        $result=mysqli_query($con,"select * from students where id='$id' and password='$password'")
            or die("Failed to take answers from database".mysqli_error($con));
        $row=mysqli_fetch_array($result);
        print_r($row);
    
        //passwords are sha256 hashed. the real passwords are:
        //1:pab123
        //2:kukreja
        //3:mahajan
        //4:bansal
        //5:buch99
        //6:utk_65
        //random bhavan : 1=buddh, 2=ram
        if($row['id']==$id && $row['password']==$password){
            ob_start();
            include('fpdf library 1.81/fpdf.php');
            $pdf=new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B','15');
            $text="Hello , ".$row['name'];
            $pdf->Cell(40,10,$text);
            $pdf->Ln();
            $text="Your branch is : ".$row['branch'];
            $pdf->Cell(40,10,$text);
            $pdf->Ln();
            $text="Your BITS-id is : ".$row['bits-id'];
            $pdf->Cell(40,10,$text);
            $text="Your room is : ".$row['roomn'];
            $pdf->Cell(40,10,$text);
            
            $pdf->output();
            ob_end_flush();
        }
        else{
            header("Location: login.php"); /* Redirect browser */
            exit();
        }
    ?>

    
</html>