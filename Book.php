<?php
        $message="";
       if($_SERVER['REQUEST_METHOD']=="POST"){



           if(!empty($_POST['name'])&&!empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['datetime'])
               && !empty($_POST['service']) && !empty($_POST['driver']) && !empty($_POST['hours'])){
               $name=$_POST['name'];
               $email=$_POST['email'];
               $contact=$_POST['contact'];
               $service=$_POST['service'];
               $driver=$_POST['driver'];
               $datetime=$_POST['datetime'];
               $hrs=$_POST['hours'];
               try{
                   $conn=new PDO('mysql:host=localhost','root','');
                   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                   $sql = "Create DATABASE Booking";

                   $conn->exec($sql);
                   $sql = "USE Booking";
                   $conn->exec($sql);
                   $sql = "CREATE TABLE Details(
                        username VARCHAR(30) NOT NULL,
                        emailid VARCHAR(30) NOT NULL,
                        contact VARCHAR(20) NOT NULL,
                        service VARCHAR(20) NOT NULL,
                        driver VARCHAR(20) NOT NULL,
                        datetime VARCHAR(20) NOT NULL,
                        hrs VARCHAR(20) NOT NULL
                        
                   )";
                   $conn->exec($sql);


               }
               catch(PDOException $exception){
//                    echo $exception->getMessage();
                  try{
                      $conn=new PDO('mysql:host=localhost;dbname=Booking','root','');
                      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//                      echo 'Connected to db\n';
                  }
                  catch(PDOException $e){
                      echo $e->getMessage();

                  }
               }
               try{
                   $sql = "INSERT INTO Details VALUES("."'".$name."',"."'".$email."',"."'".$contact."',"."'".$service."',"."'".$driver."',"."'".$datetime."',"."'".$hrs."'".")";
                   $conn->exec($sql);
               }
               catch(PDOException $ex){
                   echo $ex->getMessage()."error in inserting";
               }

           }
           else{
                $message= "All fields must be filled correctly";

           }

       };
  ?>
<html>
<head>
    <link rel="stylesheet" href="css/booking.css">
    <style>
        font-family:sans-serif;
    </style>
</head>
<body>
    <div class="message">
        <?php echo " ".$message."<br><a href='Book.html'>Book Again</a><br><a href='index.html'>Go Home</a>";?>
    </div>
</body>
</html>

