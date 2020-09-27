<?php
    include ('nav.php');
    $train_id='';
    if(isset($_GET['id'])){
      $train_id = get_safe_value($_GET['id']);
      $_SESSION['train_id']= $train_id;
      $sql = " SELECT depDate, depTime FROM train_date WHERE train_no = '$train_id' ";
      $result = mysqli_query($con,$sql);
      $row = mysqli_num_rows($result);
      // echo $_SESSION['train_id'];
      $query = " SELECT train_coach.coach_type AS coach_type, coach_price.price AS price 
      FROM train_coach, coach_price 
      WHERE train_coach.train_no = '$train_id' 
      AND train_coach.coach_type = coach_price.coach_type";
      $res = mysqli_query($con,$query);
      $rows = mysqli_num_rows($res);      
    }
?>

<input type="hidden" id="add_more" value="1" display="none"/>

<div class="row">
  <div class="col-12 grid-margin stretch-card" style="background-color: lightgreen!important;">
    <div class="card">
      <div class="card-body">
        <form class="forms-sample">
          <div class="row">
            <div class="col-6">
              <label for="SelectDate">Choose Date</label>
              <div class="form-group">
                <select class="form-control" name="date" id="SelectDate">
                  <option>Choose Date</option>
                  <?php
                    $date = $data['deptDate'];
                    if( $row > 0 ){
                      while( $data = mysqli_fetch_assoc($result)){
                        
                        ?><option value="<?php echo $data['depDate']; ?>">
                    <?php echo date('d F Y',strtotime($data['depDate'])); ?></option><?php
                      }
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-6">
              <label for="SelectCoach">Choose Coach</label>
              <div class="form-group">
                <select class="form-control" name="coach" id="SelectCoach">
                  <option>Choose Coach</option>
                  <?php
                    if( $rows > 0 ){
                      while( $info = mysqli_fetch_assoc($res)){
                        
                        ?><option value="<?php echo $info['coach_type']; ?>">
                    <?php echo $info['coach_type']; ?></option><?php
                      }
                    }
                  ?>
                </select>
              </div>
            </div>
            </div>
          
          <label>Passenger Details</label>
          <div class="form-group" id="box1">
            <div class="row">
              <div class="col-5">
                <input type="text" class="form-control" name="name[]" placeholder="Name" required>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" name="age[]" placeholder="Age" required>
              </div>
              <div class="col-2">
                <select class="form-control" name="gender[]" id="exampleFormControlSelect1">
                  <option value="">Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="others">Others</option>
                </select>
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-2 offset-4">
              <button type="submit" name="submit" class="btn btn-primary mr-2">
                Submit
              </button>
            </div>
             <div class="col-2">
              <button type="button" onclick="add_more()" class="btn btn-danger mr-2">
                Add Passenger
              </button>
            </div> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script>
  function add_more(){
    var add_more = jQuery('#add_more').val();
    add_more++;
    jQuery('#add_more').val(add_more);
    var html = '<div class="row" id="box'+add_more+'" style="margin-top: 10px!important;"><div class="col-5"><input type="text" class="form-control" placeholder="Name" name="name[]" required></div><div class="col-3"><input type="text" class="form-control" placeholder="Age" name="age" required></div><div class="col-2"><select class="form-control" name="gender[]" id="exampleFormControlSelect1"><option value="">Gender</option><option value="male">Male</option><option value="female">Female</option><option value="others">Others</option></select></div><div class="col-2"><button type="button" onclick="remove_more('+add_more+')" class="btn btn-danger mr-2">Remove</button></div></div>';
    jQuery('#box1').append(html);
  }

  function remove_more(id){
    jQuery('#box'+id).remove();
  }
</script>
 <div class="row">
  <div class="col-12 grid-margin stretch-card" style="background-color: lightgreen!important;">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th>Coach Types</th>
                    <th>Price/person</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    
                      $train_id = get_safe_value($_GET['id']);
                
                      $query = " SELECT train_coach.coach_type AS coach_type, coach_price.price AS price 
                      FROM train_coach, coach_price 
                      WHERE train_coach.train_no = '$train_id' 
                      AND train_coach.coach_type = coach_price.coach_type";
                      $res = mysqli_query($con,$query);
                      $rows = mysqli_num_rows($res);
                
                      
                    
                    if( $rows > 0 ){
                      while($info=mysqli_fetch_assoc($res)){
                        ?><td><?php echo $info['coach_type']; ?></td>

                    <td><?php echo $info['price']; ?></td>
                  <tr>
                    <?php
                      
                      }
                      
                    }
                  ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
<?php

if(isset($_GET['submit'])){
  $coach = $_GET['coach'];
  $date_choice = $_GET['date'];
  $name_arr = $_GET['name'];
  $age_arr = $_GET['age'];
  $gender_arr = $_GET['gender'];
  $ticket_id = rand ( 100 , 999 );
  $train_no = $_SESSION['train_id'];
  $user_id = $_SESSION['user_id'];
  $count = 0;
  foreach($name_arr as $key => $val){
    $name = $val;
    $age = $age_arr[$key];
    $gender = $gender_arr[$key];
    $passenger_id = rand( 1 , 99999 );
    $seat_no = rand(1,120);
    // echo $sql = " INSERT INTO passenger_ticket(passenger_id,ticket_id) VALUES('$passenger_id','$ticket_id') ";
    // echo $sql = " INSERT INTO passenger_details(passenger_id,name,age,gender,seat_no) VALUES('$passenger_id','$name','$age','$gender','$seat_no') ";
    mysqli_query($con," INSERT INTO passenger_ticket(passenger_id,ticket_id) VALUES('$passenger_id','$ticket_id') ");
    mysqli_query($con," INSERT INTO passenger_details(passenger_id,name,age,gender,seat_no) VALUES('$passenger_id','$name','$age','$gender','$seat_no') ");
    $count++;
  }


  $quer = " SELECT price FROM coach_price WHERE coach_type = '$coach'";
  $resu = mysqli_query($con,$quer);
  $rowes = mysqli_num_rows($resu);
  if( $rowes > 0 ){
    while($infor=mysqli_fetch_assoc($resu)){
       $price = $infor['price'];
       $total = $price * $count;
      //  echo $sql = "INSERT INTO ticket_amount(ticket_id,total_amount) VALUES('$ticket_id','$total')";

       mysqli_query($con," INSERT INTO ticket_amount(ticket_id,total_amount) VALUES('$ticket_id','$total') ");
    }
  }


  // echo $sql = "INSERT INTO ticket_passenger(ticket_id,no_of_passenger) VALUES('$ticket_id','$count') ";
  mysqli_query($con," INSERT INTO ticket_passenger(ticket_id,no_of_passenger) VALUES('$ticket_id','$count') ");

  // echo $sql = "INSERT INTO ticket_details(ticket_id,train_no,coach_type,user_id,status) VALUES('$ticket_id','$train_no','$coach','$user_id','1') ";
  mysqli_query($con," INSERT INTO ticket_details(ticket_id,train_no,dept_date,coach_type,user_id,status) VALUES('$ticket_id','$train_no','$date_choice','$coach','$user_id','1') ");
  ?><script>alert('TICKET BOOKED SUCCESSFULLY');</script><?php

  redirect('index.php');
}
  include ('footer.php');
?>