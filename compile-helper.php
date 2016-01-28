<?php

$dir = './src/Initworks/CassandraStub';

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

$namespaces = [];

/** @var SplFileInfo $entry */
foreach ($iterator as $entry) {
    if ($entry->isDir()) {
        continue;
    }

    $classPath = str_replace($dir, '', $entry->getPathname());
    $classPath = ltrim($classPath, '\\');
    $classPath = str_replace('.php', '', $classPath);

    $classParts = explode('\\', $classPath);

    $className = array_pop($classParts);
    $namespace = implode('\\', $classParts);

    if (!isset($namespaces[$namespace])) {
        $namespaces[$namespace] = [];
    }

    $namespaces[$namespace][] = [
        $className,
        $entry->getRealPath(),
    ];
}

// Free up some memory
unset($dir);
unset($iterator);

// Let's write the damn thing!

ob_start();
echo "<?php\n\n";

foreach ($namespaces as $namespace => $classes) {
    echo "namespace {$namespace} {", PHP_EOL;

    foreach ($classes as $classInfo) {
        list($class, $file) = $classInfo;

        echo trim(preg_replace([
            '/(\<\?php)/',
            '/namespace (.*?);/'
        ], '', file_get_contents($file)));

        echo PHP_EOL, PHP_EOL;
    }

    echo '}', PHP_EOL, PHP_EOL;
}

if (file_exists('_cassandra_helper.php')) {
    unlink('_cassandra_helper.php');
}
file_put_contents('_cassandra_helper.php', ob_get_clean());