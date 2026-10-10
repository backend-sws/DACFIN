<?php

return [
    'hero_wireframe' => [
        'tag' => 'Welcome to FINCUN',
        'title' => 'Find Your Dream Wealth Future With Ease.',
        'text' => 'Discover tailored portfolios, explore structured roadmaps, and connect with trusted AMFI registered advisors in minutes.',
        'primary_cta' => ['Explore Services', '/services/financial-planing'],
        'secondary_cta' => ['Learn More', '/about-us'],
        'badge' => 'AMFI Registered MFD (ARN-149176)',
    ],

    'trust_bar' => [
        [
            'icon' => 'shield',
            'title' => 'AMFI Registered MFD',
            'desc' => 'ARN-149176 & ARN-82228 Distributor with fiduciary care.',
        ],
        [
            'icon' => 'target',
            'title' => 'Zero Product Bias',
            'desc' => '100% client alignment without institutional sales quotas.',
        ],
        [
            'icon' => 'building',
            'title' => 'Dual Regional Hubs',
            'desc' => 'High-touch advisory centers in Exhibition Rd, Patna & Argora Chowk, Ranchi.',
        ],
    ],

    'catalog' => [
        'eyebrow' => 'Offerings Catalog',
        'title' => 'Explore Tailored Financial Solutions',
        'tabs' => [
            'All Services',
            'Financial Planning',
            'Investment Advise',
            'Wealth Management',
            'Loans & NPS',
        ],
        'items' => [
            [
                'category' => 'Financial Planning',
                'title' => 'Goal-Based Financial Planning',
                'tag' => 'Comprehensive Roadmap',
                'desc' => 'Retirement, Tax Savings, Children Education and Estate Structuring.',
                'metric' => 'Customized Roadmap',
                'metric_label' => 'Starting Assessment',
                'url' => '/services/financial-planing',
                'image' => '/images/service-section-1.svg',
            ],
            [
                'category' => 'Investment Advise',
                'title' => 'Mutual Funds & Systematic SIPs',
                'tag' => 'Goal-Based SIPs',
                'desc' => 'Active fund baskets, benchmark comparison, and risk-adjusted growth.',
                'metric' => 'From ₹500/mo',
                'metric_label' => 'SIP Allocation',
                'url' => '/services/investment-advise',
                'image' => '/images/service-section-2.svg',
            ],
            [
                'category' => 'Wealth Management',
                'title' => 'Discretionary PMS & AIF Advisory',
                'tag' => 'HNI Stewardship',
                'desc' => 'Adaptive portfolio management, direct equity PMS, and alternative funds.',
                'metric' => '₹500Cr+ AUM',
                'metric_label' => 'Total Advised Scope',
                'url' => '/services/wealth-management',
                'image' => '/images/service-section-3.svg',
            ],
            [
                'category' => 'Loans & NPS',
                'title' => 'Loan Against Mutual Funds & NPS',
                'tag' => 'Quick Liquidity',
                'desc' => 'Instant liquidity without liquidating your compounded equity units.',
                'metric' => 'Instant Approval',
                'metric_label' => 'Zero Equity Exit',
                'url' => '/loan-against-mf',
                'image' => '/images/service-section-4.svg',
            ],
        ],
    ],

    'guide' => [
        'eyebrow' => 'How It Works',
        'title' => 'User guide for first timer',
        'subtitle' => 'A structured 4-step roadmap engineered to turn complex financial choices into clear, compounding wealth.',
        'steps' => [
            [
                'step' => 'Step 1',
                'title' => 'Discover: Define Goals & Life Milestones',
                'desc' => 'We uncover your family milestones, cashflow requirements, and investment horizon without rushing into product pitches.',
            ],
            [
                'step' => 'Step 2',
                'title' => 'Diagnose: Risk Profiling & Health Check',
                'desc' => 'A rigorous diagnostic of your existing investments, spotting asset concentration, hidden expense ratios, and volatility risks.',
            ],
            [
                'step' => 'Step 3',
                'title' => 'Construct: Bespoke Asset Allocation',
                'desc' => 'We design an unbiased, tax-efficient portfolio across top mutual funds, debt instruments, and pension architectures.',
            ],
            [
                'step' => 'Step 4',
                'title' => 'Steward: Proactive Reviews & Rebalancing',
                'desc' => 'Quarterly performance audits, tax harvesting, and timely rebalancing so your wealth keeps pace with market transitions.',
            ],
        ],
    ],

    'testimonials' => [
        'eyebrow' => 'Verified Experiences',
        'title' => 'Satisfied Clients Speak',
        'items' => [
            [
                'name' => 'Bikesh Ojha',
                'role' => 'Business Owner, Patna',
                'rating' => 5,
                'text' => 'Experienced leadership with round the clock advisory. Within a few days, I found my family portfolio streamlined and aligned with our 10-year enterprise vision. Truly fiduciary care.',
                'avatar' => '/images/team/bikesh.svg',
            ],
            [
                'name' => 'Dr. Rajesh Sharma',
                'role' => 'Chief Consultant, Ranchi',
                'rating' => 5,
                'text' => 'FINCUN brought complete institutional clarity to my mutual funds. No jargon, transparent execution, and proactive review meetings every quarter.',
                'avatar' => '/images/team/avinash.svg',
            ],
        ],
        'cta' => ['See More Stories', '/wealth-journal'],
    ],

    'spotlight' => [
        'stats' => [
            ['val' => '₹500Cr+', 'label' => 'Total AUM advised with disciplined fiduciary oversight.'],
            ['val' => '15+ Years', 'label' => 'Proven leadership navigating bull and bear market cycles.'],
            ['val' => '100%', 'label' => 'Unbiased advisory standard with zero product quotas.'],
        ],
        'title' => 'Patna & Ranchi: The Transformation of Wealth Advisory.',
        'text' => 'For decades, tier-2 cities in eastern India were underserved by transactional product pushers. FINCUN was established in 2016 to introduce institutional-grade, goal-based wealth planning right to your doorstep in Patna and Ranchi. Combining high-touch certified planners with smart fintech tools, we make sure your capital works as hard as you do.',
        'cta' => ['Explore Regional Presence', '/about-us'],
        'image' => '/images/about-section.svg',
    ],

    'bottom_services' => [
        'title' => 'Services',
        'cards' => [
            [
                'step' => '01',
                'title' => 'Financial Planning',
                'desc' => 'Holistic roadmaps integrating retirement, tax savings, children education funds, and estate planning.',
                'dark' => true,
                'url' => '/services/financial-planing',
            ],
            [
                'step' => '02',
                'title' => 'Investment Advise',
                'desc' => 'Goal-based SIPs, mutual fund baskets, and smart rebalancing tailored to your target returns.',
                'dark' => false,
                'url' => '/services/investment-advise',
            ],
            [
                'step' => '03',
                'title' => 'Wealth Management',
                'desc' => 'Discretionary portfolio management services (PMS), alternative investments, and private wealth stewardship.',
                'dark' => false,
                'url' => '/services/wealth-management',
            ],
        ],
    ],

    'hero_slides' => [
        [
            'eyebrow' => 'Fincun Private Limited',
            'title' => 'Simplifying Wealth, Maximizing Growth',
            'text' => 'Fincun helps you invest smarter with transparent, goal-based financial strategies designed for long-term success.',
            'cta' => ['Start Your Journey', '/contact-us'],
        ],
        [
            'eyebrow' => 'Real-Time Insights',
            'title' => 'Your Money, Working Smarter',
            'text' => 'With real-time insights and adaptive portfolio management, we make sure your wealth keeps pace with the market.',
            'cta' => ['Optimize My Portfolio', '/contact-us'],
        ],
        [
            'eyebrow' => 'Goal-Based Advisory',
            'title' => 'Building Futures, One Goal at a Time',
            'text' => "From retirement to family security, FINCUN's expert advisors craft financial plans that grow with your life.",
            'cta' => ['Get Free Consultation', '/contact-us'],
        ],
    ],

    'stats' => [
        ['value' => 5, 'pad' => true, 'label' => 'Dedicated advisors on your team'],
        ['value' => 6, 'pad' => true, 'label' => 'Core advisory services offered'],
        ['value' => 8, 'pad' => true, 'label' => 'Client segments we specialise in'],
        ['text' => 'Mon–Sat', 'label' => '8:00 AM – 8:00 PM, always reachable'],
    ],

    'about' => [
        'eyebrow' => 'About Us',
        'title' => 'Your Trusted Partner in Smart Financial Planning',
        'paragraphs' => [
            "At FINCUN, we believe finance doesn't have to be complicated. Our mission is simple — to make wealth management transparent, smart and stress-free for everyone. We blend personalized advisory with technology-driven insights to help you plan, grow and protect your financial future with confidence.",
            "Whether you're looking to optimize your existing investments or build a brand-new financial roadmap, FINCUN is here to simplify the process, every step of the way.",
        ],
        'mission' => ['Our Mission', 'To empower individuals and institutions with clear, data-backed financial solutions that align with their goals and create long-term value.'],
        'vision' => ['Our Vision',  'To redefine wealth management by making professional financial planning accessible, transparent and future-ready for all.'],
        'image' => '/images/about-section.svg',
        'image_alt' => 'Fincun advisory',
        'quote' => 'Clarity, trust, smarter strategies.',
    ],

    'services' => [
        'eyebrow' => 'Our Services',
        'title' => 'Smart Solutions to Simplify Your Financial Journey',
        'tabs' => ['Wealth Assessment, Portfolio Optimization', 'Personalized Wealth Planning', 'Dynamic Portfolio Management', 'Comprehensive Financial Advising'],
        'items' => [
            [
                'title' => 'Check Your Wealth Health',
                'text' => 'Think of it as a health check-up for your investments. We review your portfolio, spot risks and highlight growth opportunities so your money is always working smarter.',
                'points' => ['Easy-to-understand portfolio review', 'Spot risks before they grow bigger', 'Compare your returns with market benchmarks', 'Action plan to boost performance'],
                'image' => '/images/service-section-1.svg',
                'alt' => 'Wealth health assessment',
            ],
            [
                'title' => 'Plan Your Future, Your Way',
                'text' => 'From buying a dream home to planning for retirement, our strategies are designed around your life goals — clear, flexible and stress-free.',
                'points' => ['Goal-based financial roadmaps', 'Retirement and child education planning', 'Plans for wealth protection and growth', 'Flexible solutions that adapt with you'],
                'image' => '/images/service-section-2.svg',
                'alt' => 'Personalized wealth planning',
            ],
            [
                'title' => 'Smarter Investing, On Autopilot',
                'text' => 'Markets move fast and we make sure your portfolio keeps up. With smart, data-driven adjustments, we capture opportunities and protect you from risks.',
                'points' => ['Automated portfolio rebalancing', 'Real-time insights and adjustments', 'Focus on both growth and safety', 'Continuous monitoring and updates'],
                'image' => '/images/service-section-3.svg',
                'alt' => 'Dynamic portfolio management',
            ],
            [
                'title' => 'Expert Advice, Made Simple',
                'text' => 'No jargon. No hidden agenda. Just clear, honest advice on mutual funds, NPS, PMS, AIFs and more — so you can make decisions with confidence.',
                'points' => ['Mutual funds and NPS made easy', 'PMS and AIF advisory support', 'Loans against mutual funds', 'Transparent and unbiased recommendations'],
                'image' => '/images/service-section-4.svg',
                'alt' => 'Comprehensive financial advising',
            ],
        ],
    ],

    'strengths' => [
        'eyebrow' => 'Our Core Strengths',
        'title' => 'A trusted name in financial planning and wealth management',
        'text' => 'At FINCUN, our strength lies in combining human expertise with smart technology. We focus on understanding your goals, simplifying complex financial decisions and delivering solutions that are transparent, reliable and future-ready.',
        'items' => [
            ['Client-Centric Approach',      'We listen first, plan second. Every solution begins with understanding your goals.'],
            ['Technology + Expertise',       'From wealth growth to risk protection, we cover all aspects of your financial life.'],
            ['Holistic Financial Solutions', 'From wealth growth to risk protection, we cover all aspects of your financial life.'],
            ['Trusted Relationships',        'We measure success not just in numbers, but in long-term trust and client satisfaction.'],
        ],
    ],

    'audiences' => [
        'eyebrow' => 'Who We Serve',
        'title' => 'Advisory built for every stage of life',
        'all_link' => ['See all segments →', '/who-we-serve/individual-families'],
        'items' => [
            ['Individuals & Families', 'Individual, Families and HNIs.',       '/who-we-serve/individual-families'],
            ['Businesses',             'MSMEs and Large Organisations.',       '/who-we-serve/businesses'],
            ['NRIs',                   'Cross-border wealth, simplified.',     '/who-we-serve/nris'],
            ['Professionals',          'Doctors, Lawyers, CAs etc.',           '/who-we-serve/professionals'],
            ['Charities & Trusts',     'Charity, Trusts, NGOs etc.',           '/who-we-serve/charity-trust'],
            ['Urban Women',            'Working or Business Women.',           '/who-we-serve/urban-women'],
            ['Special Situations',     'New Weds, Single Parents etc.',        '/who-we-serve/special-situations'],
            ['Complimentary Services', 'Additional support, at no extra cost.', '/contact-us'],
        ],
    ],

    'why' => [
        'eyebrow' => 'Why Fincun?',
        'title' => 'Because Your Financial Journey Deserves Clarity',
        'text' => "When it comes to your money, trust and clarity matter most. That's why we simplify every step — with FINCUN, it's not just about money, it's about building the future you deserve.",
        'items' => [
            ['Simplified Finance',      'No jargon, just clear explanations and easy-to-follow advice.'],
            ['Personalized Strategies', 'Every plan is built around your unique goals and lifestyle.'],
            ['Smart Technology',        'Real-time insights and automated tools that keep your portfolio ahead of market shifts.'],
            ['Transparent Advice',      'Honest recommendations with no hidden agendas and bias.'],
            ['End-to-End Support',      "From mutual funds to loans against investments, we're with you at every step."],
        ],
        'approach' => [
            ['01', 'Alignment',           '/our-approach/alignment'],
            ['02', 'Customised Solutions', '/our-approach/customised-solutions'],
            ['03', 'Keep You Informed',   '/our-approach/keep-you-informed'],
        ],
    ],

    'team' => [
        'eyebrow' => 'Our Team',
        'title' => 'Meet Your Trusted Advisors',
        'text' => 'Behind FINCUN is a team of passionate financial professionals who bring together deep industry experience and a vision to make finance human, approachable and reliable.',
        'members' => [
            ['Bikesh Ojha',        'Founder & Wealth Manager',        '/images/team/bikesh.svg',        'BO'],
            ['Avinash Pathak',     'Vice President',                  '/images/team/avinash.svg',       'AP'],
            ['Prem Shankar Dubey', 'Admin Head',                      '/images/team/prem-shankar.svg',  'PD'],
            ['Surbhi Sinha',       'Operations Manager',              '/images/team/surbhi.svg',        'SS'],
            ['Abhishek Nandi',     'Goal Based Financial Planner',    '/images/team/abhishek.svg',      'AN'],
        ],
    ],

    'journal' => [
        'eyebrow' => 'Wealth Journal',
        'title' => 'Insights, issue by issue',
        'all_link' => ['View all issues →', '/wealth-journal'],
        'show' => 4,
    ],

    'promise' => [
        'eyebrow' => 'Our Promise',
        'title' => 'Your goals, our commitment',
        'text' => "At FINCUN, we promise more than financial advice, we promise a partnership built on trust, clarity and care. Every recommendation we make is aligned with your aspirations, backed by expertise and delivered with complete transparency. With us, you'll always know where your money stands and where it's headed.",
        'cta' => ['Step towards Financial Freedom', '/contact-us'],
    ],

    'cta_band' => [
        'title' => 'Your Financial Future Starts Today',
        'text' => "Whether you're planning for retirement, wealth creation, tax savings or financial independence, our advisors are here to help.",
        'button' => ['Schedule Consultation', '/contact-us'],
    ],
];
