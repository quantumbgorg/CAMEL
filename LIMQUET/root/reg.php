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
$pfw_header = "From: $sur_name\n"
  . "Reply-To: $sur_name\n";
$pfw_subject = "LIMQUET School registration";
$to = 'svetljo@gmail.com';
//
$pfw_message = "\\\\title{" . strtoupper($title_of_the_presentation) . "}\n"
. "% $title_of_the_presentation\n\n"
. "\underline{" . $first_name[0] . ". " . $sur_name . "} \index{" . $sur_name . " " . $first_name[0] . ".} \n"
. "%" . $first_name . " " . $sur_name . "\n\n"
. "{\\\\normalsize{\\\\vspace{-4mm}\n"
. "$address\n\n"
. "$nationality\n\n"
. "\email " . "$email" . "}}\n\n"
. "$abstract\n\n"
. "\\\\vspace{\baselineskip}";
@mail($to, $pfw_subject ,$pfw_message ,$pfw_header ) ;


//Sending auto respond Email to visitor and genko.genov@gmail.com, vitanov@phys.uni-sofia.bg, limquet@quantum-bg.org

$pfw2_header = "From: LIMQUET_School";
$pfw2_subject = "LIMQUET School registration successful";
$pfw2_email_to = "$email, genko.genov@gmail.com, vitanov@phys.uni-sofia.bg, limquet@quantum-bg.org";
$pfw2_message = "Thank you for your abstract submission for LIMQUET school. The following form was sent to us: "
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
. "If you want to contact us for further information, please write us at the following address limquet@quantum-bg.org ";
@mail(@$email, $pfw2_subject ,$pfw2_message ,$pfw2_header ) ;


 echo("<p align='center'><font face='Arial' size='3' color='#FF0000'>Your registration form was successfully sent. The confirmation message may be in your spam folder.</font></p>");
?>

