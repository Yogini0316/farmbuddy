<?php
	require_once 'includes/config.php';
	$type = $_GET['q'];

	$result = mysqli_query($db, "SELECT * FROM subtype");
	echo"<select name=subttype id=select_subtype>";

				$result = mysqli_query($db, "SELECT * FROM subtype, type WHERE subtype.type_id=type.id AND type='$type'");
				while ($row = mysqli_fetch_assoc($result))
				{
					echo "<option value=$row[subtype]>$row[subtype]</option>";
				}

	echo "</select>";


?>