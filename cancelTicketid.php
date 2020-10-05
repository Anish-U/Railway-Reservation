<?php
    include ('nav.php');
    
    if(isset($_GET['id'])){
        $ticket_id = $_GET['id'];
        $date = date('d F Y');
        $time = date('H:i:s');
        
        $sql= " INSERT INTO cancel_details(ticket_id,cancel_date,cancel_time) 
                VALUES('$ticket_id','$date','$time') ";

        $query= " UPDATE ticket_details 
                  SET status = '0'
                  WHERE ticket_id = '$ticket_id' ";

        mysqli_query($con,$query);
        mysqli_query($con,$sql);
        ?><script>alert('TICKET CANCELLED SUCCESSFULLY');</script><?php
        redirect('index.php');
    }
    else{
        redirect('index.php');
    }
?>


<?php
    include ('footer.php');
?>