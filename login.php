<div id="login" class="container">
  <h1>Login</h1>
  <form>
    <div class="form-group">
      <label for="logEmail">Email address</label>
      <input type="email" class="form-control" id="logEmail" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">Valid format example@mail.com</small>
    </div>
    <div class="form-group">
      <label for="logPassword">Password</label>
      <input type="password" class="form-control" id="logPassword" placeholder="Password">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="stayLoggedIn">
      <label class="form-check-label" for="stayLoggedIn">Stay logged in</label>
    </div>
    <button type="button" class="btn btn-primary" id="loginButton">Log in</button>
  </form>
  <br>
  <div class="container">
    <div class="alert alert-danger" id="loginAlertFail"></div>
    <div class="alert alert-success" id="loginAlertSuccess"></div>
  </div>
</div>
