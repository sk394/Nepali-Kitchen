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
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">FAQ</h1>
    <p class="lead">Frequently Asked Questions</p>
    
  </div>
</div>

<br>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <!-- FAQ 1: Where is Nepali Kitchen located? -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Where is Nepali Kitchen located?
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              Nepali Kitchen is situated in Akron, Ohio, United States.
            </div>
          </div>
        </div>

        <!-- FAQ 2: What is Nepali Kitchen known for? -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                What is Nepali Kitchen known for?
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              Nepali Kitchen is renowned for its authentic Nepali dishes, including daal bhat, momo (Nepali dumplings), samosa, pakauda, chatpat, and more.
            </div>
          </div>
        </div>

        <!-- FAQ 3: What are the opening hours of Nepali Kitchen? -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                What are the opening hours of Nepali Kitchen?
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
              Nepali Kitchen is open from Monday to Saturday, with operating hours from 10 AM to 8 PM. The restaurant is closed on Sundays.
            </div>
          </div>
        </div>

        <!-- FAQ 4: Do I need to make a reservation? -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingFour">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Do I need to make a reservation?
              </a>
            </h4>
          </div>
          <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
              Reservations are not usually required as the restaurant tends to be slow. However, if you prefer, you can make reservations by calling the restaurant directly.
            </div>
          </div>
        </div>

        <!-- FAQ 5: Is Nepali Kitchen available for takeout and delivery? -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingFive">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Is Nepali Kitchen available for takeout and delivery?
              </a>
            </h4>
          </div>
          <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
            <div class="panel-body">
              Yes, both takeout and delivery options are available. You can order through delivery platforms such as UberEats and DoorDash.
            </div>
          </div>
        </div>

        <!-- FAQ 6: Is parking available? -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingSix">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Is parking available?
              </a>
            </h4>
          </div>
          <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
            <div class="panel-body">
              Yes, there is parking available for customers.
            </div>
          </div>
        </div>

        <!-- FAQ 7: What payment methods are accepted? -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingSeven">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                What payment methods are accepted?
              </a>
            </h4>
          </div>
          <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
            <div class="panel-body">
              Both cash and card payments are accepted at Nepali Kitchen.
            </div>
          </div>
        </div>

        <!-- FAQ 8: Does Nepali Kitchen offer catering services? -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingEight">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                Does Nepali Kitchen offer catering services?
              </a>
            </h4>
          </div>
          <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
            <div class="panel-body">
              No, catering services are not provided.
            </div>
          </div>
        </div>

        <!-- FAQ 9: Can events be hosted at Nepali Kitchen? -->
        <div class="panel panel-default">
          
                    <div class="panel-heading" role="tab" id="headingNine">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                Can events be hosted at Nepali Kitchen?
              </a>
            </h4>
          </div>
          <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
            <div class="panel-body">
              Yes, events can be hosted at Nepali Kitchen.
            </div>
          </div>
        </div>

        <!-- FAQ 10: How can I contact Nepali Kitchen? -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTen">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                How can I contact Nepali Kitchen?
              </a>
            </h4>
          </div>
          <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
            <div class="panel-body">
              You can contact Nepali Kitchen by phone, as the number is listed on the website. Alternatively, you can reach out via email or through social media platforms such as Facebook or Instagram.
            </div>
          </div>
        </div>

        <!-- FAQ 11: Is there a dress code at Nepali Kitchen? -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingEleven">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                Is there a dress code at Nepali Kitchen?
              </a>
            </h4>
          </div>
          <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEleven">
            <div class="panel-body">
              No, there is no dress code required for the restaurant.
            </div>
          </div>
        </div>

        <!-- FAQ 12: Are there vegetarian or vegan options available? -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwelve">
            <h4 class="panel-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                Are there vegetarian or vegan options available?
              </a>
            </h4>
          </div>
          <div id="collapseTwelve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwelve">
            <div class="panel-body">
              No, there are no vegetarian or vegan options available at Nepali Kitchen.
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>



<?php 
    include('partials_front/footer.php'); 
?>