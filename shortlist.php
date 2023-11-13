<?php include 'inc/header.php';

if(!isset($_SESSION['shortlist'])) { ?>

	<div style="background: #; font-size: 2.4em; display: flex; min-height: 90vh; justify-content: center; align-items: center;">
		<div>
			<p>Shortlist is not yet released</p>
			<?php if(isset($_SESSION['is_admin'])){ 
				echo application_release($conn);
			 } ?>
		</div>
	</div>

<?php if(!isset($_SESSION['is_admin'])){ include 'inc/footer.php'; } }
//////////////////////////////////////////////////////////////////////

$applicants=$_SESSION['res']['applicants']; ?>

<style>
	div.shortlist{
		margin: 1em;
	}
	table.shortlist{
		background: #F97CAE;
	}
	h1{
		margin-bottom: .5em;
	}
	.states{
		/*display: flex;*/
		gap: 1em;
		grid-gap: 1em;
		display: grid;
		grid-template-areas: '. . .';
		flex-wrap: wrap;
		margin-top: 3em;
	}
	.states .state{
		display: inline-flex;
		background: rgba(0,0,0,.025);
		border-radius: .3em;
	}
	.states .state:hover{
		background: rgba(0,0,0,.075);
	}
	.states .state a{
		display: block;
		border-radius: inherit;
		flex: 1;
		text-decoration: none;
		padding: .5em;
		color: #666;
	}
</style>
<div class="shortlist">
	<?php if(isset($_SESSION['is_admin'])){ 
		echo application_release($conn);
	 } ?>
	<div class="wrap" style="margin: 0 auto; max-width: 1200px; border: 1px solid transparent; position: relative; background: #fff; padding: 1em;">
		<div>
			<?php

			function showStates($conn, $text=false){
				$output = '<h1 style="background: #fff;">List of shortlisted cadidates for the year '. date('Y') .'</h1>
				<h4>The following states\' candidates were released for the commencement of the physical verification, checkout your name of ID, Congratulation for the successful candidates.</h4>';

				if($text)
				{
					$output .= '<h3>You select an invalid state or the state you select does not have any appoved candidate</h3>';
				}

				$output .= '<div class="states">';
				$sql = $conn->query("SELECT st_id, st_name FROM states ORDER BY st_name");
				while ($row = $sql->fetch_assoc()) {
					$output .= '<div class="state">
						<a href="shortlist.php?state='.preg_replace('/\s/', '-', strtolower($row['st_name'])).'">'.ucfirst($row['st_name']).'</a>
					</div>';
				}
				$output .= '</div>';
				return $output;
			}

			if(!isset($_GET['state'])){
				echo showStates($conn);
			}
			else
			{
				$state='';
				foreach ($_SESSION['res']['states'] as $key => $value) {
					if(preg_replace('/\s/', '-', strtolower($value)) == strtolower($_GET['state']))
					{
						$state=$key;
					}
				}

				if($state == ''){
					echo showStates($conn, true);
				}
				else
				{

					echo '<h1 style="background: #fff;">List of shortlist candidates of '.ucfirst($_SESSION['res']['states'][$state]).' state</h1>';
					$sql = $conn->query("SELECT uid FROM recruitment WHERE state='".$state."' && apply_approve='1' ORDER BY first_name;");
					if($sql->num_rows == 0){
						echo '<br><br><br><br><br>
						<h2 class="date">No approved applicant found!</h2>
						<a href="shortlist.php">Go Back</a>';
					}
					else
					{
						echo '<a href="shortlist.php">Go Back</a> <br><br>

						<table class="table table-bordered" style="background: #fff;">
							<tr>
								<th width="30">S/N</th>
								<th>
									Applicant ID
								</th>
								<th>Applicant\'s Fullname</th>
								<th>Applying for</th>
								<th>State</th>
								<th><i>L.G.A</i></th>
							</tr>';
						$sn=1;
						while ($row = $sql->fetch_assoc()) {
							echo '<tr>
								<td>'.$sn.'</td>
								<td>'.$applicants[$row['uid']]['user_rec_id'].'</td>
								<td>'.strtoupper($applicants[$row['uid']]['fullname']).'</td>
								<td>'.
									(empty($_SESSION['res']['recruitment_level'][$applicants[$row['uid']]['apply_for']]) ? '-' : ucfirst($_SESSION['res']['recruitment_level'][$applicants[$row['uid']]['apply_for']]))
								.'</td> 
								<td>'.
									(empty($_SESSION['res']['states'][$applicants[$row['uid']]['state']]) ? '-' : ucfirst($_SESSION['res']['states'][$applicants[$row['uid']]['state']]))
								.'</td>
								<td>'.
									(empty($_SESSION['res']['lga'][$applicants[$row['uid']]['lga']]['lga_name']) ? '-' : ucfirst($_SESSION['res']['lga'][$applicants[$row['uid']]['lga']]['lga_name']))
								.'</td>
							</tr>';
							$sn++;
						}
						echo '</table>';
						echo '<br><a href="shortlist.php">Go Back</a>';
					}
				}
			}
		 ?>
		</div>
	</div>
</div>

<?php include 'inc/footer.php'; ?>