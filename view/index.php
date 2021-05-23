<?php 
require_once('layouts/header.php'); 
//include 'autoload/autoloader.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

  $login = new Login($_POST['email'], $_POST['password']);

  $res = $login->userLogin();

  if($res['success']){
    header('Location: dashboard.php');
    exit;
  }else{    
    header('Location: index.php?err=1');
  }
}
?>
<form id="" action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div> 
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php require_once('layouts/footer.php'); ?>

<script>

</script>