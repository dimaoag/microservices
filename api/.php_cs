<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(['vendor', 'var', 'storage', 'resources', 'public', 'docker', 'database/migrations', 'bootstrap'])
    ->in(__DIR__);

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@PSR12' => true,
    '@Symfony' => true,
    'strict_param' => true,
    'array_syntax' => [
        'syntax' => 'short'
    ],
    'no_multiline_whitespace_before_semicolons' => true,
    'not_operator_with_successor_space' => true,
    'no_useless_else' => true,
    'ordered_imports' => [
        'sortAlgorithm' => 'length',
    ],
])
->setFinder($finder)
->setCacheFile(__DIR__.'var/cache/.php_cs.cache');
