<?php

$_ENV['LARAVEL_STORAGE_PATH'] = '/tmp/storage';
$_SERVER['LARAVEL_STORAGE_PATH'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

$writableDirectories = [
	'/tmp/storage/app/private',
	'/tmp/storage/app/public',
	'/tmp/storage/framework/cache/data',
	'/tmp/storage/framework/sessions',
	'/tmp/storage/framework/views',
	'/tmp/storage/logs',
];

foreach ($writableDirectories as $directory) {
	if (! is_dir($directory)) {
		mkdir($directory, 0755, true);
	}
}

require __DIR__.'/../public/index.php';
