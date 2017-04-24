<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/Users/eexie/Documents/git/cfes/wp-content/themes/g5_hydrogen/blueprints/content/blog/heading.yaml',
    'modified' => 1493058262,
    'data' => [
        'name' => 'Blog Page Heading',
        'description' => 'Options for displaying Heading',
        'type' => 'blog',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Display custom heading text at the top of the page.',
                    'default' => 0
                ],
                'text' => [
                    'type' => 'input.text',
                    'label' => 'Custom Heading',
                    'description' => 'Text to be used as a custom heading.'
                ]
            ]
        ]
    ]
];
