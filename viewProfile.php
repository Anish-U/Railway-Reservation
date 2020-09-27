<?php
    include ('nav.php');
    $userid = '';    
    $sql = " SELECT user_id FROM user_details WHERE username = '".$_SESSION['USER']."' AND password='".$_SESSION['PASSWORD']."' ";
    $result = mysqli_query($con,$sql);
    
    $row = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);
    $userid = $data['user_id'];    
    
    
    $query = " SELECT mobile FROM user_phone WHERE user_id = '$userid' ";
    $res = mysqli_query($con,$query);
    $rows = mysqli_num_rows($res);
    
?>

<div class="alert alert-info" role="alert">
  <strong>Hello <?php echo $_SESSION['USER']?>!</strong> You have a great Profile 😃.
  <button type="button" class="close" data-dismiss="alert">
    <span>&times;</span>
  </button>
</div>

<div class="row">
  <div class="col-12 grid-margin stretch-card" style="background-color: lightblue!important;">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <div class="col-4 text-center">
            <div class="profilePic">
              <img src="https://joeschmoe.io/api/v1/<?php echo $_SESSION['USER'] ?>" alt="Avatar" width="200"
                height="200" class="avatarPic">
            </div>
          </div>
          <div class="col-4 text-center d-flex align-items-center">
            <div class="welcomeTag">
              <h2><i><?php echo $_SESSION['USER'] ?></i></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 grid-margin stretch-card" style="background-color: lightblue!important;">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Mobile</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td rowspan="<?php echo $rows ?>"><?php echo $_SESSION['USER'] ?></td>
                    <td rowspan="<?php echo $rows ?>"><?php echo $_SESSION['PASSWORD'] ?></td>
                    <?php
                            if($rows > 0){
                                while( $info = mysqli_fetch_assoc($res) ){
                                    ?>

                    <td><?php echo $info['mobile']; ?></td>
                  </tr>
                  <tr>

                    <?php        }
                            }
                    ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php
    include ('footer.php');
?>