<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "you@yourdomain.com";
    $email_subject = "Your email subject line";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

Thank you for contacting us. We will be in touch with you very soon.

<?php

}
?>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">



  </script> <!--jquery-->
  <title>Alex Castaneda</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <figure id="mouse-pointer"></figure>

  <div class= "nap">
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"> <img class="dog"src="ac.png" alt="">

      </a>
      <ul class="right hide-on-med-and-down">
        <li><a href="http://sulley.cah.ucf.edu/~al174346/portfoliosite/page_index.html">home</a></li>
          <li><a href="contact.php">Contacts</a></li>
            <li><a href="http://sulley.cah.ucf.edu/~al174346/portfoliosite/portfolio.html">Media</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="http://sulley.cah.ucf.edu/~al174346/portfoliosite/page_index.html">home</a></li>
           <li><a href="contact.php">Contacts</a></li>
             <li><a href="http://sulley.cah.ucf.edu/~al174346/portfoliosite/portfolio.html">Media</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </div>


  </nav>

   <div class="section no-pad-bot" id="index-banner">
    <div class="section no-pad-bot">

    </div>

  </div>


  <div class="container">
    <form name="contactform" method="post" action="send_form_email.php">
<table width="450px">
<tr>
 <td valign="top">
  <label for="first_name">First Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="first_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="last_name">Last Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="last_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">Email Address *</label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Telephone Number</label>
 </td>
 <td valign="top">
  <input  type="text" name="telephone" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="comments">Comments *</label>
 </td>
 <td valign="top">
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 </td>
</tr>
<tr>
 <td colspan="2" style="text-align:center">
  <input type="submit" value="Submit">   <a href="contact.php">Email Form</a>
 </td>
</tr>
</table>
</form>
  </div>




  <div class="container">
    <div class="section">

      <div class="row">


		</div>



      </div>

    </div>
  </div>




  <footer class="page-footer #bdbdbd grey lighten-1 ">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">

          <li style="list-style-type:none"> acastaneda.orlando4@gmail.com</li>
          <li style="list-style-type:none">Alex Gelion Castaneda © 2018</li>


        </div>
        <div class="col l3 s12">

        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Follow me</h5>
          <ul>
            <li><a class="white-text" href="https://www.linkedin.com/in/alex-castaneda-bb3046152/">linkedin</a></li>


            <li><a target="_blank" class="white-text" href="https://www.w3schools.com">
            <img src="facebook.png" alt="Go to W3Schools!" width="42" height="42" >
            </a>


            <a  target="_blank" class="white-text"href="https://twentyfourblazin.tumblr.com/">
            <img src="Tumblr_icon.png" alt="Go to W3Schools!" width="42" height="42" >
            </a>

            <a  target="_blank" class="white-text"href="https://www.instagram.com/acastaneda.orlando4/">
            <img src="insta.jpg" alt="Go to W3Schools!" width="42" height="42" >
            </a>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright teal">
      <div class="container">

      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>





      $(function() {
   $("#red").click(function(){
     $("#main-div").removeClass();
     $("#main-div").addClass("red");
   });
   $("#blue").click(function(){
     $("#main-div").removeClass();
     $("#main-div").addClass("blue");
   });
 });

      </script>
      <script type="text/javascript">
      $(document).ready(function() {
    // grab the initial top offset of the navigation
      var stickyNavTop = $('.nap').offset().top;

      // our function that decides weather the navigation bar should have "fixed" css position or not.
      var stickyNav = function(){
        var scrollTop = $(window).scrollTop(); // our current vertical position from the top

        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        if (scrollTop > stickyNavTop) {
            $('.nap').addClass('sticky');
        } else {
            $('.nap').removeClass('sticky');
        }
    };

    stickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
      stickyNav();
    });
  });


      </script>
  </body>
</html>
