<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand text-light h6" href="#">saloni</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <span class="ml-5 h3 text-success ">
      <!-- After Login it work -->
        <?php 
        if (!empty($semail) && !empty($spass)) {
          echo $_SESSION['email'];

        }          
      ?>
       
      </span>


  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      
<!-- PAssword Image change  -->
<li class="nav-item">
    <li class="nav-item">
        <a class="nav-link text-primary h5 pr-3" href="index.php">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-primary h5 pr-3" href="registration.php">New User</a>
      </li>


  
      <li class="nav-item">
      <?php 
        if (empty($semail) && empty($spass)) {

          ?>
            <a class="nav-link text-primary h5 pr-3 text-warning"  href="login.php">Login</a>
    <?php      
      }
      ?>
      </li>

      <li class="nav-item">
        <a class="nav-link text-primary h5 pr-3" href="feedbackpage.php">FeedBack</a>
      </li>



      <li class="nav-item">
      <?php 
        if (!empty($semail) && !empty($spass)) {

          ?>
            <a class="nav-link text-primary h5 pr-3 text-warning"  href="logout.php">logout</a>
    <?php      
      }
      ?>
      </li>


    </ul>
  </div>
</nav>

