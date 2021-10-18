<?php
$error='';
session_start();
$semail = $_SESSION['email'];
$na='';
    $k = trim("users/$semail");
    if(file_exists("$k/feedback.txt"))
    {
        $fo = fopen("$k/feedback.txt", "r");
        fgets($fo);
        $na=fgets($fo);
    }


    if(isset($_POST['one']))
    {   
        header("location:first.php");
    }

    else if(isset($_POST['two'])   ||  isset($_POST['next']) )
    {

        $former = @$_POST['former'];
        $name = $_POST['name'];
        $k = trim("users/$semail");
          if (!empty($former) && !empty($name))
                {  
                    $fo = fopen("$k/feedback.txt", "w");
                    fwrite($fo,"$former\n$name\n");
                }
                else
                {
                    $error='All Field Requeired';
                }
        header("location:second.php");
    }
    else if(isset($_POST['three']))
    {
        header("location:third.php");
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
    <form class=" container font-width-bold" style="width:700px;" method="POST">
        <div class="border mrgincenter">
            <!-- <h1 class="display-4 text-center">Feed Back</h1> -->

            <?php
            if (!empty($error)) {
            ?>
                <div class="alert-danger alert col-12 m-auto p-auto" role="alert"> <?php echo $error ?> </div>
            <?php  }
            ?>

            <div class="form-group row container">
                <label class="col h5">Are you a current or former employee? </label>
                <div class="col">
                    <input type="radio" name="former" value="current"> Current
                    <input type="radio" name="former" value="former"> Former
                </div>
            </div>

            <div class="form-group row container">
                <label class="col h4">Employer's Name</label>
                <div class="col">
                    <input type="text" class="form-control col m-auto" name="name" value="<?php echo $na ;?>" >
                </div>
            </div>
        </div>
        <hr style="width: 20rem; height:.1rem" class="bg-danger">


    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

            <li class="page-item disabled">
                <!-- <a class="page-link disable" href="#" tabindex="-1">Previous</a> -->
                <input type="submit" class="page-link disable" name='pre' value="Previous">
            </li>

            <li class="page-item active">
                <!-- <a class="page-link" href="index.php" hello1">1</a> -->
                <input type="submit" class="page-link " name='one' value="1">
            </li>

            <li class="page-item">
                <!-- <a class="page-link" href="second.php" hello2">2</a> -->
                <input type="submit" class="page-link " name='two' value="2">
            </li>

            <li class="page-item">
                <!-- <a class="page-link" href="Third.php" hello3">3</a> -->
                <input type="submit" class="page-link " name='three' value="3">
            </li>

            <li class="page-item">
                <!-- <a class="page-link" href="second.php">Next</a> -->
                <input type="submit" class="page-link " name='next' value="next">
            </li>
        </ul>
    </nav>

    </form>
</body>

</html>