<!DOCTYPE html>
	<body>
		<head>
			<title>Send email</title>
		</head>
		<?php $email = $_GET["email"];?>
		<form action="send-email.php" method="post">
			<table class="values-table">
				<tr>
					<td>Recipient:</td> <td><input type="text" name="recipient" value="<?php echo $email?>" readonly></td>
				</tr>
				<tr>
					<td>Topic:</td> <td><input type="text" name="topic"></td>
				</tr>
				<tr>
					<td>Body:</td> 
				</tr>
				<tr>
					<td colspan="2"><textarea name="body" style="height:100px; width:240px"></textarea></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Send" style="width:80px"></td>
				</tr>
			</table>
		</form>
	</body>
</html>