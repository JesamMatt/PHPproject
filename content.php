<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if (isset($_GET['subj'])) {
	$sel_subj = $_GET['subj'];
	$sel_page = "";

} elseif (isset($_GET['page'])) {
	$sel_subj = "";
	$sel_page = $_GET['page'];
} else {
	$sel_subj = "";
	$sel_page = "";

}

$sel_subject = get_subject_by_id($sel_subj); 



?>
<?php include("includes/header.php"); ?>
		<table id="structure">
			<tr>
				<td id ="navigation">
					<ul class="subjects">
					
					<?php
					//3. perform Dbase query
					
					$subject_set = get_all_subjects();


					//4. use the returnrd data
					while ($subject = mysql_fetch_array($subject_set)) {
						echo "<li";
						if ($subject["id"] == $sel_subj) {
						echo " class=\"selected\"";}

						echo "><a href=\"content.php?subj=" . urlencode($subject["id"]) . "\">{$subject["menu_name"]}</a></li>"; //inline substitution var sub into a double quoted string
                        

					$page_set = get_pages_for_subject($subject["id"]);


					echo "<ul class=\"pages\">"; // CHECK WITH SINMGLE STRING

					//4. use the returnrd data
					while ($page = mysql_fetch_array($page_set)) {
						echo "<li";
						if ($page["id"] == $sel_page) {
						echo " class=\"selected\"";}
						
						echo "><a href=\"content.php?page=" . urlencode($page["id"]) . "\">{$page["menu_name"]}</a></li>"; //inline substitution var sub into a double quoted string
					}

					echo "</ul>";
					}

					?>
				</ul>
					</td>
					<td id ="page">
						<h2><?php echo $sel_subject['menu_name']; ?></h2> 
						<br />
						<?php echo $sel_page; ?><br />

					

					
				</td>
			</tr>


		</table>
		<?php require("includes/footer.php"); ?>

		




