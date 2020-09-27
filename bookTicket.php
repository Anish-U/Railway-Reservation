<?php
    include ('nav.php');

    $checkEnd = '';
    $checkStart = '';
    $row = '0';
    
    if( isset($_GET['submit']) ){
        $checkStart = get_safe_value($_GET['startStation']);
        $checkEnd = get_safe_value($_GET['endStation']);
        if( $checkEnd != '' ){
            if( $checkStart != '' ){
                
                $sql = "SELECT train_info.train_no AS TrainNo, train_details.tname AS TrainName,
                        train_details.start AS Start, train_details.end AS End, train_details.halts AS Halts
                        FROM train_info, train_details
                        WHERE train_info.tname = train_details.tname
                        AND train_details.start LIKE '%$checkStart%'
                        AND train_details.end LIKE '%$checkEnd%'";
                $result = mysqli_query($con,$sql);
                $row = mysqli_num_rows($result);

                }
            }
        }
?>

<div class="alert alert-success " role="alert">
  <strong>Hello <?php echo $_SESSION['USER']?>!</strong> Happy Booking.🎉
  <button type="button" class="close" data-dismiss="alert">
    <span>&times;</span>
  </button>
</div>

<div class="row">
  <div class="col-12 grid-margin stretch-card" style="background-color: lightgreen!important;">
    <div class="card">
      <div class="card-body">
        <form class="forms-sample">
          <div class="row">
            <div class="col-6">
              <label for="exampleFormControlSelect1">From</label>
              <div class="form-group">
                <select class="form-control" name="startStation" id="exampleFormControlSelect1">
                  <option value="">Select Station</option>
                  <?php
                    $query=" SELECT station_id, sname FROM station ORDER BY sname ASC ";
                    $res = mysqli_query($con,$query);
                    $rows = mysqli_num_rows($res);
                    if( $rows > 0 ){
                      while( $info = mysqli_fetch_assoc($res)){
                        ?><option value="<?php echo $info['station_id']; ?>"><?php echo $info['sname']; ?></option><?php
                      }
                    }
                  ?>                  
                </select>
              </div>
            </div>
            <div class="col-6">
              <label for="exampleFormControlSelect1">To</label>
              <div class="form-group">
                <select class="form-control" name="endStation" id="exampleFormControlSelect1">
                  <option value="">Select Station</option>
                  <?php
                    $query=" SELECT station_id, sname FROM station ORDER BY sname ASC ";
                    $res = mysqli_query($con,$query);
                    $rows = mysqli_num_rows($res);
                    if( $rows > 0 ){
                      while( $info = mysqli_fetch_assoc($res)){
                        ?><option value="<?php echo $info['station_id']; ?>"><?php echo $info['sname']; ?></option><?php
                      }
                    }
                  ?>                  
                  </select>
              </div>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center">
            <button type="submit" name="submit" class="btn btn-primary mr-2">
              Submit
            </button>
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
              <table class="table">
                <thead>
                  <tr>
                    <th>Train No</th>
                    <th>Train Name</th>
                    <th>From Station</th>
                    <th>To Station</th>
                    <th>No of Halts</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if( $row > 0 ){
                    while( $data = mysqli_fetch_assoc($result)){
                        $TrainNo = $data['TrainNo'];
                        $TrainName = $data['TrainName'];
                        $Start = $data['Start'];
                        $End = $data['End'];
                        $Halts = $data['Halts'];
                        
                        $querystart = "SELECT sname FROM station where station_id = '$Start'";
                        $resstart = mysqli_query($con,$querystart);
                        $datastart = mysqli_fetch_assoc($resstart);
                        $Start = $datastart['sname'];

                        $queryend = "SELECT sname FROM station where station_id = '$End'";
                        $resend = mysqli_query($con,$queryend);
                        $dataend = mysqli_fetch_assoc($resend);
                        $End = $dataend['sname'];
                    ?>
                  <tr>
                    <td><?php echo $TrainNo; ?></td>
                    <td><?php echo $TrainName; ?></td>
                    <td><?php echo $Start; ?></td>
                    <td><?php echo $End; ?></td>
                    <td><?php echo $Halts; ?></td>
                    <td>
                      <a href="bookings.php?id=<?php echo $TrainNo ?>" class="badge badge-danger">BOOK NOW</a>
                    </td>
                  </tr><?php
                    }
                  }else{
                      ?>
                  <tr>
                    <td colspan="6" class="text-center"><strong>No Trains Found</strong></td>
                  </tr><?php
                  }
                    ?>
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