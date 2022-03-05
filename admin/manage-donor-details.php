<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } else{

?>


<!DOCTYPE html>
<head>
<title>Re Food Share || Food Donor Details </title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<?php include_once('includes/header.php');?>
<!--header end-->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Food Donor Details
    </div>
    <div>
      <table id="myTable" class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
    
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>

      <br>
        <div> <select id="districtDropdown" oninput="filterTable()">
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
</select></div><br>
        <thead>
          <tr>
            <!-- <th data-breakpoints="xs">S.NO</th> -->
            <th>Full Name</th>
   <th>Mobile Number</th>
   <th>District</th>
   <th>Email</th>

            <th>Registration Date</th>
          
          </tr>
        </thead>
        <?php
$ret=mysqli_query($con,"select * from  tbldonor");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
        <tbody>
          <tr data-expanded="true">
            <!-- <td><?php echo $cnt;?></td> -->
              
                  <td><?php  echo $row['FullName'];?></td>
                 <td><?php  echo $row['MobileNumber'];?></td>
                 <td><?php  echo $row['District'];?></td>
                 <td><?php  echo $row['Email'];?></td>
                  <td><?php  echo $row['RegDate'];?></td>
                 
                </tr>
                <?php 
// $cnt=$cnt+1;
}?>
 </tbody>
            </table>
            
            
          
    </div>
  </div>
</div>
</section>
 <!-- footer -->
		 <?php include_once('includes/footer.php');?>  
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>


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
    district = cells[2] || null; // gets the 2nd `td` or nothing
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
<?php }  ?>