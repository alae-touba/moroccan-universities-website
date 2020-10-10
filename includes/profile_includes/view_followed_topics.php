<!-- script that displays the followed topics -->
<table class="table">
	<thead>
		<tr>
			<th class="forum-infos-title">topics suivis:</th>
		</tr>
	</thead>
	<tbody>
	
		<?php  
			$user_id = $the_user_id ;
			$query = "SELECT topic_id FROM following_topics WHERE user_id = '$user_id' "; //les ids du topics suivis
			$select_followed_topics = mysqli_query($connection, $query);
			confirmQuery($select_followed_topics);

			$result = mysqli_num_rows($select_followed_topics);
		?>

		<?php if($result === 0): ?> <!-- does not follow any topic -->
			
			<tr>
				<td>
					<h4 class="text-info">
						<img src="./pictures/icons/infoIcon24px.png">
						<?php if ( isset($_SESSION["user_id"]) && $_SESSION["user_id"] === $the_user_id ): ?>
							vous n'étes pas abboné a aucun sujet

						<?php else: ?>
							cet utilisateur ne suit aucun sujet
						<?php endif; ?>

					</h4>
				</td>
			</tr>
			
		<?php else: ?> 

			<?php while( $select_topics_ids_row = mysqli_fetch_assoc($select_followed_topics) ): ?>

				<?php
					$topic_id = $select_topics_ids_row['topic_id'];
					$query = "SELECT * FROM topics WHERE topic_id = '$topic_id' ";
					$select_topic = mysqli_query($connection, $query);
					confirmQuery($select_topic); 
					$topic_row = mysqli_fetch_assoc($select_topic);
				?>

				
				<tr>
					<td>
						<div class="float-left">
							<img src="./pictures/<?= displayTopicImageName($topic_row['topic_id'])  ?>" width="32" height="32" class="rounded">
							<a href="./forum/topic.php?id=<?= $topic_row['topic_id'] ?>">
								<span class="text-left text-capitalize font-weight-bold" style="font-size: 16px;"> <?= $topic_row['topic_name'] ?> </span>
							</a>	
						</div>
					</td>
				</tr>

			<?php endwhile; ?>

		<?php endif; ?>
		
	</tbody>
</table>
