<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Re Food Share || Food Available</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<!--webfont-->
<!--js-->
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script>
<!---- start-smoth-scrolling---->

<style>
  .completed{
    color: black;
  padding: 7px 2px;
  background-color:#26c7db;
  margin-left: 85%;
  border-radius: 10px;
  text-decoration: none;
  }
</style>
</head>
<body>
<?php include_once("includes/header.php");?>
<!-- banner -->
<div class="banner page-head">	
</div>
<!-- //banner -->
<!-- typo-page -->
<!--typography-->
<div class="typrography">
	 <div class="container">
   <a href="completed.php" class="completed">Request  Status</s></a>
	  
		
		  <section id="tables">
          <div class="page-header">
            <h1>Available Food List</h1>
          </div> 
		  <select id="districtDropdown" oninput="filterTable()" class="search">
  <option>Select District</option>
  <option>Alappuzha</option>
  <option>Ernamkulam</option>
  <option>Idukki</option>
  <option>Kannur</option>
  <option>Kasargod</option>
  <option>Kollam</option>
  <option>Kottayam</option>
  <option>Kozhikkode</option>
  <option>Malappuram</option>
  <option>Palakkad</option>
  <option>Pathanamthitta</option>
  <option>Thiruvananthapuram</option>
  <option>Thrissur</option>
  <option>Wayanad</option>
</select>

       
		  
          <div class="bs-docs-example">
            <table class="table table-bordered" style="color:#000 !important;" id="myTable">
              <thead>
                 <tr>
            <!-- <th data-breakpoints="xs">S.NO</th> -->
            <th>Contact Person</th>
            <th>Contact Person Mobile Number</th>
            <th>Food Item</th>
			<th>Quantity</th>
            <th>Address</th>
            <!-- <th>State Name</th> -->
            <th>District</th>
            <th>Creation Date</th>
			
            <th data-breakpoints="xs">Action</th>
          </tr>
              </thead>
              <tbody>
                <tr>
                	<?php 
$ret=mysqli_query($con,"select * from  tblfood");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
  if($row['Description'] !=0){

?>

            <!-- <td><?php echo $cnt;?></td> -->
              <td><?php  echo $row['ContactPerson'];?></td>
              <td><?php  echo $row['CPMobNumber'];?></td>
              <td><?php  echo $row['FoodItems'];?></td>
			  <td><?php  echo $row['Description'];?></td>
               <td><?php  echo $row['PickupAddress'];?></td>
                  <!-- <td><?php  echo $row['StateName'];?></td> -->
                  <td><?php  echo $row['CityName'];?></td>
                  <td><?php  echo $row['CreationDate'];?></td>
                  <td><a href="view-food-details.php?foodid=<?php echo $row['ID'];?>" style="color: blue;">View Details </a>
                </tr>
               <?php 
// $cnt=$cnt+1;
  }
}?>
              </tbody>
            </table>
          </div>
<!--         <div class="col-md-6">
				  <nav>
				  <ul class="pagination pagination-lg">
					<li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
				  </ul>
				  </nav>
				
			 </div> -->
	</div>
</div>
<!-- //typo-page -->
<?php include_once("includes/footer.php");?>
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->



<script>
  function filterTable() {
  // Variables
  let dropdown, table, rows, cells, district, filter;
  dropdown = document.getElementById("districtDropdown");
  table = document.getElementById("myTable");
  rows = table.getElementsByTagName("tr");
  filter = dropdown.value;

  // Loops through rows and hides those with countries that don't match the filter
  for (let row of rows) { // `for...of` loops through the NodeList
    cells = row.getElementsByTagName("td");
    district = cells[5] || null; // gets the 2nd `td` or nothing
    // if the filter is set to 'All', or this is the header row, or 2nd `td` text matches filter
    if (filter === "Select District" || !district || (filter === district.textContent)) {
      row.style.display = ""; // shows this row
    }
    else {
      row.style.display = "none"; // hides this row
    }
  }
}

</script>


</body>
</html>