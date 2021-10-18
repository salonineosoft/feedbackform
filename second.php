<?php
$error='';
$error='';
session_start();
$semail = $_SESSION['email'];
    $k = trim("users/$semail");
    if(file_exists("$k/feedback.txt"))
    {
        $fo = fopen("$k/feedback.txt", "r");
        $foo=trim(fgets($fo));
        $na=trim(fgets($fo));
        $Ra   = trim(fgets($fo));
        $St   = trim(fgets($fo));
        $Jo =   trim(fgets($fo));
        $Re   = trim(fgets($fo));
        $Pr   = trim(fgets($fo));
        $Cons  = trim(fgets($fo));
        $Adv  = trim(fgets($fo));
    }



    if(isset($_POST['one']) || isset($_POST['pre']))
    {
        header("location:first.php");
    }

    else if(isset($_POST['two']))
    {
        header("location:second.php");
    }
    else if(isset($_POST['three']) || isset($_POST['next']))
    {
        $rating    = @$_POST['rating'];
        $status    = $_POST['status'];
        $jobtitle   = $_POST['jobtitle'];
        $review    = $_POST['review'];
        $pros      = $_POST['pros'];
        $cons      = $_POST['cons'];
        $advice     = $_POST['advice'];
        $k = trim("users/$semail");
          if (!empty($rating) && !empty($status) && !empty($jobtitle) && !empty($review) && !empty($pros) && !empty($cons) && !empty($advice))
                {  
                    $fo = fopen("$k/feedback.txt", "w");
                    fwrite($fo,"$foo\n$na\n$rating\n$status\n$jobtitle\n$review\n$pros\n$cons\n$advice\n");
                }
                else
                {
                    $error='All Field Requeired';
                }

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
    <link rel="stylesheet" href="feedback.css">
    <style>
        .mrgincenter {
            margin: 0px 0px 0px 0px;
            padding: 25px 0px 10px 0px;
            width: 800px;
        }
    </style>
</head>

<body>
<?php include('nav.php') ?>
    <form class="m-auto font-width-bold " style="width:700px;" method="POST">
        <div class="border mrgincenter">
         <?php
            if (!empty($error)) {
            ?>
                <div class="alert-danger alert col-12 m-auto p-auto" role="alert"> <?php echo $error ?> </div>
            <?php  }
            ?>

            <div class="form-group row container">
                <label class="col h4">Overall Rating </label>
                <div class="col">
                    <?php include("star.php"); ?>
                </div>
            </div>

            <div class="form-group row container">
                <label class="col h4"> Employment Status</label>
                <div class="col">
                    <select name="status" class="form-control col-9">
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                        <option value="Contract">Contract</option>
                        <option value="Intern">Intern</option>
                    </select>
                </div>
            </div>

            <div class="form-group row container">
                <label class="col h4">Job Title</label>
                <div class="col">
                    <input type="text" class="form-control col m-auto" name="jobtitle" value="<?php echo $Jo; ?>">
                </div>
            </div>

            <div class="form-group row container">
                <label class="col h4">Review Headline</label>
                <div class="col">
                    <input type="text" class="form-control col m-auto" name="review" value="<?php echo $Re; ?>">
                </div>
            </div>

            <div class="form-group row container">
                <label class="col h4">PROs</label>
                <div class="col">
                    <input class="form-control" name='pros' value="<?php echo $Pr; ?>">
                </div>
            </div>

            <div class="form-group row container">
                <label class="col h4">CONs</label>
                <div class="col">
                    <input class="form-control" name="cons" value="<?php echo $Cons; ?>">
                </div>
            </div>

            <div class="form-group row container">
                <label class="col h4">Advice Management</label>
                <div class="col">
                    <input name="advice" class="form-control" value="<?php echo $Adv; ?>">
                </div>
            </div>
        </div>

        <hr style="width: 20rem; height:.1rem" class="bg-danger">


    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

            <li class="page-item">
                <!-- <a class="page-link disable" href="#" tabindex="-1">Previous</a> -->
                <input type="submit" class="page-link" name='pre' value="Previous">
            </li>

            <li class="page-item ">
                <!-- <a class="page-link" href="index.php" hello1">1</a> -->
                <input type="submit" class="page-link " name='one' value="1">
            </li>

            <li class="page-item active">
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