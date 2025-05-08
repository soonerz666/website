<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = strip_tags(trim($_POST["message"]));

    // Set your email address here
    $to = "sionnampl3@gmail.com";

    // Set the email subject
    $email_subject = "New Contact Form Submission from Your Website";
    if (!empty($subject)) {
        $email_subject .= ": $subject";
    }

    // Build the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Build the email body
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    if (!empty($subject)) {
        $email_body .= "Subject: $subject\n";
    }
    $email_body .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to a thank you page
        header("Location: thank_you.html");
        exit();
    } else {
        // Handle the error - you might want to display an error message on the page
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // If someone tries to access the script directly, redirect them
    header("Location: contact.html");
    exit();
}
?>