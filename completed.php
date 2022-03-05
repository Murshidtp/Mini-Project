<?php  
session_start();
error_reporting(0);
include('admin/includes/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } else{

?>


<!DOCTYPE html>
<head>
<title>Re Food Share || Completed Food Requests</title>



<link href="css/style.css" rel='stylesheet' type='text/css' />
</head>
<body><br><br><br>
<center><h2><b>Request Status</b></h2></center>
<br>
<br>
     
    
      <table class="table" align="center" border="2px solidblack">
        <thead>
          <tr>
            <th data-breakpoints="xs">S.NO</th>
            <!-- <th>Request Id</th> -->
            <th>Request By</th>
            <th> Mobile Number</th>
            <th>Food Item</th>
            <th>Request Date</th>
            <th>Status</th>
            <!-- <th data-breakpoints="xs">Action</th> -->
           
           
          </tr>
        </thead>
        <tbody>
        <?php
$ret=mysqli_query($con,"select tblfoodrequests.id as frid,tblfood.ID as foodid,tblfood.FoodItems,tblfoodrequests.requestNumber,tblfoodrequests.fullName,tblfoodrequests.mobileNumber,tblfoodrequests.message,tblfoodrequests.requestDate,tblfoodrequests.status from
tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where (tblfoodrequests.status='Request Accepted' or tblfoodrequests.status='Request Rejected')");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){
while ($row=mysqli_fetch_array($ret)) {

?>
        
          <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              <!-- <td><?php  echo $row['requestNumber'];?></td> -->
                  <td><?php  echo $row['fullName'];?></td>
                  <td><?php  echo $row['mobileNumber'];?></td>
                  <td><?php  echo $row['FoodItems'];?></td>
                  <td><?php  echo $row['requestDate'];?></td>
                   <?php if($row['status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $row['status'];?></td><?php } ?>
                  <!-- <td><a href="view-requestdetails.php?frid=<?php echo $row['frid'];?>">View Details</a></td> -->
                </tr>
                <?php 
$cnt=$cnt+1;
}} else {?>
<tr>
  <td colspan="9" style="color:red">No Record Found</td>
</tr>

<?php } ?>  
 </tbody>
            </table><br><br><br>
            
            
          
   
</section>
 <!-- footer -->
		 <?php include_once('includes/footer.php');?>  
  <!-- / footer -->
</section>

<!--main content end-->

</body>
</html>
<?php }  ?>