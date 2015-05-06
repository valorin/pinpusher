<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in('app/')
    ->in('bootstrap/')
    //->in('config/')
    //->in('database/')
    ->in('public/')
    //->in('resources/lang/')
    ->in('tests');

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers([
        'align_double_arrow',
        'align_equals',
        //'concat_with_spaces',
        'duplicate_semicolon',
        'extra_empty_lines',
        'multiline_spaces_before_semicolon',
        'namespace_no_leading_whitespace',
        'newline_after_open_tag',
        'no_blank_lines_before_namespace',
        'no_empty_lines_after_phpdocs',
        'ordered_use',
        'phpdoc_order',
        'phpdoc_params',
        'remove_lines_between_uses',
        'single_blank_line_before_namespace',
        'unused_use',
        'short_array_syntax',

        // Disabled
        '-psr0',
        '-new_with_braces',
    ])
    ->setUsingCache(true)
    ->finder($finder);
