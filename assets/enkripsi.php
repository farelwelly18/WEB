<?php 	
$plaintext = "29";
$cipher_method = 'AES-256-CBC'; // Choose a strong cipher method
$key = 'WellyKesehatan'; // 32 bytes for AES-256
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method)); // Generate a random IV

$encrypted_data = openssl_encrypt($plaintext, $cipher_method, $key, 0, $iv);

// It's crucial to store the IV along with the encrypted data for decryption
$encoded_iv = base64_encode($iv);
$encoded_encrypted_data = base64_encode($encrypted_data);

echo "Encrypted Data: " . $encrypted_data ."<br>";
// echo "Encrypted Data: " . $encoded_encrypted_data . "<br>";
echo "IV: " . $encoded_iv . PHP_EOL;

//====================================================================================
echo "<hr>";
// $encoded_encrypted_data = 'your_encoded_encrypted_data_from_above';
// $encoded_iv = 'your_encoded_iv_from_above';

$cipher_method2 = 'AES-256-CBC'; // Must be the same method used for encryption
$key1 = 'WellyKesehatan'; // Must be the same key used for encryption

// $iv = base64_decode($encoded_iv);
// $encrypted_data = base64_decode($encoded_encrypted_data);

$decrypted_data = openssl_decrypt($encrypted_data, $cipher_method2, $key1, 0, $iv);

echo "Decrypted Data: " . $decrypted_data . PHP_EOL;

 ?>