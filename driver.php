<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$DB = 'chatbot';

try {
  $conn = new mysqli($host, $user, $pass, $DB);
} catch (Throwable $th) {
  throw $th;
}
