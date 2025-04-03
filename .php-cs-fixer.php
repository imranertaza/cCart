<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/app') // Scan only the app directory
    ->exclude('Config') // Exclude the Config directory
    ->notPath('Config') // Another way to ensure it's excluded
    ->name('*.php') // Only format PHP files
    ->ignoreDotFiles(true) // Ignore hidden files
    ->ignoreVCS(true); // Ignore .git files

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true, // Apply PSR-12 standards
        'array_syntax' => ['syntax' => 'short'], // Convert arrays to short syntax []
//        'binary_operator_spaces' => ['default' => 'align_single_space'], // Align operators
//        'blank_line_before_statement' => [
//            'statements' => ['return', 'try', 'if', 'switch', 'for', 'foreach', 'while']
//        ], // Improve readability
        'braces' => ['position_after_functions_and_oop_constructs' => 'next'], // Braces style
        'cast_spaces' => ['space' => 'single'], // Space in casting
        'concat_space' => ['spacing' => 'one'], // Spaces around concatenation
        'no_unused_imports' => true, // Remove unused use statements
        'ordered_imports' => ['sort_algorithm' => 'alpha'], // Sort use statements alphabetically
//        'single_quote' => true, // Convert double quotes to single quotes
        'trailing_comma_in_multiline' => ['elements' => ['arrays']], // Add trailing commas
        'whitespace_after_comma_in_array' => true, // Ensure space after array commas
    ])
    ->setFinder($finder);

