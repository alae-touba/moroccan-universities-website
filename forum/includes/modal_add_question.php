<!-- the modal that contains the form to add a question in this question -->
<div class="modal fade" id="writeQuestionModal">
	<div class="modal-dialog">
		<div class="modal-content">

		    <!-- Modal Header -->
		    <div class="modal-header">
		        <h4 class="modal-title">votre question:</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>

	      	<!-- Modal body -->
	      	<div class="modal-body">
	        	<form action="./includes/add_question.php" method="post" class="form-group">
		        	<textarea class="form-control" name="question" placeholder="Commencez votre question par 'Que', 'Comment' , 'Pourquoi' "></textarea>
					<br>

		        	<input type="text" name="tags" class="form-control" placeholder="qlqs identifiants pour trouver votre question dans la recherche">
					<br>
					
					<button type="submit" class="btn btn-primary" name="submit_question" value="<?= $the_topic_id ?>"> valider </button>
	        	
	        	</form>
	      	</div>

	     	 <!-- Modal footer -->
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	    	</div>

		</div>
	</div>
</div>