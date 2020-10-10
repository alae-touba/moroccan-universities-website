<?php

$user_id = $the_user_id;

//number of quesitions asked
$query = "SELECT * FROM questions WHERE question_user_id = '$user_id' ";
$select_questions = mysqli_query($connection, $query);
confirmQuery($select_questions);
$questions_number = mysqli_num_rows($select_questions);


// number of answers
$query = "SELECT * FROM answers WHERE answer_user_id = '$user_id' ";
$select_answers = mysqli_query($connection, $query);
confirmQuery($select_answers);
$answers_number = mysqli_num_rows($select_answers);

// number of followed topics
$query = "SELECT * FROM following_topics WHERE user_id = '$user_id' ";
$select_topics = mysqli_query($connection, $query);
confirmQuery($select_topics);
$followed_topics_number = mysqli_num_rows($select_topics);


