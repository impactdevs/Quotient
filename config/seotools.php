<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Quotient HRMS - Comprehensive Human Resource Management System", // Page title (relevant to your app)
            'titleBefore'  => false, // No need to put defaults.title before the page title
            'description'  => 'Quotient is a powerful Human Resource Management System by Impact Outsourcing, offering features like leave management, employee management, payroll, and more.',
            'separator'    => ' - ',
            'keywords'     => ['HRMS', 'employee management', 'leave management', 'payroll management', 'expense tracking', 'HR software'],
            'canonical'    => false, // Use the default full URL
            'robots'       => 'index, follow', // Allow search engines to index and follow links
        ],
        /*
         * Webmaster tags are always added.
         */
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
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Quotient HRMS - Simplify HR Management', // Open Graph title
            'description' => 'Quotient is an all-in-one HRMS solution offering leave, employee, payroll, and expense management features to streamline HR processes.',
            'url'         => false, // Use current URL
            'type'        => 'website', // Type of content
            'site_name'   => 'Quotient HRMS', // Your site name
            'images'      => ['https://quotient.impact-outsourcing.com/assets/user-manual/leave-type-conf.png'], // Add an image for social sharing (optional)
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary_large_image', // Summary card with large image
            'site'        => '@aidvantageuk', // Your Twitter handle or site name
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Quotient HRMS - A Complete HR Solution', // JSON-LD title
            'description' => 'Quotient streamlines your HR operations with features like leave management, payroll automation, employee records, and more.',
            'url'         => false, // Use current URL
            'type'        => 'WebPage', // The type of content
            'images'      => ['https://quotient.impact-outsourcing.com/assets/user-manual/leave-type-conf.png'], // Optional image URL for structured data
        ],
    ],
];
