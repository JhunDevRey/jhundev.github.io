<?php
  $receiving_email_address = 'consequel@gmail.com';

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = $receiving_email_address;

  // FIX: Use your Gmail as sender (required for SMTP stability)
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];

  $contact->subject = $_POST['subject'];

  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'consequel@gmail.com',
    'password' => 'apej ynhu vemc ymlq',
    'port' => '587'
  );

  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Reply-To Email');
  $contact->add_message(isset($_POST['phone']) ? $_POST['phone'] : '', 'Phone');
  $contact->add_message($_POST['message'], 'Message', 10);

  echo $contact->send();
?>