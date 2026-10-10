<?php

return [
    'header' => [
        ['label' => 'Home', 'route' => 'home', 'url' => '/'],
        ['label' => 'Company', 'children' => [
            ['label' => 'About us',                'url' => '/about-us'],
            ['label' => 'Our Team',                'url' => '/our-team'],
            ['label' => 'Why Fincun?',             'url' => '/why-fincun'],
            ['label' => 'Why Financial Planning?', 'url' => '/why-financial-planning'],
        ]],
        ['label' => 'Services', 'children' => [
            ['label' => 'Financial Planning',  'desc' => 'Insurance, Retirement, Tax, Education and Estate Planning.', 'url' => '/services/financial-planing'],
            ['label' => 'Investment Advise',   'desc' => 'Mutual Funds, SIP, Goal based investments.',                 'url' => '/services/investment-advise'],
            ['label' => 'Wealth Management',   'desc' => 'Approach and Portfolio Management Service.',                 'url' => '/services/wealth-management'],
            ['label' => 'Loan',                'desc' => 'Home Loan and Loan Against Property.',                       'url' => '/services/loan'],
            ['label' => 'Insurance',           'desc' => 'Insurance to secure future.',                                'url' => '/services/insurance'],
            ['label' => 'Training',            'desc' => 'Financial training for professionals.',                      'url' => '/services/training'],
        ]],
        ['label' => 'Who We Serve', 'children' => [
            ['label' => 'Individuals & Families', 'url' => '/who-we-serve/individual-families'],
            ['label' => 'Businesses',             'url' => '/who-we-serve/businesses'],
            ['label' => 'NRIs',                   'url' => '/who-we-serve/nris'],
            ['label' => 'Professionals',          'url' => '/who-we-serve/professionals'],
            ['label' => 'Charities & Trusts',     'url' => '/who-we-serve/charity-trust'],
            ['label' => 'Urban Women',            'url' => '/who-we-serve/urban-women'],
            ['label' => 'Special Situations',     'url' => '/who-we-serve/special-situations'],
        ]],
        ['label' => 'Our Approach', 'children' => [
            ['label' => 'Alignment',           'url' => '/our-approach/alignment'],
            ['label' => 'Customised Solutions', 'url' => '/our-approach/customised-solutions'],
            ['label' => 'Keep You Informed',   'url' => '/our-approach/keep-you-informed'],
        ]],
        ['label' => 'Wealth Journal', 'url' => '/wealth-journal'],
        ['label' => 'Contact',        'url' => '/contact-us'],
    ],
    'header_cta' => ['label' => 'Get Free Consultation', 'url' => '/contact-us'],
    'topbar' => 'Contact us:',

    'footer' => [
        'services' => [
            ['Financial Planning', '/services/financial-planing'],
            ['Investment Advise',  '/services/investment-advise'],
            ['Wealth Management',  '/services/wealth-management'],
            ['Insurance',          '/services/insurance'],
            ['Loans',              '/services/loan'],
        ],
        'quick' => [
            ['About us',       '/about-us'],
            ['Blogs',         '/blogs'],
            ['Contact us',    '/contact-us'],
            ['Support',       'mailto:bikesh@fincun.in'],
            ['Wealth Journal', '/wealth-journal'],
            ['Mobile apps',   '/mobile-apps'],
        ],
        'bottom_links' => [
            ['Mutual Funds', 'https://app.fincun.in'],
            ['Loans Against MF', '/loan-against-mf'],
            ['National Pension Scheme (NPS) Registration', 'https://cra.kfintech.com/poponline/registration/popsubscriberregistration/'],
            ['National Pension Scheme (NPS) Payments', 'https://cra.kfintech.com/poponline/POPContributeOnline?AuthID=C8783F5763BE413176CAF5F834A7054EB951058E9CD18E8BE4FFB375A6C54408'],
        ],
    ],
];
