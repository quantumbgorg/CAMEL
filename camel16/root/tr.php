<?php
// include("trform.html");
// Receiving variables
@$pfw_ip= $_SERVER['REMOTE_ADDR'];
@$name = addslashes($_POST['name']);
@$email = addslashes($_POST['email']);
@$hotel = addslashes($_POST['hotel']);
@$flight_arrival = addslashes($_POST['flight_arrival']);
@$arriving_from = addslashes($_POST['arriving_from']);
@$arriving_date_ = addslashes($_POST['arriving_date_']);
@$arriving_time_ = addslashes($_POST['arriving_time_']);

@$flight_departure = addslashes($_POST['flight_departure']);
@$departing_to_ = addslashes($_POST['departing_to_']);
@$departing_date_ = addslashes($_POST['departing_date_']);
@$departing_time_ = addslashes($_POST['departing_time_']);

// Validation
if (strlen($name) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid name</font></p>");
}

if (! ereg('[A-Za-z0-9_-]+\@[A-Za-z0-9_-]+\.[A-Za-z0-9_-]+', $email))
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid email</font></p>");
}

if (strlen($email) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid email</font></p>");
}

if (strlen($flight_arrival) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid arrival flight number</font></p>");
}

if (strlen($flight_departure) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid departure flight number</font></p>");
}

if (strlen($arriving_from) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid arriving from</font></p>");
}

if (strlen($departing_to_) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid departing to</font></p>");
}

if (strlen($arriving_date_) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid arriving date</font></p>");
}

if (strlen($departing_date_) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid departing date</font></p>");
}

if (strlen($arriving_time_) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid arriving time</font></p>");
}

if (strlen($departing_time_) == 0 )
{
die("<p align='center'><font face='Arial' size='3' color='#FF0000'>Please enter a valid departing time</font></p>");
}

//Sending Email to genko.genov@gmail.com, limquet@quantum-bg.org, vitanov@phys.uni-sofia.bg
$pfw_header = "From: $name\n"
  . "Reply-To: $name\n";
$pfw_subject = "CAMEL16 transportation form";
$pfw_email_to = "genko.genov@gmail.com, camel16@quantum-bg.org, vitanov@phys.uni-sofia.bg";
$pfw_message = "Visitor's IP: $pfw_ip\n"
."
"
. "name: $name\n"
. "email: $email\n"
. "accomodated at Hotel: $hotel\n"
."
"
. "flight_arrival: $flight_arrival\n"
. "arriving_from: $arriving_from\n"
. "arriving_date_: $arriving_date_\n"
. "arriving_time_: $arriving_time_\n"
."
"
. "flight_departure: $flight_departure\n"
. "departing_to_: $departing_to_\n"
. "departing_date_: $departing_date_\n"
. "departing_time_: $departing_time_\n"
."
"
. "If you want to contact us for further information, please write us at the following address camel16@quantum-bg.org ";
@mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;

//Sending auto respond Email to visitor


$pfw2_header = "From: CAMEL16";
$pfw2_subject = "CAMEL16 transportation form successfully sent";
$pfw2_email_to = "$email\n ";
$pfw2_message = "The following transportation form was sent to us: "
."
"
."
"
. "name: $name\n"
. "email: $email\n"
. "accomodated at Hotel: $hotel\n"
."
"
. "flight_arrival: $flight_arrival\n"
. "arriving_from: $arriving_from\n"
. "arriving_date_: $arriving_date_\n"
. "arriving_time_: $arriving_time_\n"
."
"
. "flight_departure: $flight_departure\n"
. "departing_to_: $departing_to_\n"
. "departing_date_: $departing_date_\n"
. "departing_time_: $departing_time_\n"
."
"
. "Please do not reply to this email. "
. "For further information, contact us at camel16@quantum-bg.org";
@mail(@$email, $pfw2_subject ,$pfw2_message ,$pfw2_header ) ;


 echo("<p align='center'><font face='Arial' size='3' color='#FF0000'>Your transportaiton form was successfully sent</font></p>");
?>
