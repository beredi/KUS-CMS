<?php
function customEncrypt($string){
    // Store the cipher method
    $ciphering = "AES-128-CTR";

    // Use OpenSSl Encryption method
    $options = 0;

    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1234567891011121';

    // Store the encryption key
    $encryption_key = "EjfFxV0aL+A.";

    return openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);
}

function customDecrypt($encryption){
    $ciphering = "AES-128-CTR";
    // Non-NULL Initialization Vector for decryption
    $decryption_iv = '1234567891011121';
    $options = 0;

    // Store the decryption key
    $decryption_key = "EjfFxV0aL+A.";

    // Use openssl_decrypt() function to decrypt the data
    return openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
}
?>