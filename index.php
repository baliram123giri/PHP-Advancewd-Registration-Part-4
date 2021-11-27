<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.1/sweetalert2.min.css" integrity="sha512-OkYLbkJ4DB7ewvcpNLF9DSFmhdmxFXQ1Cs+XyjMsMMC94LynFJaA9cPXOokugkmZo6O6lwZg+V5dwQMH4S5/3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.1/sweetalert2.min.js" integrity="sha512-qsog2Un5vHgtBLsgIIcZcfcRNxUXAswH2TxciIVDcB/reXRm1hFyH5Eb1ubQDUK149uK2HzuC0HFcqtSY5F1gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <?php 
    
    // echo "helo"; 
    if(isset($_GET['registration'])){
      
        // Db Connection
          $conn = @mysqli_connect("localhost", "root", '', "ecom2_db") or die("connection not successfull");
          //2. Build The Query
          //Always Filter the data
          $fname = mysqli_real_escape_string($conn,$_GET['fname']);
          $email = mysqli_real_escape_string($conn,$_GET['email']);
          $pass = mysqli_real_escape_string($conn,$_GET['pass']);
          $cpass = mysqli_real_escape_string($conn,$_GET['cpass']);
          $agree = mysqli_real_escape_string($conn,$_GET['agree']);

          //Salt is random String
          $salt = mt_rand(10,10000);
        //   echo $salt;
        //   echo "<br>";
        //   echo  $hashed_pass = hash('sha512', $pass);
        //   echo "<br>";
        //  echo  $hashed_pass = hash('sha512', $pass.$salt);
          $query = "INSERT INTO users_tbl(`fname`,`email`,`password`, `salt`) VALUES('$fname','$email','$pass','$salt')";
          //3. Excute the query
             mysqli_query($conn, $query) or die("could not excute the query".mysqli_error($conn));
          //4. Display the Query
        //    echo "<script>swal('Good job!', 'You clicked the button!', 'success');</script>";
           echo "<script>Swal.fire(
            'Good job!',
            'Registerd Successfully..',
            'success'
          )</script>";
        // 5. DB connection Close
         mysqli_close($conn);
    } 
    // else{
    //     echo"No";
    // }
    
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?> " method="GET" class="w-25 m-auto mt-5">
  <div class="mb-3">
    <label for="fname" class="form-label">First Name</label>
    <input required name="fname" type="text" class="form-control" id="fname" aria-describedby="emailHelp">
 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input required name="pass" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
    <input required name="cpass" type="password" class="form-control" id="exampleInputPassword2">
  </div>
  <div class="mb-3 form-check">
    <input name="agree" value="yes" required type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="registration" class="btn btn-primary">Submit</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>