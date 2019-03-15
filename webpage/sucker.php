<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	<style type="text/css">
		.submit-button{
			background: grey;
		}
		.submit-button input{
			padding: 10px;

		}
	</style>
	
	<body>

<?php 
if(isset($_POST['submitted'])){ 
	if(isset($_POST['name']) &&isset($_POST['section']) && isset($_POST['credit-card']) && isset($_POST['card'])){
		$data=$_POST['name'].";".$_POST['section'].";".$_POST['credit-card'].";".$_POST['card']."\n";
		file_put_contents('suckers.txt',$data,FILE_APPEND);
		?>
		<h1>Thanks, sucker!</h1>

		<h4>Your information has been recorded.</h4>

		<dl>
			<dt>Name</dt>
			<dd>
				<?=$_POST['name'];?>
			</dd>
			
			<dt>Section</dt>
			<dd>
				<?=$_POST['section'];?>
			</dd>
			
			<dt>Credit Card</dt>
			<dd>
				<?=$_POST['credit-card'];?>
			</dd>
		</dl>
		<h4>Here are all the suckers who have submitted here:</h4>
		<pre><?=file_get_contents("suckers.txt"); ?></pre>
		<div>
			<a href="sucker.php">Back</a>
		</div>
	<?php }else{ ?>
		<h1>Sorry</h1>
		<p>You didn't dill out the form completely. <a href="sucker.php">Try again?</a></p>
	<?php } ?>
	
<?php }else{  ?>

	<h1>Buy Your Way to a Better Education!</h1>

	<p>
		The rough economy, along with recent changes in University of Washington policy, now allow us to offer grades for money.  That's right!  All you need to get a 4.0 in this course is cold, hard, cash.
	</p>
	
	<hr />
	
	<h2>Give Us Your Money</h2>
	<form method="POST" action="sucker.php">
		<dl>
			<dt>Name</dt>
			<dd>
				<input type="text" name="name" required="required" />
			</dd>
			
			<dt>Section</dt>
			<dd>
				<select name='section'>
					<option value="">(Select a section)</option>
					<option value="MA">MA</option>
					<option value="MH">MH</option>
				</select>
			</dd>
			
			<dt>Credit Card</dt>
			<dd>
				<input type="text" name="credit-card" /><br>
				<input type="radio" name="card" value="Visa card" />Visa
				<input type="radio" name="card" value="Master card" />Master card
			</dd>
		</dl>
		
		<div class="submit-button">
			<input type="hidden" name="submitted" value=1>
			<input type='submit' value="I am a giant sucker.">
		</div>
	</form>

<?php } ?>

	</body>
</html>