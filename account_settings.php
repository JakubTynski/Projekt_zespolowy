<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
include("include/header.php");
?>
<?php 

if(!isset($_SESSION['user_email'])){
  
  header("location: signin.php");

}
else { ?>
<html>
<head>
  <title>Ustawienia konta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<style>
  body{
    overflow-x: hidden;
  }
</style>
<body>
<div class="row">
  <div class="col-sm-2">
  </div>
  <?php 
      $user = $_SESSION['user_email'];
      $get_user = "select * from users where user_email='$user'"; 
      $run_user = mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
            
      $user_name = $row['user_name'];
      $user_pass = $row['user_pass'];
      $user_email = $row['user_email'];
      $user_profile = $row['user_profile'];
      $user_country = $row['user_country'];
      $user_gender = $row['user_gender'];
  ?>
  <div class="col-sm-8">
    <form action="" method="post" enctype="multipart/form-data">
          <table class="table table-bordered table-hover">
            <tr align="center">
              <td colspan="6" class="active"><h2>Zmień ustawienia konta</h2></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Zmień nazwę użytkownika</td>
              <td>
              <input class="form-control" type="text" name="u_name" required="required" value="<?php echo $user_name;?>"/>
              </td>
            </tr>
            
            <tr><td></td><td><a class="btn btn-default" style="text-decoration: none;font-size: 15px;" href="upload.php"><i class="fa fa-user" aria-hidden="true"></i> Zmień zdjęcie profilowe</a></td></tr>

            <tr>
              <td style="font-weight: bold;">Adres e-mail</td>
              <td>
              <input class="form-control" type="email" name="u_email" required="required" value="<?php echo $user_email;?>"></td>
            </tr>

            <tr>
              <td style="font-weight: bold;">Kraj</td>
              <td>
              <select class="form-control" name="u_country">
                <option><?php echo $user_country;?></option>
                <option>Polska</option>
                <option>Stany Zjednoczone</option>
                <option>Niemcy</option>
                <option>Wielka Brytania</option>
                <option>Belgia</option>
                <option>Holandia</option>
                <option>Hiszpania</option>
                <option>Portugalia</option>
              </select>
              </td>
            </tr>
            
            <tr>
              <td style="font-weight: bold;">Płeć</td>
              <td>
              <select class="form-control" name="u_gender">
                <option><?php echo $user_gender;?></option>
                <option>Mezczyzna</option>
                <option>Kobieta</option>
                <option>Inne</option>
              </select>
              </td>
            </tr>
            

            <!-- recovery option start -->

            <tr>
              <td style="font-weight: bold;">Pytanie pomocnicze</td>
              <td>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Pytanie pomocnicze</button>

              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form action="recovery.php?id=<?php echo $user_id;?>" method="post" id="f">
                      <strong>Jakie jest imię Twojego przyjaciela?</strong>
                      <textarea class="form-control" cols="83" rows="4" name="content" placeholder="Imię"></textarea><br/>
                      <input class="btn btn-default" type="submit" name="sub" value="Zapisz" style="width:100px;" /><br><br>
                      <pre >Odpowiedz na pytanie, zapytamy o nie kiedy zapomnisz swoje <br>hasło.
                      </pre>
                      <br><br>
                      </form>
                      <?php
                      if(isset($_POST['sub'])){
                        $bfn = htmlentities($_POST['content']);

                        if($bfn==''){
                
                        echo "<script>alert('Please Enter Something!')</script>";
                        echo "<script>window.open('account_settings.php','_self')</script>";
                        
                        exit();
                        
                        }
                        else {

                        $update = "update users set forgotten_answer='$bfn' where user_email='$user'";
              
                        $run = mysqli_query($con,$update);
                        
                        if($run){
                        
                        echo "<script>alert('Przetwarzanie!')</script>";
                        echo "<script>window.open('account_settings.php?','_self')</script>";
                        }else{
                        echo "<script>alert('Error while Updating information...!')</script>";
                        echo "<script>window.open('account_settings.php','_self')</script>";
                        }
                        }
                      }
                      ?>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
            </tr>
            <!-- recovery option ends -->

            <tr><td></td><td><a class="btn btn-default" style="text-decoration: none;font-size: 15px;" href="change_password.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i> Zmień hasło</a></td></tr>

            <tr align="center">
              <td colspan="6">
              <input class="btn btn-info" style="width: 250px;" type="submit" name="update" value="Zapisz zmiany"/>
              </td>
            </tr>
          </table>
        </form>
        <?php

          if(isset($_POST['update'])){
          
          $user_name = htmlentities($_POST['u_name']);
          $email = htmlentities($_POST['u_email']);
          $u_country = htmlentities($_POST['u_country']);
          $u_gender = htmlentities($_POST['u_gender']);
          
          
          $update = "update users set user_name='$user_name',user_email='$email',user_country='$u_country',user_gender='$u_gender' where user_email='$user'";
          
          $run = mysqli_query($con,$update); 
          
          if($run){
              echo "<script>window.open('account_settings.php','_self')</script>";
          }
        }

        ?>
  </div>
  <div class="col-sm-2">
  </div>
</div>
</body>
</html>
<script>
function show_password() {
    var x = document.getElementById("mypass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
<?php } ?>