<?php
class PasswordValidationException extends Exception {}

function validatePassword($password) {
    if (strlen($password) < 8) {
        throw new PasswordValidationException("Password must be at least 8 characters long.");
    }

    if (!preg_match("/[A-Z]/", $password)) {
        throw new PasswordValidationException("Password must contain at least one uppercase letter.");
    }

    if (!preg_match("/\d/", $password)) {
        throw new PasswordValidationException("Password must contain at least one digit.");
    }

    if (!preg_match("/[@#$%]/", $password)) {
        throw new PasswordValidationException("Password must contain at least one special character (@, #, $, %).");
    }

    return true;
}

$password = "Test@123";

try {
    validatePassword($password);
    echo "✅ Password is valid.";
} catch (PasswordValidationException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>

