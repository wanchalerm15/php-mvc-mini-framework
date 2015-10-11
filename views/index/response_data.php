<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Response Datas Month</title>
</head>
<body>
	<h3>Month Information</h3>
	<table border="1" width="200">
		<thead>
			<tr>
				<th>#</th>
				<th>Month</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$index = 1; 
			foreach($month as $m) 
			{
				echo "
				<tr align='center'>
					<td>$index</td>
					<td>$m</td>
				</tr>";
				$index ++;
			}
			?>
		</tbody>
	</table>
</body>
</html>