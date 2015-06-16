<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Users</title>
</head>
<body>
	<h1>Users</h1>
	<ul>
		<?php
			if (!empty($users)) {
				foreach ($users as $user) {
					echo "<li>Name: ".$user->user_name."; Email: ".$user->user_email."</li>";
				}
			}
		?>
	</ul>

</body>
</html>