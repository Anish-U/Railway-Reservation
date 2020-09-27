<?php
    include ('nav.php');
    
    if(isset($_GET['id'])){
        $ticket_id = $_GET['id'];
        echo $ticket_id;

        $query= " UPDATE ticket_details 
                  SET status = '0'
                  WHERE ticket_id = '$ticket_id' ";

        mysqli_query($con,$query);
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