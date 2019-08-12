$("#loginAlertFail").hide();
$("#loginAlertSuccess").hide();
$("#signupAlertFail").hide();
$("#signupAlertSuccess").hide();

//Login functionality with ajax
$("#loginButton").click(function(){
  let cookie;
  if ($("#stayLoggedIn").is(':checked')) cookie = '1';
  else cookie = '0';
  $.ajax ({
    type:"POST",
    url:"actions.php?action=loginUser",
    data:"logemail="+$("#logEmail").val()+
    "&logpassword="+$("#logPassword").val()+
    "&stayloggedin="+cookie,
    success:function(result) {
      if (result == '1' ) {
    	$("#loginAlertFail").hide();
    	$("#loginAlertSuccess").html('Login successful').show();
        setTimeout(function() {
          window.location.replace("http://localhost/Login-Register-Template/cp.php");
        }, 1000);
      }
      else {
	$("#loginAlertSuccess").hide();
        $("#loginAlertFail").html(result).show();
      }
    }
  })
})

//Sign up functionality with ajax
$("#signupButton").click(function(){
  $.ajax ({
    type:"POST",
    url:"actions.php?action=registerUser",
    data:"regemail="+$("#regEmail").val()+
    "&regpassword="+$("#regPassword").val()+
    "&regpassword2="+$("#regPassword2").val()+
    "&regfname="+$("#regFirstName").val()+
    "&reglname="+$("#regLastName").val(),
    success:function(result) {
      if (result == '1' ) {
    	$("#signupAlertFail").hide();
    	$("#signupAlertSuccess").html('Registration successful').show();
        setTimeout(function() {
          window.location.replace("http://localhost/Login-Register-Template/cp.php");
        }, 1000);
      }
      else {
	$("#signupAlertSuccess").hide();
        $("#signupAlertFail").html(result).show();
      }
    }
  })
})
