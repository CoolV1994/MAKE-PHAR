<?php
// Usage - Command Line
// php make-phar.php [PHAR-FILE] [SRC-DIR] [STUB] (STUB-WEB)
// Example:
// php make-phar.php Archive.phar src index.php

$pharPath = __DIR__ . '/';
$pharFile = $argv[0];
$pharSrc = $argv[1];
$pharIndex = $argv[2];
$pharIndexWeb = $argv[3];

// Clean up existing file
if (file_exists($pharPath.$pharFile)) {
  echo "File Exists: $pharPath$pharFile".PHP_EOL;
  if (!unlink($pharPath.$pharFile)) {    
    die("Error: Delete File");
  }
}

// Create PHAR
echo "PATH: $pharPath".PHP_EOL;
echo "PHAR: $pharFile".PHP_EOL;
echo "SRC: $pharSrc".PHP_EOL;
echo "STUB: $pharIndex | $pharIndexWeb".PHP_EOL;
try {
  $phar = new Phar($pharPath.$pharFile, $pharFileOpts, $pharFile);
  // Start PHAR Write
  $phar->startBuffering();
  // Add all files from your source directory
  $phar->buildFromDirectory($pharPath.$pharSrc);
  // Create PHAR Stub File
  $phar->setDefaultStub($pharIndex, $pharIndexWeb);
  // End PHAR Write
  $phar->stopBuffering();
  echo "PHAR Created".PHP_EOL;
} catch (UnexpectedValueException $e) {
  die($e);
} catch (BadMethodCallException $e) {
  die($e);
}
