<?php
session_start();
?>
<!DOCTYPE html>
<html> 
<head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  user-select: none;
  font-family: 'Poppins', sans-serif;
}  
.bg-img {
  background: url("img/48170.jpg");
  height: 100vh;
  background-size: cover;
  background-position: center;
}
.bg-img:after {
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.7);
}
.content {
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 999;
  text-align: center;
  padding: 60px 32px;
  width: 370px;
  transform: translate(-50%, -50%);
  background: rgba(255, 255, 255, 0.04);
  box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);
}
.content header {
  color: white;
  font-size: 33px;
  font-weight: 600;
  margin: 0 0 35px 0; 
}
.field {
  position: relative;
  height: 45px;
  width: 100%;
  display: flex;
  background: rgba(255, 255, 255, 0.94);
}
.field span {
  color: #222;
  width: 40px;
  line-height: 45px;
}
.field input {
  height: 100%;
  width: 100%;
  background: transparent;
  border: none;
  outline: none;
  color: #222;
  font-size: 16px; 
}
.space {
  margin-top: 16px;
}
.show {
  position: absolute;
  right: 13px;
  font-size: 13px;
  font-weight: 700;
  color: #222;
  display: none;
  cursor: pointer; 
}
.pass-key:valid ~ .show {
  display: block;
}
.pass {
  text-align: left;
  margin: 10px 0;
}
.pass a {
  color: white;
  text-decoration: none; 
}
.pass:hover a {
  text-decoration: underline;
}
.field input[type="submit"] {
  background: #e74a3b;;
  border: 1px solid #e74a3b;;
  color: white;
  font-size: 18px;
  letter-spacing: 1px;
  font-weight: 600;
  cursor: pointer; 
}
.field input[type="submit"]:hover {
  background: #e74a3b;;
}
.login {
  color: white;
  margin: 20px 0; 
}
.links {
  display: flex;
  cursor: pointer;
  color: white;
  margin: 0 0 20px 0;
}
.links i {
  font-size: 17px;
}
i span {
  margin-left: 8px;
  font-weight: 500;
  letter-spacing: 1px;
  font-size: 16px; 
}
.signup {
  font-size: 15px;
  color: white; 
}
.signup a {
  color: #3498db;
  text-decoration: none;
}
.signup a:hover {
  text-decoration: underline;
}
.alert {
  color: #fff;
  margin-top: -30px;
  margin-bottom: 20px;
}

</style>      
</head>
<body>

<div class="bg-img">
  <div class="content">
    <?php
  include "koneksi.php";
  
  if(isset( $_REQUEST['submit'] ) ){
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    
    $sql = mysqli_query($koneksi, "SELECT iduser, username, admin, fullname FROM user WHERE username='$username' AND password=md5('$password')");
    
    if(mysqli_num_rows($sql) > 0 ){
      list($iduser, $username, $admin, $fullname) = mysqli_fetch_array($sql);
      
      //session_start();
      $_SESSION['iduser'] = $iduser;
      $_SESSION['username'] = $username;
      $_SESSION['admin'] = $admin;
      $_SESSION['fullname'] = $fullname;
      
      header("Location: ./admin.php");
      die();
    } else {
      //$err = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
      //header('Location: ./?err='.urlencode($err));
      
      $_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
      header('Location: ./');
      die();
    }
    
  } else {
  ?>
    <header>Sign In</header>
    <?php
    if(isset($_SESSION['err'])){
      $err = $_SESSION['err'];
      echo '<div class="alert alert-warning text-white" role="alert">'.$err.'</div>';
    }
    ?>
    <form class="form-signin" method="post" action="" role="form">
      <div class="field">
        <span class="fa fa-user"></span>
        <input type="text" name="username" placeholder="Username" required autofocus autocomplete="off">
      </div>
      <div class="field space">
        <span class="fa fa-lock"></span>
        <input type="password" name="password" class="pass-key" placeholder="Password" required>
        <span class="show">SHOW</span>
      </div>
      <br>
      <div class="field">
        <input type="submit" name="submit" value="LOGIN">
      </div>
    </form>
  <?php
  }
  ?>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

<script type="text/javascript" src="main.js"></script>
<script type="text/javascript">
    
const pass_field = document.querySelector(".pass-key");
const showBtn = document.querySelector(".show");
showBtn.addEventListener("click", function () {
  if (pass_field.type === "password") {
    pass_field.type = "text";
    showBtn.textContent = "HIDE";
    showBtn.style.color = "#3498db";
  } else {
    pass_field.type = "password";
    showBtn.textContent = "SHOW";
    showBtn.style.color = "#222";
  }
});
    $(".alert-warning").alert().delay(3000).slideUp('slow');

</script>
</body>
</html>

