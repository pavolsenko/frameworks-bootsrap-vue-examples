<?php

function sendMail() {
    try {
        $postBody = json_decode(file_get_contents('php://input'), true);

        $email = htmlspecialchars($postBody['email']);
        $subject = htmlspecialchars($postBody['subject']);
        $message = htmlspecialchars($postBody['message']);

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Content-Type: application/json');

        if (!$email) {
            throw new InvalidArgumentException('Email is empty');
        }

        if (!$subject) {
            throw new InvalidArgumentException('Subject is empty');
        }

        if (!$message) {
            throw new InvalidArgumentException('Message is empty');
        }

        $headers = 'From: kurzhtml@webtip.sk';

        $wasSent = mail(
            $email,
            $subject,
            $message,
            $headers,
        );

    } catch (Exception $e) {
        echo '{"status": "error", "message": "' . $e->getMessage() . '"}';
        return;
    }

    if (!$wasSent) {
        echo '{"status": "error", "message": "Sorry, something went wrong. Unable to send email."}';
        return;
    }

    echo '{"status": "success", "message": "Mail successfully sent to \'' . $email . '\'"}';
}

sendMail();
