<?php
/*
	Author: Genoud Malorie
	Date: 19.01.2016
	Description: Display the table
*/
?>
<select>
	<option value="5">5</option>
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="50">50</option>
</select>
<div class="row text-center">
	<div class="col-lg-12">
		<ul class="pagination">
			<li>
				<a href="#">&laquo;</a>
			</li>
			<li class="active">
				<a href="#">1</a>
			</li>
			<li>
				<a href="#">2</a>
			</li>
			<li>
				<a href="#">3</a>
			</li>
			<li>
				<a href="#">4</a>
			</li>
			<li>
				<a href="#">5</a>
			</li>
			<li>
				<a href="#">&raquo;</a>
			</li>
		</ul>
	</div>
</div>
<table border='2'>
		<?php
			//Display the title of $tableName
			echo '<tr>';
			foreach($this->titles as $title){
				echo '<th><a href=?order='.$title.'>'.$title.'</a></th>';
			}
			echo '<th>Options</th>';
			echo '</tr>';

			//Display the field for the search
			echo '<tr>';
			echo '<form method=get action=index.php>';
			echo '<input hidden value=search name=action>';
			foreach($this->titles as $title){
					echo '<td><input name='.$title.'></td>';
				}
			echo '<td><input type=submit value=Search></td>';
			echo '</form>';
			echo '</tr>';

			//Display the data of $tableName
			foreach($this->result as $article){
				echo '<tr>';
				foreach($this->titles as $title){
					echo '<td>'.$article[$title].'</td>';
				}
				echo '<td><a>Modifier</a></td>';
				echo '</tr>';
			}
		?>
</table>