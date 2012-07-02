<?php

$output = "

Dear $username,

Thank you for registering for the $_CONF[site_name]. Before we can activate your account one last step must be taken to complete your registration!

Please note - you must complete this last step to become a registered member. You will only need to click on the link once, and your account will be updated.

To complete your registration, click on the link below: 

$activation_url 

<a href=\"$activation_url\">AOL Users click Here to be Activated</a>

If you are having problems signing up please contact a member of our support staff or an administrator at $_CONF[support_email]

Thanks very much,

$_CONF[email_sig]

"; ?>