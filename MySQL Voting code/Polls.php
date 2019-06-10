<!DOCTYPE html> 
<html>
	<head>
		<title>Presidential Election</title>
	
<style type="text/css">
	
body {padding:0; margin:0;}

.container {width:1000px; background:White; margin:0 auto; padding:10px;}

img {padding:20px; border-radius:100%; border:4px solid white;}

img:hover {background:orange;}

input {margin:30px;}

</style>
	</head>
	
<body> 

<div style="background:Red; color:Black; text-align:center; width:100%; padding:10px;">
<h1>Which "Candidate" do you believe should be our new President?</h2></div>

<div class="container">

<form action="Polls.php" method="post" align="center">  
	
	<input type="submit" name="Donald" value="Vote For Donald Trump"/> 
	 
	<input type="submit" name="Hillary" value="Vote For Hillary Clinton"/> 
	
	

</form>
<?php 
$con = mysqli_connect("localhost","root","","Voting");


if(isset($_POST['Donald'])){
	
	$vote_Donald = "update Candidates set Donald=Donald+1";
	
	$run_Donald = mysqli_query($con, $vote_Donald);
	
	if($run_Donald){
	
	echo "<h2 align='center'>Your Vote Has Been Cast to Donald Trump!</h2>"; 
	echo "<h2 align='center'><a href='polls.php?results'>View Results</a></h2>";
	
	
	}

}

if(isset($_POST['Hillary'])){
	
	$vote_Hillary = "update Candidates set Hillary=Hillary+1";
	
	$run_Hillary = mysqli_query($con, $vote_Hillary);
	
	if($run_Hillary){
	
	echo "<h2 align='center'>Your Vote Has Been Cast to Hillary Clinton!</h2>"; 
	echo "<h2 align='center'><a href='polls.php?results'>View Results</a></h2>";
	
	}
}

if(isset($_GET['results'])){

	$get_votes = "select * from Candidates";
	
	$run_votes = mysqli_query($con, $get_votes); 
	
	$row_votes = mysqli_fetch_array($run_votes); 
	
	$Donald = $row_votes['Donald'];
	$Hillary = $row_votes['Hillary']; 
	
	$count = $Donald+$Hillary; 
	
	$per_Donald = round($Donald*100/$count) . "%";
	$per_Hillary = round($Hillary*100/$count) . "%";
	
	echo "
	<div style='background:White; padding:10px; text-align:center;'>
		 
		<center>
		<h2>Results So Far:</h2>
		
		<p style='background:Red; color:white; padding:10px; width:500px;'>
		
		<b>Donald Trump:</b> $Donald ($per_Donald)
		
		</p>
		
		<p style='background:Blue; color:white; padding:10px; width:500px;'>
		
		<b>Hillary Clinton:</b> $Hillary ($per_Hillary)
		
		</p>
		
		</center>
	
	</div>
	
	
	";

}

?>

</div>

<div style="background:Blue; color:Black; text-align:center; width:100%; padding:10px;">
<h1>Republicans vs. Democrats
<br> By: Gian Fountain </br>
</h1></div>


</body>
</html>
