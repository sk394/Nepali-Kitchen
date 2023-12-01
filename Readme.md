# How to start the project
- Clone the project to your local machine
- Start Wamp Server
- Move all the files to the www nepali_kitchen folder
- Open phpmyadmin and create a database named `nepali_kitchen`
- Change your username and password in the connection.php file (while pushing, u can keep it empty)
- Paste the mysql code into the newly created database and run it
- Open the browser and type `localhost/nepali_kitchen/index.php`
- You are good to go

# How to contribute
- ``git switch --create <branch_name>``: Create a new branch
- ``git switch <branch_name>``: Switch to the branch
- ``git add .``: Add all the files to the staging area
- ``git commit -am "commit message"``: Commit the changes
- ``git push origin <branch_name>``: Push the changes to the branch
- Create a pull request from the branch to the main branch
- Assign the pull request to the reviewer (if you are not the reviewer)
- Wait for the pull request to be reviewed and merged

# How to use the resuable components and 
# How can you simplify the design process by using Bootstrap 

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepali Kitchen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">  
</head>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
<body>
<?php 
    include('partials_front/header.php');
?>
```
- The above code is the resuable component for the header.
- The cdn links for the bootstrap and jquery are added in this code snippet.
- After ```?>```, you can begin writing normal html code.
- End the code by including the footer component.```<?php include('partials_front/footer.php'); ?>```


## Test Cases
- Username : test
- Password : test123