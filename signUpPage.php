<head>
 	<title>SignUp Page</title>
</head>
<?php 
	include("master.php");
 ?>
 <body>
	<nav class="navbar navbar-dark bg-dark Edit_navbar_Main">
  		
  		<div class="container Edit_container">
  		<nav class="navbar navbar-expand-lg navbar-light bg-dark Edit_navbar">
  		  <div class="container-fluid">
  		    <a class="navbar-brand" href="#">Online Voting System</a>
  		  
  		  </div>
  		</nav>
        <button type="button" onclick="Loginbtn()" class="btn btn-outline-light edit_Btn"><i style="margin-right: 5px;" class="fa fa-sign-in" aria-hidden="true"></i>Login</button>
		</div>

	</nav>

  <!-- Sign Up Form -->
  <div class="container">
  <div class="row justify-content-md-center edit-signup-form">
    
    <div class="col-md-auto Homepage_Login">
      <nav class="navbar navbar-expand-lg navbar-light bg-dark navVoteSection">
        SignUp Here
      </nav>

      <form action="./Action/SignUpAction.php" method="post" name="MyForm" onsubmit="return validateForm()" enctype="multipart/form-data">
        <div class="row">
          <div class="col">
            <input type="text" class="form-control Edit-form-control" name="Name" placeholder="Full Name" required="required">
          </div>
          <div class="col">
            <input class="form-control Edit-form-control" type="email" name="Email" placeholder="Email Id">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <input type="text" class="form-control Edit-form-control" name="State" placeholder="State" required="required">
          </div>
          <div class="col">
            <input type="text" class="form-control Edit-form-control" name="City" placeholder="City" required="required">
          </div>
        </div>

         <div class="row">
          <div class="col">
            <input type="Password" class="form-control Edit-form-control" name="Password" placeholder="Password" required="required">
          </div>
          <div class="col">
            <input type="Password" class="form-control Edit-form-control" name="RetypePass" placeholder="Confirm Password" required="required">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <input type="date" class="form-control Edit-form-control" name="DATEofBIRTH" placeholder="Date Of Birth" required="required">
          </div>
          <div class="col">
           <select class="form-control Edit-form-control" name="VoteType">
              <option value="Voter">Voter</option>
              <option value="Voter">Voter</option>
           </select>
          </div>
        </div>

        <div class="form-row">
          <div class="col" style="margin-left: 18px;">
            <input type="text" class="form-control Edit-form-control" name="Address" placeholder="Address" required="required">
          </div>
        </div>
        <div class="form-row">
            <div style="margin-left: 18px;" class="custom-file">
              <input onchange="ValidateSize(this)" type="file" class="custom-file-input " id="validatedCustomFile" name="Image" accept=".jpg,.png,.gif,.jpeg" required>
              <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
              <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
        </div>

        <div class="text-center Signup-btn">
          <button type="submit" class="btn btn-dark ">Register</button>
        </div>
      </form>
 <div id="emailHelp" class="form-text text-center">Already have an account <a href="./index.php">Log in</a> now</div>



      <nav class="bg-dark errorValidation" id="errorValidationID">
       <?php 
        if (isset($_COOKIE['Data_error'])) {
            echo $_COOKIE['Data_error'];
        }
       
        if (isset($_COOKIE['DontHaveAccountActivate'])) {
            echo $_COOKIE['DontHaveAccountActivate'];
        }
        ?>

      </nav>
       <nav class="bg-dark errorValidation" id="errorValidationID">
        <?php 
        
         ?>
      </nav>
    </div>
   
  </div>
  
</div>



  <?php 
  include("footer.php");
 ?>