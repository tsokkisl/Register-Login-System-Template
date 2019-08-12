<div id="register" class="container">
  <h1>Create an account</h1>
  <form>
    <div class="form-group row">
      <label for="regFirstName" class="col-sm-2 col-form-label">First Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="regFirstName" placeholder="First Name">
      </div>
    </div>
    <div class="form-group row">
      <label for="regLastName" class="col-sm-2 col-form-label">Last Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="regLastName" placeholder="Last Name">
      </div>
    </div>
    <div class="form-group row">
      <label for="regEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="regEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group row">
      <label for="regPassword" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="regPassword" placeholder="Password">
      </div>
    </div>
    <div class="form-group row">
      <label for="regPassword" class="col-sm-2 col-form-label">Confirm Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="regPassword2" placeholder="Confirm Password">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="button" class="btn btn-primary" id="signupButton">Sign up</button>
      </div>
    </div>
  </form>
  <br>
  <div class="container">
    <div class="alert alert-danger" id="signupAlertFail"></div>
    <div class="alert alert-success" id="signupAlertSuccess"></div>
  </div>
</div>
