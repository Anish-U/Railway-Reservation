<?php
    include ('nav.php');
    $train_id = '';
    if(isset($_GET['id'])){
      $train_id = get_safe_value($_GET['id']);
      
      $sql = " SELECT depDate, depTime FROM train_date WHERE train_no = '$train_id' ";
      $result = mysqli_query($con,$sql);
      $row = mysqli_num_rows($result);

      $query = " SELECT train_coach.coach_type AS coach_type, coach_price.price AS price 
      FROM train_coach, coach_price 
      WHERE train_coach.train_no = '$train_id' 
      AND train_coach.coach_type = coach_price.coach_type";
      $res = mysqli_query($con,$query);
      $rows = mysqli_num_rows($res);

      
    }

?>
<div class="row">
  <div class="col-12 grid-margin stretch-card" style="background-color: lightgreen!important;">
    <div class="card">
      <div class="card-body">
        <form class="forms-sample">
          <div class="row">
            <div class="col-6">
              <label for="SelectDate">Choose Date</label>
              <div class="form-group">
                <select class="form-control" id="SelectDate">
                  <option>Choose Date</option>
                  <?php
                    if( $row > 0 ){
                      while( $data = mysqli_fetch_assoc($result)){
                        ?><option value="<?php echo $data['deptDate']; ?>">
                    <?php echo date( 'F d Y',strtotime($data['depDate'])); ?></option><?php
                      }
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-6">
              <label for="SelectCoach">Choose Coach</label>
              <div class="form-group">
                <select class="form-control" id="SelectCoach">
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
        </form>
      </div>
    </div>
  </div>
</div>
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
    include ('footer.php');
?>