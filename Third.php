<?php
$error='';
session_start();
    $semail = $_SESSION['email'];
if (isset($_POST['one'])) {
    header("location:first.php");
} else if (isset($_POST['two'])) {
    header("location:second.php");
} else if (isset($_POST['three'])) {
    header("location:third.php");
} else if (isset($_POST['pre'])) {
    header("location:second.php");
}

if(isset($_POST['check']))
{
    $temp=$_FILES['Images']['tmp_name'];  //temp name
  $fname=$_FILES['Images']['name'];    //real file name
  $ext=pathinfo($fname,PATHINFO_EXTENSION); //check Extention of file
  $fn="Uploadfeedback".rand()."_".time().".$ext";//create randome name of file
  $k = trim("users/$semail");
  $dest=$k."/";
  if(!empty(isset($_POST['res'])) && !empty($temp))
  {
    if(($ext!='pdf') && !($ext!='txt') && (move_uploaded_file($temp,$dest.$fn))) 
    {
        header("location:Show.php");
    }
    else
    {
        $error="File Uploading Error Try again";
    }
  }
  else
  {
      $error="All Field Required";
  
  }


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        .mrgincenter {
            margin: 200px 0px 0px 0px;
            padding: 50px 10px 50px 10px;
            width: 800px;
        }
    </style>
</head>

<body>
<?php include('nav.php') ?>
    <form class=" container font-width-bold" style="width:700px;" method="POST" enctype="multipart/form-data">
        <div class="border mrgincenter">
            <!-- <h1 class="display-4 text-center">Feed Back</h1> -->

            <?php
            if (!empty($error)) {
            ?>
                <div class="alert-danger alert col-12 m-auto p-auto" role="alert"> <?php echo $error ?> </div>
            <?php  }
            ?>

            <div class="form-group row container">
                <label class="col h4">Submit Proof</label>
                <div class="col-4">
                    <input type="file" name="Images">
                </div>
            </div>

            <div class="container row">

                <!-- Finished -->

                <div class="form-group container col">
                    <input type="checkbox" name="res" class="">
                    <label class=""> Agree Terms and Condition </label>
                </div>
                <div class="text-center col">
                    <input type="submit" class="btn btn-success mb-5" value="Review and Submit" name="check" style="background-color: #fffe9c ; color:red;">
                </div>
            </div>

            <hr style="width: 20rem; height:.1rem" class="bg-danger">


        </form>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">

                    <li class="page-item ">
                        <!-- <a class="page-link disable" href="#" tabindex="-1">Previous</a> -->
                        <input type="submit" class="page-link disable" name='pre' value="Previous">
                    </li>

                    <li class="page-item">
                        <!-- <a class="page-link" href="index.php" hello1">1</a> -->
                        <input type="submit" class="page-link " name='one' value="1">
                    </li>

                    <li class="page-item">
                        <!-- <a class="page-link" href="second.php" hello2">2</a> -->
                        <input type="submit" class="page-link " name='two' value="2">
                    </li>

                    <li class="page-item active">
                        <!-- <a class="page-link" href="Third.php" hello3">3</a> -->
                        <input type="submit" class="page-link " name='three' value="3">
                    </li>

                    <li class="page-item disabled">
                        <!-- <a class="page-link" href="second.php">Next</a> -->
                        <input type="submit" class="page-link " name='next' value="next">
                    </li>
                </ul>
            </nav>

</body>

</html>