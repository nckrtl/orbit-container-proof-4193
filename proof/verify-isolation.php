<?php
// This fixture has no external integrations or background workers.
$values = parse_ini_file(__DIR__.'/../.env', false, INI_SCANNER_RAW);
if ($values === false) {
    throw new RuntimeException('Cannot read the fixture environment.');
}
foreach (['DB_CONNECTION' => 'pgsql', 'SESSION_DRIVER' => 'database', 'QUEUE_CONNECTION' => 'sync', 'MAIL_MAILER' => 'log', 'BROADCAST_CONNECTION' => 'log', 'FILESYSTEM_DISK' => 'local'] as $name => $expected) {
    if (($values[$name] ?? null) !== $expected) {
        throw new RuntimeException('Unsafe fixture setting: '.$name);
    }
}
foreach (['AWS_ACCESS_KEY_ID', 'AWS_SECRET_ACCESS_KEY', 'AWS_BUCKET', 'MAIL_USERNAME', 'MAIL_PASSWORD'] as $name) {
    if (!in_array($values[$name] ?? '', ['', 'null'], true)) {
        throw new RuntimeException('Unexpected external credential: '.$name);
    }
}
if (is_file(__DIR__.'/../bootstrap/cache/config.php')) {
    throw new RuntimeException('A copied configuration cache must not override the fresh environment.');
}
echo "Fixture isolation verified.\n";
