<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in('src/');

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers([
        'align_double_arrow',
        'align_equals',
        'ereg_to_preg',
        'multiline_spaces_before_semicolon',
        'no_blank_lines_before_namespace',
        'ordered_use',
        'php4_constructor',
        'phpdoc_order',
        'short_array_syntax',
        'short_echo_tag',
        //'strict',
        //'strict_param',

        // Disabled
        '-blankline_after_open_tag',
        '-header_comment',
        '-new_with_braces',
        '-psr0',
        '-single_blank_line_before_namespace',
    ])
    ->setUsingCache(true)
    ->finder($finder);
