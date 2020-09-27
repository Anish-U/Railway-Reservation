<?php
    include ('nav.php');
    $user_id = $_SESSION['user_id'];
    $sql = " SELECT ticket_details.ticket_id AS ticket_id, 
            train_info.tname AS t_name,  
            ticket_details.dept_date AS dept_date, 
            ticket_amount.total_amount AS total, 
            train_details.start AS start, 
            train_details.end AS end, 
            ticket_passenger.no_of_passenger AS no_of_pass, 
            train_date.arrTime AS arr_time, 
            train_date.depTime AS dep_time,
            ticket_details.status AS status 
            FROM ticket_passenger, ticket_amount, ticket_details, train_date , train_info, train_details 
            WHERE ticket_passenger.ticket_id = ticket_details.ticket_id 
            AND ticket_details.ticket_id = ticket_amount.ticket_id  
            AND train_date.train_no = ticket_details.train_no 
            AND ticket_details.dept_date = train_date.depDate 
            AND train_info.tname = train_details.tname 
            AND train_info.train_no = ticket_details.train_no 
            AND ticket_details.user_id = '$user_id' ";
    $result = mysqli_query($con,$sql);
    $row = mysqli_num_rows($result);

?>

<div class="row">
  <div class="col-12 grid-margin stretch-card" style="background-color: #ffa0d2!important;">
    <div class="card">
      <div class="card-body">
        <div class="row text-center">
          <div class="offset-4 col-4"><h2>Your Tickets !!</h2></div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Ticket ID</th>
                    <th>Train Name</th>
                    <th>From </th>
                    <th>To </th>
                    <th>Start date</th>
                    <th>Timings </th>
                    <th>Passengers</th>
                    <th>Amount</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                        if( $row > 0 ){
                            while( $data = mysqli_fetch_assoc($result) ){
                                $ticket_id = $data['ticket_id'];
                                $t_name = $data['t_name'];
                                $dept_date = $data['dept_date'];
                                $total = $data['total'];
                                $start = $data['start'];
                                $end = $data['end'];
                                $no_of_pass = $data['no_of_pass'];
                                $arr_time = $data['arr_time'];
                                $dep_time = $data['dep_time'];
                                $status = $data['status'];
                            
                                    ?>
                    <tr>
                        <td><?php echo $ticket_id; ?></td>
                        <td><?php echo $t_name; ?></td>
                        <td><?php echo $start; ?></td>
                        <td><?php echo $end; ?></td>
                        <td><?php echo date("d F Y",strtotime($dept_date)); ?></td>
                        <td><?php echo "$arr_time - $dep_time"; ?></td>
                        <td><?php echo $no_of_pass; ?></td>
                        <td><?php echo "Rs.$total"; ?></td>
                        <td><?php if ( $status != 0 ){
                            echo "BOOKED";
                        }else{
                            echo "CANCELLED";
                        }
                         ?></td>
                    </tr><?php
                            }
                        }else{
                            ?>
                  <tr>
                    <td colspan="8" class="text-center"><strong>No Details Found</strong></td>
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