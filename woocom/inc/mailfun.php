<?php

$multiple_recipients = array(
    'recipient1@example.com',
    'recipient2@foo.example.com'
);
$subj = 'The email subject';
$body = 'This is the body of the email';
wp_mail( $multiple_recipients, $subj, $body );