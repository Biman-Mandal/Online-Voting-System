/*
Name
PhoneNumber
State
City
Password
RetypePass
DATEofBIRTH
VoteType
Address
Image
*/

      function validateForm() {
      	// Name
 		var name = document.forms["MyForm"]["Name"].value;
  		if (name == "") {
        document.getElementById('errorValidationID').innerHTML = "Please enter your full name.";
    	return false;
  		}else if (name.length < 4) {
  		document.getElementById('errorValidationID').innerHTML = "Please enter your full name.";
    	return false;
  		}
  		// Phone
  		
  		var pass=document.forms["MyForm"]["Password"].value;
  		  if(pass.length < 6) {  
  		document.getElementById('errorValidationID').innerHTML = "Password must be at least 6 characters long";
  			return false;
  		}
  		var retype_pass=document.forms["MyForm"]["RetypePass"].value;
  		if (pass == retype_pass) {
  			return true;
  		}else{
  		document.getElementById('errorValidationID').innerHTML = "Password and confirm password does not match.";
  			return false;
  		}
  		var address=document.forms["MyForm"]["Address"].value;
  		if (address.length < 7) {
  		document.getElementById('errorValidationID').innerHTML = "Please Enter Full Address";
  			return false;
  		}

  		// file
  		// var fileVar = document.getElementById("validatedCustomFile").files[0];
  		  
    //         if (fileVar.size > 2097152) // 2 MiB for bytes.
    //         {
    //             alert("File size must under 2MiB!");
    //             return;
    //         }
  		return( true );
  	}

    function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MiB
        if (FileSize > 3) {
           document.getElementById('errorValidationID').innerHTML = "Please choose a image file under 3MB";
           // $(file).val(''); //for clearing with Jquery
           // document.getElementById("validatedCustomFile").reset();
           document.getElementById("validatedCustomFile").value=null; 
           return false;
        } else if (FileSize < 3) {
           document.getElementById('errorValidationID').innerHTML = "";
           return true;
        }
    }

   // Activate Account

    // setInterval(function(){ alert("Hello"); }, 3000);
    var activateAcc=document.getElementById("ActivateAccount");
    if (activateAcc) {
    activateAcc.addEventListener("load",activate());
    function activate(){
    setTimeout(function(){ 
       window.location.href = "../index.php";
     }, 4000);
    }
  };




