<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Implement email sending logic here
    // For example, using the mail() function:
    $to = 'akashselva200@gmail.com';
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(['message' => 'Your message has been sent successfully!']);
    } else {
        echo json_encode(['message' => 'Failed to send your message. Please try again later.']);
    }
} else {
    echo json_encode(['message' => 'Invalid request method.']);
}
?>

