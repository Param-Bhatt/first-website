<!DOCTYPE html>
<html>
<head>
    <title>HOSTEL ALLOTMENT</title>
    <link rel="stylesheet" type="text/css" href="hostelstyle.css">

</head>
<?php
            $count=1;
            $con=mysqli_connect("localhost","root","param2000","swd");    
            for($i=1;$i<=1100;$i++){        //1100 is the batch strength of the new batch
                $randbhvn=rand(1,2);
                $randroom=rand(1,500);  //500 assuming everyone gets a double room
            }
            
            if($randbhvn==1){
                A:
                $result=mysqli_query($con,"select * from students where id='$i'")
                    or die("Failed to take answers from database".mysqli_error($con));
                $row=mysqli_fetch_array($result);
                $j;
                for($j=1;$j<=$count;$j++){
                    $result=mysqli_query($con,"select * from students where id='$i'")
                        or die("Failed to take answers from database".mysqli_error($con));
                    $row=mysqli_fetch_array($result);
                    if($randroom==$row['roomn']){
                        goto A;
                    }
                }
                $text="VK ".$randroom;
                echo $text;
                $sql = "UPDATE students SET bhavan='Vishwakarma'  WHERE id=$i";
                $sql = "UPDATE students SET roomn='$text'  WHERE id=$i";
                if (mysqli_query($con, $sql)) {
                    echo "New record created successfully";
                }
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
                $count++;
                echo $count;
            }
            else{
               // $randroom-=3;
                A:
                $result=mysqli_query($con,"select * from students where id='$i'")
                    or die("Failed to take answers from database".mysqli_error($con));
                $row=mysqli_fetch_array($result);
                $j;
                for($j=1;$j<=$count;$j++){
                    $result=mysqli_query($con,"select * from students where id='$i'")
                        or die("Failed to take answers from database".mysqli_error($con));
                    $row=mysqli_fetch_array($result);
                    if($randroom==$row['roomn']){
                        goto A;
                    }
                }
                $text="B ".$randroom;
                $sql = "UPDATE students SET bhavan='Gautam'  WHERE id=$i";
                $sql = "UPDATE students SET roomn='$text'  WHERE id=$i";
                if (mysqli_query($con, $sql)) {
                    echo "New record created successfully";
                }
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            }
        
    }
    
?>

</html>