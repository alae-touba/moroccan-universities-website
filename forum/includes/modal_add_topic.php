<!-- the modal that contains the form to add a topic to the db -->
<div class="modal fade" id="addTopicModal">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">

		    <!-- Modal Header -->
		    <div class="modal-header">
		        <h4 class="modal-title">la nouvelle categorie :</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>

	      	<!-- Modal body -->
	      	<div class="modal-body">
	        	<form action="./includes/add_topic.php" method="post" class="form-group" enctype="multipart/form-data">

		        	<input type="text" name="topic_name" class="form-control" placeholder="nom du categorie"><br>

		        	<textarea name="topic_description" class="form-control" placeholder="description de la categorie"></textarea><br>

					<input type="file" class="form-control-file border" name="topic_image"><br>

					<button type="submit" class="btn btn-primary" name="submit_topic" value=""> valider </button>
	        	
	        	</form>
	      	</div>

	     	 <!-- Modal footer -->
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	    	</div>

		</div>
	</div>
</div>

