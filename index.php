<head>
 	<title>Login Page</title>
</head>
<?php 
	include("master.php");
  include("./Config/helper_class.php");
  $obj=new Helper_Class;
 ?>
 <body>
	<nav class="navbar navbar-dark bg-dark Edit_navbar_Main">
  		
  		<div class="container Edit_container">
  		<nav class="navbar navbar-expand-lg navbar-light bg-dark Edit_navbar">
  		  <div class="container-fluid">
  		  	<!-- <i class="fa fa-check" aria-hidden="true"></i> -->
  		    <a class="navbar-brand" href="#">Online Voting System</a>
  		  
  		  </div>
  		</nav>
    		<button type="button" onclick="SignUpBtn()" class="btn btn-outline-light edit_Btn"><i style="margin-right:5px;" class="fa fa-sign-in" aria-hidden="true"></i>Sign Up</button>
		</div>

	</nav>

<div class="container Homepage_Container1">
  <div class="row row-cols-0 ">
    <div class="col Homepage_Login">
<form method="POST" action="./Action/loginAction.php">
  <div class="mb-4">
    <label for="exampleInputEmail1" class="form-label edit-form-label">Email Address</label>
    <input type="email" class="form-control Edit-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address" name="Email" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label edit-form-label">Password</label>
    <input type="password" class="form-control Edit-form-control" id="exampleInputPassword1" placeholder="Enter Password" name="Password" required minlength="6">
  </div>
  
  <button type="submit" class="btn btn-outline-dark">Login</button>

</form>
 <div id="emailHelp" class="form-text">Don't Have An Account ? <a href="./signUpPage.php">Sign Up</a> now</div>
 <nav class="bg-dark errorValidation" id="errorValidationID">
    <?php 
      if (isset($_COOKIE['Email_Validation_false'])) {
       echo $_COOKIE['Email_Validation_false'];
      }
      if(isset($_COOKIE["Data_success"])){
        echo $_COOKIE["Data_success"];
      }
      if (isset($_COOKIE['ActivateAccount'])) {
       echo $_COOKIE['ActivateAccount'];
      }
      if (isset($_COOKIE['FailedActivate'])) {
       echo $_COOKIE['FailedActivate'];
      }
      if (isset($_COOKIE['AllreadyActivated'])) {
       echo $_COOKIE['AllreadyActivated'];
      }
      if (isset($_COOKIE['Login_Pass_Not_Match'])) {
       echo $_COOKIE['Login_Pass_Not_Match'];
      }
      if (isset($_COOKIE['Login_Email_Not_Match'])) {
       echo $_COOKIE['Login_Email_Not_Match'];
      }
      if (isset($_COOKIE['Login_inactive_Account'])) {
       echo $_COOKIE['Login_inactive_Account'];
      }
     ?>   
  </nav>
    </div>

<!-- Vote Result Homepage Section -->
    <div class="col Homepage_Vote">
    	<nav class="navbar navbar-expand-lg navbar-light bg-dark navVoteSection">
    		Programming languages for backend web development. 
    	</nav>
    	<!-- Php Vote Box -->
     
    	<div class="card mb-3 edit-card" style="max-width: 500px;">
  			<div class="row g-0">
  			  <div class="col-md-4">
  			    <img src="./Css/Image/php.png" alt="...">
  			  </div>
          <?php 
          $PHPDATA=$obj->VoteCount('PHP');
           ?>
  			  <div class="col-md-8">
  			    <div class="card-body">
  			      <h5 class="card-title edit-card-title">PHP</h5>
  			      <p class="card-text edit-card-text">VOTE : <?php echo $PHPDATA?></p>
  			    </div>
  			  </div>
  			</div>
		</div>

    	<!-- Java Vote Box -->

    	<div class="card mb-3 edit-card" style="max-width: 500px;">
  			<div class="row g-0">
  			  <div class="col-md-4">
  			    <img src="./Css/Image/java.png" alt="...">
  			  </div>
          <?php 
          $JAVADATA=$obj->VoteCount('Java');
           ?>
  			  <div class="col-md-8">
  			    <div class="card-body">
  			      <h5 class="card-title edit-card-title">JAVA</h5>
  			      <p class="card-text edit-card-text">VOTE : <?php echo $JAVADATA ?></p>
  			    </div>
  			  </div>
  			</div>
		</div>


    	<!-- Ruby Vote Box -->

    	<div class="card mb-3 edit-card" style="max-width: 500px;">
  			<div class="row g-0">
  			  <div class="col-md-4">
  			    <img src="./Css/Image/ruby.png" alt="...">
  			  </div>
          <?php 
          $RUBYDATA=$obj->VoteCount('Ruby');
           ?>
  			  <div class="col-md-8">
  			    <div class="card-body">
  			      <h5 class="card-title edit-card-title">Ruby</h5>
  			      <p class="card-text edit-card-text">VOTE : <?php echo $RUBYDATA ?></p>
  			    </div>
  			  </div>
  			</div>
		</div>


    	<!-- .Net Vote Box -->

    	<div class="card mb-3 edit-card" style="max-width: 500px;">
  			<div class="row g-0">
  			  <div class="col-md-4">
  			    <img src="./Css/Image/dotnet.png" alt="...">
  			  </div>
          <?php 
          $DotNetData=$obj->VoteCount('DotNet');
           ?>
  			  <div class="col-md-8">
  			    <div class="card-body">
  			      <h5 class="card-title edit-card-title">.NET</h5>
  			      <p class="card-text edit-card-text">VOTE : <?php echo $DotNetData ?></p>
  			    </div>
  			  </div>
  			</div>
		</div>


    	<!-- Python Vote Box -->

    	<div class="card mb-3 edit-card" style="max-width: 500px;">
  			<div class="row g-0">
  			  <div class="col-md-4">
  			    <img src="./Css/Image/python.jpg" alt="...">
  			  </div>
          <?php 
          $PythonDATA=$obj->VoteCount('Python');

           ?>
  			  <div class="col-md-8">
  			    <div class="card-body">
  			      <h5 class="card-title edit-card-title">Python</h5>
  			      <p class="card-text edit-card-text">VOTE : <?php echo $PythonDATA ?></p>
  			    </div>
  			  </div>
  			</div>
		</div>


    	<!-- JS Vote Box -->

    	<div class="card mb-3 edit-card" style="max-width: 500px;">
  			<div class="row g-0">
  			  <div class="col-md-4">
  			    <img src="./Css/Image/nodejs.png" alt="...">
  			  </div>
          <?php 
          $NodeJSData=$obj->VoteCount('NodeJSData');
           ?>
  			  <div class="col-md-8">
  			    <div class="card-body">
  			      <h5 class="card-title edit-card-title">node Js</h5>
  			      <p class="card-text edit-card-text">VOTE : <?php echo $NodeJSData ?></p>
  			    </div>
  			  </div>
  			</div>
		</div>


    </div>
  </div>
</div>



<?php 
	include("footer.php");
 ?>


