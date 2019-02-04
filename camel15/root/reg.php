<?php

include("form.html");
// Receiving variables
@$pfw_ip= $_SERVER['REMOTE_ADDR'];
@$Title = addslashes($_POST['Title']);
@$first_name = addslashes($_POST['first_name']);
@$sur_name = addslashes($_POST['sur_name']);
@$gender = addslashes($_POST['gender']);
@$email = addslashes($_POST['email']);
@$address = addslashes($_POST['address']);
@$title_of_the_presentation = addslashes($_POST['title_of_the_presentation']);
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

//Sending Email to form owner
$pfw_header = "From: $sur_name\n"
  . "Reply-To: $sur_name\n";
$pfw_subject = "CAMEL registration";
$pfw_email_to = "camel15@quantum-bg.org";
$pfw_message = "Visitor's IP: $pfw_ip\n"
. "Title: $Title\n"
. "first_name: $first_name\n"
. "sur_name: $sur_name\n"
. "gender: $gender\n"
. "email: $email\n"
. "address: $address\n"
. "title_of_the_presentation: $title_of_the_presentation\n"
. "abstract: $abstract\n"
. "comments: $comments\n";
@mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;


//Sending Email to svetljo@gmail.com
$pfw_header = "From: $sur_name\n"
  . "Reply-To: $sur_name\n";
$pfw_subject = "CAMEL registration";
$pfw_email_to = "svetljo@gmail.com";
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
@mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;


//Sending Email to genko.genov@gmail.com
$pfw_header = "From: $sur_name\n"
  . "Reply-To: $sur_name\n";
$pfw_subject = "CAMEL transport information";
$pfw_email_to = "genko.genov@gmail.com";
//
$pfw_message = 
"Title: $Title\n"
. "first_name: $first_name\n"
. "sur_name: $sur_name\n"
. "email: $email\n"
. "comments: $comments\n";
@mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;


//Sending auto respond Email to visitor

$pfw2_header = "From: CAMEL";
$pfw2_subject = "CAMEL registration successful";
$pfw2_email_to = "$email\n ";
$pfw2_message = "Thank you for your abstract submission for CAMEL workshop. The following form was sent to us : "
."
"
."
"
. "Title: $Title\n"
. "first_name: $first_name\n"
. "sur_name: $sur_name\n"
. "gender: $gender\n"
. "email: $email\n"
. "address: $address\n"
. "title_of_the_presentation: $title_of_the_presentation\n"
. "abstract: $abstract\n"
. "comments: $comments\n"
. "Please do not reply to this email, it is automatic respond. "
. "If you want to contact us for further information, please write us at the following address camel15@quantum-bg.org ";
@mail(@$email, $pfw2_subject ,$pfw2_message ,$pfw2_header ) ;


 echo("<p align='center'><font face='Arial' size='3' color='#FF0000'>Your registration form was successfully sent</font></p>");
?>

