<?php

// Start a Session
use Plasticbrain\FlashMessages\FlashMessages;

if (!session_id()) @session_start();
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/functions.php';
$_FLASH = new FlashMessages();
