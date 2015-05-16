<?php

//////////////////////// Functions ////////////////////////
	function send_message($message) {
		return $mailer->send($message);
	}

	function PDOConnect($host, $database, $user, $password) {
		$dns = 'mysql:dbname='.$database.";host=".$host;
		$pdo = new \PDO($dns, $user, $password, [
			\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			\PDO::ATTR_PERSISTENT => TRUE,
		]);
		$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		
		return $pdo;
	}
////////////////////////////////////////////////////////////

	$pdo = PDOConnect('localhost', 'cl_db', 'root', 'mescalito1');
	
	//array for storage result
	$rows = [];
	
	$statement = $pdo->prepare('SELECT * FROM `data`');
	$statement->execute();

	foreach ($statement->fetchAll(\PDO::FETCH_ASSOC) as $row) {
		array_push($rows, $row);
	}
?>
<html !DOCTYPE>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<table class="values-table">
			<tr>
				<td class="td-mid">Record ID</td>
				<td class="td-mid">Name</td>
				<td class="td-mid">Surname</td>
				<td class="td-mid">Email</td>
				<td class="td-mid">Attachment Location</td>
				<td class="td-mid">Message Date</td>
			</tr>
			<?php if (count($rows)):?>
				<?php $i = 1;?>
				<?php foreach ($rows as $row):?>
				<tr>
					<td class="value"><?php echo $row['recordID']?></td>
					<td class="value"><?php echo $row['name']?></td>
					<td class="value"><?php echo $row['surname']?></td>
					<td class="value"><a href="" onclick="window.open('send-form.php?email=<?php echo $row['email'];?>', 'newwindow', 'width=500, height=350'); return false;"><?php echo $row['email']?></td>
					<td class="value"><?php echo $row['attachmentPath']?></td>
					<td class="value"><?php echo $row['date']?></td>
				</tr>
				<?php $i++?>
				<?php endforeach?>
			<?php else:?>
				<tr>
					<td class="value" colspan="2">No records found</td>
				</tr>
			<?php endif?>
		</table>
	</body>
</html>
