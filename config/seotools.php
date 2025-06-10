<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        'defaults' => [
            'title' => 'Ernov | Exotic Leather Fashion from Bali',
            'titleBefore' => false,
            'description' => 'Discover exclusive collections of bags, wallets, and pouches made from genuine exotic snake leather in Bali. Unique, elegant, and premium style only at Ernov.',
            'separator' => ' | ',
            'keywords' => ['ernov', 'leather bags', 'leather wallets', 'bali fashion', 'snake leather', 'handmade products'],
            'canonical' => null,
            'robots' => 'index, follow',
        ],

        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],

    'opengraph' => [
        'defaults' => [
            'title' => 'Ernov | Exotic Leather Fashion from Bali',
            'description' => 'Explore exclusive fashion collections made from genuine snake leather, crafted in Bali.',
            'url' => null,
            'type' => 'website',
            'site_name' => 'Ernov',
            'images' => [env('SEO_DEFAULT_IMAGE', 'https://ernov.test/images/icons/ernovv.svg')],
        ],
    ],

    'twitter' => [
        'defaults' => [
            // 'card' => 'summary',
            // 'site' => '@YourTwitterHandle',
        ],
    ],

    'json-ld' => [
        'defaults' => [
            'title' => 'Ernov | Exotic Leather Fashion from Bali',
            'description' => 'Shop luxury snake leather bags, pouches, and wallets handmade in Bali – only at Ernov.',
            'url' => null,
            'type' => 'WebPage',
            'images' => [env('SEO_DEFAULT_IMAGE', 'https://ernov.test/images/icons/ernovv.svg')],
        ],
    ],
];
