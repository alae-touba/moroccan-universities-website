<?php

function confirmQuery($result) {
    global $connection;

    if (!$result) {
        die('query failed ! ' . mysqli_error($connection));
    }

}

function displayUserName($user_id) {
    global $connection;

    $query = "SELECT * FROM users WHERE user_id = '$user_id' ";
    $select_user = mysqli_query($connection, $query);
    confirmQuery($select_user);

    $user_row = mysqli_fetch_assoc($select_user);

    return $user_row['user_firstname'] . ' ' . $user_row['user_lastname'];
}

function displayUniversityName($university_id) {
    global $connection;

    $query = "SELECT university_name FROM universities WHERE university_id = '$university_id' ";
    $select_university = mysqli_query($connection, $query);
    confirmQuery($select_university);

    $university_row = mysqli_fetch_assoc($select_university);

    return $university_row['university_name'];
}

// link to user's profile 
function linkToUserProfile($user_id) {
    $place = basename(dirname($_SERVER['PHP_SELF']));

    if ($place === 'forum') {
        return '../profile.php?id=' . $user_id;
    } elseif ($place === 'project') {
        return './profile.php?id=' . $user_id;
    }

}

// does the user follow the topic or not?
function topicAlreadyFollowed($user_id, $topic_id) {
    global $connection;

    $query = "SELECT * FROM following_topics WHERE user_id = '$user_id' AND topic_id = '$topic_id' ";
    $select_following = mysqli_query($connection, $query);
    confirmQuery($select_following);

    return mysqli_num_rows($select_following) === 0 ? false : true;
}

// does the user follow the class or not?
function classAlreadyFollowed($user_id, $class_id) {
    global $connection;

    $query = "SELECT * FROM following_classes WHERE user_id = '$user_id' AND class_id = '$class_id' ";
    $select_following = mysqli_query($connection, $query);
    confirmQuery($select_following);

    return mysqli_num_rows($select_following) === 0 ? false : true;
}

//nombre des abbonés pour un topic
// number of topics's followers
function numFollowers($topic_id) {
    global $connection;
    $query = "SELECT topic_following FROM topics WHERE topic_id = '$topic_id' ";
    $select_following_num = mysqli_query($connection, $query);
    $topic_row = mysqli_fetch_assoc($select_following_num);

    return $topic_row['topic_following'];
}

// return (user has an image) ?  image name : empty image ;
function displayUserImageName($user_id) {
    global $connection;

    $query = "SELECT * FROM users WHERE user_id = '$user_id' ";
    $select_user = mysqli_query($connection, $query);
    confirmQuery($select_user);

    $user_row = mysqli_fetch_assoc($select_user);
    $user_image = $user_row['user_image'];

    $place = basename($_SERVER['PHP_SELF']);

    if (!empty($user_image)) {

        return 'users_images/' . $user_image;

    } else {

        if ($place === 'profile.php') {
            return 'icons/iconfinder_profile-filled_299075.png';
        } else {
            return 'icons/user64px.png';
        }

    }

}

//meme chose que ^
function displayTopicImageName($topic_id) {
    global $connection;

    $query = "SELECT * FROM topics WHERE topic_id = '$topic_id' ";
    $select_topic = mysqli_query($connection, $query);
    confirmQuery($select_topic);

    $topic_row = mysqli_fetch_assoc($select_topic);
    $topic_image = $topic_row['topic_image'];

    if (!empty($topic_image)) {
        return 'topics_images/' . $topic_image;
    } else {
        return 'topics_images/rsz_topic_mobile_header.png';
    }

}

function displayPostTypeInFrench($post){
    if ($post === "course"){
        return "cour";
    } 

    if ($post === "home_work"){
        return "devoir";
    }

    return "annonce";
}

function displayUserProfileInFrench($profile){
    if ($profile === "professor"){
        return "professeur";
    } else if ($profile === "student"){
        return "etudiant";
    }

    return "";

}