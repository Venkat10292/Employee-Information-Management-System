<?php

$servername="localhost";
$username= "root";
$password= "";
$dbname= "employee";
$conn = mysqli_connect($servername, $username, $password,$dbname);


$sql1="SELECT * FROM employee";
$result=mysqli_query($conn,$sql1);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>


    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Edit Modal
</button>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

<div class="mb-3">
<label for="emailedit" class="form-label">Email address</label>
<input type="email" class="form-control" name="emailedit" id="emailedit" aria-describedby="emailHelp">
</div>
<div class="mb-3">
<label for="employeeIdedit" class="form-label">Enter Your Employee Id</label>
<input type="text" name="employeeIdedit" class="form-control" id="employeeIdedit">
</div>
<div class="mb-3">
<label for="firstNameedit" class="form-label">Enter Your First Name</label>
<input type="text" name="firstNameedit" class="form-control" id="firstNameedit">
</div>
<div class="mb-3">
<label for="lastNameedit" class="form-label">Enter Your Last Name</label>
<input type="text" name="lastNameedit" class="form-control" id="lastNameedit">
</div>
<div class="mb-3">
<label for="phoneedit" class="form-label">Enter Your Phone Number</label>
<input type="text" name="phoneedit" class="form-control" id="phoneedit">
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>
      </div>
    </div>
  </div>
</div>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="EMPLOYEE.php">Employee Data</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="EMPLOYEE.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="details,php">Employee Details</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
  <table class="table table-striped-columns">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Empid</th>
      <th scope="col">Email</th>
      <th scope="col">phone</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $sno=0;
    while($row=mysqli_fetch_array($result))
    {
        $sno++;        
    echo
    '<tr>
      <th scope="S.No">'.$sno.'</th>
      <td>'.$row['first name'].'</td>
      <td>'.$row['last name'].'</td>
      <td>'.$row['employee id'].'</td>
      <td>'.$row['email'].'</td>
      <td>'.$row['phone'].'</td>
      <td><button type="button" class="edit btn btn-sm btn-primary">Edit</button></a>   <button type="button" class="delete btn btn-secondary btn-sm">Delete</button></td>
    </tr>';//gave edit as a class name for every button
    }
    ?>

  </tbody>
</table>

<?php echo "Showing ".$sno." Entries"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        let edits=document.getElementsByClassName('edit');//selected every edit button and keeps it into the element edits in the form of an array
        Array.from(edits).forEach((element) => {//this for each will iterate the html collection of edits
         element.addEventListener("click",(e)=>{//this line adds the event listner when clicked on edit button
            sel=e.target.parentNode.parentNode;
            first=sel.getElementsByTagName("td")[0].innerText;
            last=sel.getElementsByTagName("td")[1].innerText;
            empid=sel.getElementsByTagName("td")[2].innerText;
            email=sel.getElementsByTagName("td")[3].innerText;
            phone=sel.getElementsByTagName("td")[4].innerText;
            console.log(first,last,empid,email,phone);
            employeeIdedit.value = empid;
            emailedit.value=email;
            firstNameedit.value=first;
            phoneedit.value=phone;
            lastNameedit.value=last;
         });   
        });
        </script>
        
        <?php
        $servername="localhost";
        $username= "root";
        $password= "";
        $dbname= "employee";

        $conn = mysqli_connect($servername, $username, $password,$dbname);

            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                global $a;
                $a=$_POST['employeeIdedit'];
                $b=$_POST['phoneedit'];
                $c=$_POST['firstNameedit'];
                $d=$_POST['lastNameedit'];
                $e=$_POST['emailedit'];   
                if (isset($b) && isset($c) && isset($d) && isset($e))
                {
                    // Retrieve the value of the JavaScript variable
                    $sqledit="UPDATE `employee` SET `email` = '$e', `first name` = '$c', `last name` = '$d', `phone` = '$b' WHERE `employee`.`employee id` = '$a'";
                    $resultedit=mysqli_query($conn,$sqledit);
                }

                
            }
        ?>

        <script>
        let deletes=document.getElementsByClassName('delete');//selected every edit button and keeps it into the element edits in the form of an array
        Array.from(deletes).forEach((element) => {//this for each will iterate the html collection of edits
         element.addEventListener("click",(e)=>
         {//this line adds the event listner when clicked on edit button
            sol=e.target.parentNode.parentNode;
            firstdel=sol.getElementsByTagName("td")[0].innerText;
            lastdel=sol.getElementsByTagName("td")[1].innerText;
            var empiddel=sol.getElementsByTagName("td")[2].innerText;
            emaildel=sol.getElementsByTagName("td")[3].innerText;
            phonedel=sol.getElementsByTagName("td")[4].innerText;
            document.cookie = "empiddel=" + empiddel;//setting the cookie here and passing the value from javascript to php
            console.log("delete");

            <?php
            if (isset($_COOKIE['empiddel']))
            {
                echo "hello";
                $a=$_COOKIE['empiddel'];
                $sqldel= "DELETE FROM `employee` WHERE `employee`.`employee id` ='$a'";
                $resultdel=mysqli_query($conn,$sqldel);
            }
            ?>

         });   
        });
        </script> 

</body>
</html>