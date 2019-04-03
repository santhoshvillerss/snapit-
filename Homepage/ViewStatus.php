<div style='margin-left:100px;' class='container'>
<div id="load_data"></div>
<div id="load_data_message"></div>
</div>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<?php


// variable declaration
	$errors = array();
  $email=$_SESSION['username'];
// variable declaration


// connect to database
$db = mysqli_connect('localhost','root','','snap_it!!!');
// connect to database

// query
$query = "SELECT * FROM friends_list WHERE username = '$email' ";
$results = mysqli_query($db, $query);

array_push($errors, $email);

  while($row = mysqli_fetch_array($results))
  {
       if($row['friends']!="")
       {
           array_push($errors, $row['friends']);
       }
  }
	$beforesortusername = array();
	if (count($errors) > 0)
  {
		foreach($errors as $error)
		{
		$createfile = "../images/posted/".$error."/".$error.".txt";
		 $myfile = fopen($createfile, "r") or die("Unable to open file!");
			if ($myfile) {
			 while (!feof($myfile)) {
					 $l = fgets($myfile);
					 $l = preg_replace('~[\r\n]+~', '', $l);
					 array_push($beforesortusername, $l);
					}
				}
			}
		}

	$username = array();
	$cfile = "../images/posted/posted.txt";
	$mfile = fopen($cfile, "r") or die("Unable to open file!");
	if ($mfile)
	{
		while (!feof($mfile))
		{
				$lget = fgets($mfile);
				$lget = preg_replace('~[\r\n]+~', '', $lget);
				foreach($beforesortusername as $luser)
				{
						if($lget===$luser && $lget!='')
						{
						array_push($username, $lget);
					  }
			 }
		 }
	 }
	 $limitcount = count($username);

	 foreach($username as $luser)
	 {
		//	 	echo "hello".$luser."<br>";
	}
?>


<script>

$(document).ready(function(){


 var limit = 2;
 var start = 0;
 var limitcount = <?php echo $limitcount; ?>;
 // alert(limitcount);
 var username = '';
 var username = <?php echo json_encode($username); ?>;
 var action = 'inactive';
 function load_country_data(limit, start)
 {

  $.ajax({
   url:"AjaxViewStatus.php",
   method:"POST",
   data:{limit:limit, start:start ,username:username},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == '')
    {
     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }

 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = limit + 1;
	 limit = limit + 3;
	 //console.log(limit);
	 if(limit > limitcount-1)
	 {
		 limit = limitcount-1;
	 }
	// console.log(limit);
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });

});
</script>





<script type="text/javascript">
function like(id,val) {
  var reference = document.getElementById(id).id;
  if(val == 'like')
   {
        document.getElementById(id).style.backgroundColor = "#ffb3b3";
        document.getElementById(id).value = "liked";
   }
   else
   {
        document.getElementById(id).style.backgroundColor = "transparent";
        document.getElementById(id).value = "like";
   }
   $.ajax({
     url:"Updatelike.php",
     method:"POST",
     data:{reference:reference,val:val},
     dataType:"text"
   });
 }
</script>
