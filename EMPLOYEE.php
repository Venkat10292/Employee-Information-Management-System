<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Employee Data</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="EMPLOYEE.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="details.php">Employee Deatils</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="formsValue" style="margin-left:25%; margin-right: 25%;">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

    <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="employeeId" class="form-label">Enter Your Employee Id</label>
    <input type="text" name="employeeId" class="form-control" id="employeeId">
  </div>
  <div class="mb-3">
    <label for="firstName" class="form-label">Enter Your First Name</label>
    <input type="text" name="firstName" class="form-control" id="firstName">
  </div>
  <div class="mb-3">
    <label for="lastName" class="form-label">Enter Your Last Name</label>
    <input type="text" name="lastName" class="form-control" id="lastName">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Enter Your Phone Number</label>
    <input type="text" name="phone" class="form-control" id="phone">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php

$servername="localhost";
$username= "root";
$password= "";
$dbname= "employee";
$conn = mysqli_connect($servername, $username, $password,$dbname);

    $first_name=$last_name=$employee_Id=$email=$phone_no=1;
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $email=$_POST['email'];
        $first_name=$_POST['firstName'];
        $last_name=$_POST['lastName'];
        $employee_Id=$_POST['employeeId'];
        $phone_no=$_POST['phone'];
        if(!empty($email))
        {
            $sql="SELECT * FROM `employee`";
            $result=mysqli_query($conn,$sql);
            global $v;
            $v=mysqli_num_rows($result);
            $c=0;
            for($i=0;$i<$v;$i++)
            {
                $o=mysqli_fetch_assoc($result);
                if($o['email']==$email || $o['employee id']==$employee_Id ||strlen($phone_no)<10)
                {
                    $c=1;
                    break;
                }
                else
                {
                    $c=0;
                    continue;
                }
            }
        if(!$c)
        {
            $sql="INSERT INTO `employee` (`email`, `employee id`, `first name`, `last name`, `phone`) VALUES ('$email',' $employee_Id', '$first_name', '$last_name', '$phone_no')";
            $result = mysqli_query($conn,$sql);
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Sucess!</strong> Your Data added sucessfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } 
        else
        {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Data Already Exists.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
    }
?>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>