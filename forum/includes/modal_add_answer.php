<!-- the modal that contains the form to add an answer to a question -->
<div class="modal fade" id="writeAnswerModal">
	<div class="modal-dialog">
		<div class="modal-content">

		    <!-- Modal Header -->
		    <div class="modal-header">
		        <h4 class="modal-title">votre réponse:</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>

	      	<!-- Modal body -->
	      	<div class="modal-body">
	        	<form action="./includes/add_answer.php" method="post" class="form-group">
		        	<textarea class="form-control" name="answer" placeholder="<?= $question_row['question_content'] ?> "></textarea>
					
					<button type="submit" class="btn btn-primary" name="submit_answer" value="<?= $question_row['question_id'] ?>"> valider </button>
	        	
	        	</form>
	      	</div>

	     	 <!-- Modal footer -->
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	    	</div>

		</div>
	</div>
</div>