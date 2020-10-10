<!-- script that displays the answers given in the forum-->

<table class="table">
	<thead>
		<tr>
			<th class="forum-infos-title">réponses:</th>
		</tr>
	</thead>
	<tbody>
		
		<?php
			$user_id = $the_user_id;
			$query = "SELECT * FROM answers WHERE answer_user_id = '$user_id' ";
			$select_answers = mysqli_query($connection, $query);
			confirmQuery($select_answers);

			$result = mysqli_num_rows($select_answers);
		?>

		<?php if( $result === 0 ): ?>

			<tr>
				<td>
					<h4 class="text-info">
						<img src="./pictures/icons/infoIcon24px.png">
						<?php if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] == $the_user_id): ?>
							vous n'avez repondus a aucune question dans le forum

						<?php else: ?>
							cet utilisateur n'a repondu a aucune question
						<?php endif; ?>
					</h4>
				</td>
			</tr>
		
		<?php else: ?>
			
			<?php while( $answer_row = mysqli_fetch_assoc($select_answers) ): ?> <!-- we loop through all answers -->
				
				<?php
					//selectign the question
					$question_id = $answer_row['answer_question_id'];
					$query = "SELECT * FROM questions WHERE question_id = '$question_id' ";
					$select_question = mysqli_query($connection, $query);
					confirmQuery($select_question);
					$question_row = mysqli_fetch_assoc($select_question)
				?>

				<tr>
					<td>
						<a href="./forum/question.php?id=<?= $question_id ?>">
							<p><p class=" h4 font-weight-bold"> <?= $question_row['question_content'] ?> </p></p>
						</a>
						<span class="text-muted"> <img src="./pictures/icons/timeIcon.png">  <?= $answer_row['answer_creation_date'] ?> </span>
						
						<p class="lead h6" style="color:  #373b46 ;">
							<?= $answer_row['answer_content'] ?>
						</p>
					</td>
				</tr>
			
			<?php endwhile; ?>

		<?php endif; ?>
			
		
	</tbody>
</table>