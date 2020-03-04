<?php

include("form.html");
// Receiving variables
@$pfw_ip= $_SERVER['REMOTE_ADDR'];
@$Title = addslashes($_POST['Title']);
@$first_name = addslashes($_POST['first_name']);
@$sur_name = addslashes($_POST['sur_name']);
@$email = addslashes($_POST['email']);
@$address = addslashes($_POST['address']);
@$title_of_the_presentation = addslashes($_POST['title_of_the_presentation']);
@$presentation = addslashes($_POST['presentation']);
@$abstract = addslashes($_POST['abstract']);
@$comments = addslashes($_POST['comments']);

// Validation
if (strlen($first_name) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid first name</font></p>");
}

if (strlen($sur_name) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid sur name</font></p>");
}

if (! ereg('[A-Za-z0-9_-]+\@[A-Za-z0-9_-]+\.[A-Za-z0-9_-]+', $email))
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid email</font></p>");
}

if (strlen($email) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid email</font></p>");
}

if (strlen($address) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid address</font></p>");
}


//Sending Email to svetljo@gmail.com
$header = "From: $sur_name\n"
  . "Reply-To: $sur_name\n";
$subject = "CAMEL registration";
$to = "svetljo@gmail.com";
//
$message = "\\\\title{" . strtoupper($title_of_the_presentation) . "}\n"
. "% $title_of_the_presentation\n\n"
. "\underline{" . $first_name[0] . ". " . $sur_name . "} \index{" . $sur_name . " " . $first_name[0] . ".} \n"
. "%" . $first_name . " " . $sur_name . "\n\n"
. "{\\\\normalsize{\\\\vspace{-4mm}\n"
. "$address\n\n"
. "$nationality\n\n"
. "\email " . "$email" . "}}\n\n"
. "$abstract\n\n"
. "\\\\vspace{\baselineskip}";
@mail($to, $subject, $message, $header);


//Sending auto respond Email to visitor and genko.genov@gmail.com, vitanov@phys.uni-sofia.bg, camel@quantum-bg.org

$header = "From: CAMEL";
$subject = "CAMEL registration successful";
$to = "$email, genko.genov@gmail.com, vitanov@phys.uni-sofia.bg, camel@quantum-bg.org";
$message = "Thank you for your abstract submission for the CAMEL workshop. The following form was sent to us: "
."
"
."
"
. "Title: $Title\n"
. "first_name: $first_name\n"
. "sur_name: $sur_name\n"
. "email: $email\n"
. "address: $address\n"
. "title_of_the_presentation: $title_of_the_presentation\n"
. "type_of_presentation: $presentation\n"
. "abstract: $abstract\n"
. "comments: $comments\n"
. "Please do not reply to this email, it is automatic respond. "
. "For further information, you can contact us at camel@quantum-bg.org ";
@mail($to, $subject, $message, $header);


 echo("<p align='center'><font face='Arial' size='3' color='#FF0000'>Your registration form was successfully sent. The confirmation message may be in your spam folder.</font></p>");
?>