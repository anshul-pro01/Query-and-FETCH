<?php
    
    $serverName="localhost";
    $userName="root";
    $password="";
    $databaseName="ECELL";

    $connection = new mysqli($serverName,$userName,$password,$databaseName);

    if($connection->connect_error){
        die("Connection failed: ".$connection->connect_error);
    }

    $query = $_POST["query"];
    $s=substr($query,0,6);
    if((strcmp($s,"INSERT"))==0){
    if ($connection->query($query) === TRUE) {
        echo "New record created successfully";
        return;
    } else {
        echo "Error: " . $query . "<br>" . $connection->error;
        return;
    }
}
   
  if((strcmp($s,"UPDATE"))==0){ 
  if ($connection->query($query) === TRUE) {
    echo "Record updated successfully";
    return;
  } else {
    echo "Error updating record: " . $connection->error;
    return;
  }
  }
   if((strcmp($s,"SELECT"))==0){ 
    $result=$connection->query($query);
    if($result->num_rows>0){
        echo "ID########"." "."EMPLOYEE NAME######"." "."AGE#######"." "."SALARY########"." "."POST#######"."<br>"; 
       while($row=$result->fetch_assoc()){
           echo $row["Emp_Id"]."_________".$row["Emp_name"]."____________".$row["Age"]."___________".$row["Salary"]."_________".$row["Post"]."<br>";
        
    }
    return;
    }
    else{
        echo "No record found <br>";
        return;
    }
}
    mysqli_close($connection);
?>
    