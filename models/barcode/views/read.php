			<?php
				if(count($rows) >= 1)
				{
			?>
				<table class="listing" border="0" cellspacing="0">
					<?php 
						include_once('read_rows.php'); 
					?>
				</table>
			<?php
				}
				else
				{
					echo "<p>No Records Found.</p>";
				}
			?>

