<?php 
require_once('includes/header.php');
?>
<div class="login-elements">
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <a class="navbar-logo" href="index.php"><img src="resources/imgs/icons/Logo.png"/></a>
          </div>
          <div class="col-md-4 contact-us">
              <a class="contact" href="tel:+27112057000"><img src="resources/imgs/icons/contactus.png" class="contact-icon"/>+27(11) 205 7000</a>
              <a class="contact-email" href="mailto:info@truity.co.za"><img src="resources/imgs/icons/maile.png" class="contact-icon"/>info@truity.co.za</a>
          </div>
        </div>
      </div>
</div>
<!-- The login form -->
<div class="login-page">
    <div class="panel">
      <div class="container">
        <div class="login-container">
          <div class="login-header" style="margin-bottom:16px;">
            <img src="resources/imgs/icons/user.png" class="user-icon"/>
            <h2><strong>Welcome to Trui</strong>ty</h2>
            <hr class="login-devider">
          </div>
          <form action="api/auth.php" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="login-field">
                  <img src="resources/imgs/icons/Surname.png" class="login-icon">
                  <input id="IDNumber" type="text" name="IDNumber" class="form-control" placeholder="Username" >
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="login-field">
                    <img src="resources/imgs/icons/house.png" class="login-icon">
                    <input id="CompanyName" type="text" name="CompanyName" class="form-control" placeholder="Company Name" >
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-md-12">
                <div class="login-field">
                  <img src="resources/imgs/icons/password-icon.png" class="login-icon">
                  <input type="password" name="Password" class="form-control" placeholder="Password" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center" style="margin-top: 20px;">
               <a href="#">Forgot password</a>&nbsp;|&nbsp;<a href="#">Contact us</a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-footer">
              <input class="btn btn-block" type="submit" value="Sign In">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
