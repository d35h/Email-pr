<?php
//////////////////////// Functions ////////////////////////
	function PDOConnect($host, $database, $user, $password) {
		$dns = 'mysqli:dbname='.$database.";host=".$host;
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
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<table class="values-table">
			<th>
				<td class="td-mid">field1</td>
				<td class="td-mid">field2</td>
			</th>
			<?php if (count($rows)):?>
				<?php foreach ($rows as $row):?>
				<tr>
					<td class="value"><?php echo $row['field1']?></td>
					<td class="value"><?php echo $row['field2']?></td>
				</tr>
				<?php endforeach?>
			<?php else:?>
				<tr>
					<td class="value" colspan="2">No records found</td>
				</tr>
			<?php endif?>
		</table>
	</body>
</html>
