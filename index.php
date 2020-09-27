<?php
		include ('nav.php');
	$amount = '0';
	$sql= " SELECT(SELECT COUNT(*) FROM train_info) AS no_of_trains,
								(SELECT COUNT(*) FROM ticket_details) AS total_tickets,
								(SELECT COUNT(*) FROM ticket_details WHERE status='0') AS cancelled_tickets ";
	
	$result = mysqli_query($con,$sql);
	$data = mysqli_fetch_assoc($result); 

	$query="SELECT SUM(total_amount) AS amount from ticket_amount,ticket_details WHERE ticket_details.ticket_id=ticket_amount.ticket_id AND ticket_details.status='1'";

	$res = mysqli_query($con,$query);
	$info = mysqli_fetch_assoc($res);
	
	if($info['amount'] != ''){
		$amount = $info['amount'];
	}

?>

<style>
	body{
		height: 100vh;
		overflow: hidden;
	}
	.train,
	.ticket,
	.cancel,
	.money {
		border-radius: 15px;
		color: #546355;
	}
	.train {
		background-color: lightgreen;
	}
	.ticket {
		background-color: lightpink;
	}
	.cancel {
		background-color: #ffcc5c;
	}
	.money{
		background-color: lightblue;
	}
	.data h1 {
		font-size: 45px;
		font-weight: bold;
	}
	.label p {
		font-size: 18px;
	}
	.action a {
		border-radius: 15px;
	}
</style>

<div class="row p-3 align-item-center justify-content-center">
  <div class="train col-5 m-3 p-2 d-flex flex-column align-item-center justify-content-center">
    <div class="data p-3 text-center">
      <h1><?php echo $data['no_of_trains']; ?></h1>
    </div>
    <div class="label p-3 text-center">
      <p>No of Trains Available</p>
    </div>
    <div class="action p-2 text-center">
      <a href="bookTicket.php" class="btn btn-dark">Book Now</a>
    </div>
  </div>
  <div class="ticket col-5 m-3 p-2 d-flex flex-column align-item-center justify-content-center">
    <div class="data p-3 text-center">
      <h1><?php echo $data['total_tickets']; ?></h1>
    </div>
    <div class="label p-3 text-center">
      <p>No of Tickets Booked</p>
    </div>
    <div class="action p-2 text-center">
      <a href="myBooking.php" class="btn btn-dark">View Tickets</a>
    </div>
  </div>
</div>

<div class="row p-3 align-item-center justify-content-center">
  <div class="cancel col-5 m-3 p-2 d-flex flex-column align-item-center justify-content-center">
    <div class="data p-3 text-center">
      <h1><?php echo $data['cancelled_tickets']; ?></h1>
    </div>
    <div class="label p-3 text-center">
      <p>No of Cancelled Tickets</p>
    </div>
    <div class="action p-2 text-center">
      <a href="cancelTicket.php" class="btn btn-dark">Cancel Ticket</a>
    </div>
  </div>
  <div class="money col-5 m-3 p-2 d-flex flex-column align-item-center justify-content-center">
    <div class="data p-3 text-center">
      <h1><?php echo "Rs.$amount"; ?></h1>
    </div>
    <div class="label p-3 text-center">
      <p>Total Money Spent</p>
    </div>
    <div class="action p-2 text-center">
      <a href="bookTicket.php" class="btn btn-dark">Book Tickets</a>
    </div>
  </div>
</div>



<?php
    include ('footer.php');
?>