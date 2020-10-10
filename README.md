# Table of content

-   **[About](#about)**
-   **[Features](#features)**
-   **[Entity Relationship Diagram](#entity-relationship-diagram)**
-   **[Use It Locally](#use-it-locally)**
-   **[Screenshots](#screenshots)**

<a name="about"></a>

# About

I built this website in 2019 for my "bachelor's degree final project".

this website is created using the LAMP stack. It is dedicated to students and professors at Moroccan universities, and, it contains two main parts: a _**Classroom**_ and a _**Forum**_.

<a name="features"></a>

# Features

students and professors can create accounts, login, and logout

-   The **Classroom**'s features:
    -   Students and professors must choose their universities
    -   Professors can create classes (small rooms) in their universities, where they will be posting/uploading documents for courses, home works, etc
    -   Students can subscribe to classes and start seing posts
    -   Students can download the class material (for ex the PDF documents)
    -   Students can discuss a class's post through comments
-   The **Forum**'s features:
    -   This is a question-and-answer based forum
    -   Users (both students and professors) can create/search/follow topics they are interested in
    -   Users can ask questions about a topic and answer questions
    -   Each user will have a profil, so users can track each other (How many topics a user follows? Which questions they asked? What answres they gave? etc)

<a name="entity-relationship-diagram"></a>

# Entity Relationship Diagram

![Markdown Logo](screenshots/db.png)

<a name="use-it-locally"></a>

# Use It Locally

ps: you will need to have php, mysql and a webserver installed (you can use XAMPP)

```
# download the project
# move it to the webserver directory (htdocs or www)
# create a database named: project
# import project.sql into it
# start XAMPP
# go to: localhost/project/
```

<a name="screenshots"></a>

# Screenshots

website's home page
![Markdown Logo](screenshots/1-home.png)

university's profile
![Markdown Logo](screenshots/2-univ-Screenshot-20201010162748-766x783.png)

class's profile
![Markdown Logo](screenshots/3-class1-Screenshot-20201010162803-767x803.png)

class post's profile
![Markdown Logo](screenshots/4-post-Screenshot-20201010162847-767x756.png)

pdf document to read online or download
![Markdown Logo](screenshots/5-pdf-Screenshot-20201010163200-1352x540.png)

login and registration forms
![Markdown Logo](screenshots/6-login_and_registration.png)

forum's home page
![Markdown Logo](screenshots/7-forum-home.png)

topic's profile
![Markdown Logo](screenshots/8-topic-home.png)

question's profile
![Markdown Logo](screenshots/9-question_home.png)

user's profile
![Markdown Logo](screenshots/10-profile.png)
