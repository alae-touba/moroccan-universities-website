<!-- script that dipslays the questions asked in the forum -->
<table class="table">
	<thead>
		<tr>
			<th class="forum-infos-title">questions:</th>
		</tr>
	</thead>
	<tbody>

		<?php
			$user_id = $the_user_id;
			$query = "SELECT * FROM questions WHERE question_user_id = '$user_id' ";
			$select_questions = mysqli_query($connection, $query);
			confirmQuery($select_questions);

			$result = mysqli_num_rows($select_questions);
		?>

		<?php if( $result === 0 ): ?>

			<tr>
				<td>
					<h4 class="text-info">
						<img src="./pictures/icons/infoIcon24px.png">
						<?php if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] === $the_user_id ): ?>
							vous n'avez pas posé de question dans le forum
						<?php else: ?>
							cet utilisateur n'a posé aucune question dans le forum
						<?php endif; ?>	
					</h4> 
				</td>
			</tr>

		<?php else:  ?>
			
			<?php while( $question_row = mysqli_fetch_assoc($select_questions) ): ?>

				<?php $question_id = $question_row['question_id']; ?>

				<tr>
					<td>
						<a href="./forum/question.php?id=<?= $question_id ?>">
							<p class="h4"> <?= $question_row['question_content'] ?> </p>
						</a>

						<?php
							//nbre de reponse pour cette questions 
							$query = "SELECT * FROM answers WHERE answer_question_id = '$question_id' ";
							$select_answers = mysqli_query($connection, $query);
							confirmQuery($select_answers);
							$answers_number = mysqli_num_rows($select_answers); 
						?>

						<span class="text-muted"> <small> <?= $answers_number ?> réponses </small> </span>
					</td>
				</tr>
			
			<?php endwhile; ?>

		<?php endif; ?>

	</tbody>
</table>