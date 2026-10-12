<?php

return [
    // Background photo. If the file is missing, the CSS gradient is shown.
    'bg' => 'images/hero-bg.jpg',

    'badge' => 'Goal-Based Advisory',

    // Heading lines. Each segment is [text, isSoft]. Soft = lighter grey-blue.
    'title' => [
        [['Simplifying ', false], ['Wealth,', true]],
        [['Maximizing ', true],  ['Growth', false]],
    ],

    'text' => 'Dacfin Services Private Limited helps you invest smarter with transparent, goal-based financial strategies designed for long-term success.',

    'primary' => ['Start Your Journey', '/contact-us'],
    'secondary' => ['Why DACFIN?', '/why-fincun'],

    // [icon, label]  icons: chart, clock, shield
    'features' => [
        ['chart',  'Investments'],
        ['clock',  'Real-Time Insights'],
        ['shield', 'Risk Protection'],
    ],

    // Sample card (illustration only).
    'card' => [
        'brand' => 'DACFIN',
        'label' => 'Total Portfolio Value',
        'value' => 12895750,        // used for the count-up
        'display' => '₹1,28,95,750',  // shown without JS and at the end of the count-up
        'currency' => '₹',
        'locale' => 'en-IN',         // use '$' + 'en-US' + '$12,895,750' for the exact reference look
        'actions' => [                // [icon, label]  icons: invest, plan, shield, more
            ['invest', 'Invest'],
            ['plan',   'Plan'],
            ['shield', 'Protect'],
            ['more',   'More'],
        ],
        'illustrative' => 'Illustrative values only, not actual returns.',
    ],

    'floats' => [
        ['avatar' => '↻', 'title' => 'Dividend Reinvestment', 'amount' => '+₹1,200',  'meta' => 'Today'],
        ['avatar' => 'I', 'title' => 'Index Fund',            'amount' => '+₹55,000', 'meta' => 'Wed 18 Jan'],
    ],

    'vertical_text' => 'Financial clarity · Every step',
];
