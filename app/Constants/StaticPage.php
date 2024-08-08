<?php

namespace App\Constants;

use App\Facades\Article;
use App\Services\ArticleService;

class StaticPage {
    const PREFIX_ROUTE = 'static_page.';
    const PAGE_KEY_LIST = [

        // Join section
        self::LICENSE_LOYALTY_PROGRAMS => [
            'prefix_path' => 'join/licenses/',
            'title' => 'titles.loaylty-programs',
            'parent_route' => 'join.licenses',
            'route' => self::PREFIX_ROUTE . self::LICENSE_LOYALTY_PROGRAMS,
            'menu' => self::JOIN_ASIDE_BAR
        ],

        self::LICENSE_PUBLIC_OFFER => [
            'prefix_path' => 'join/licenses/',
            'title' => 'titles.public-offer',
            'parent_route' => 'join.licenses',
            'route' => self::PREFIX_ROUTE . self::LICENSE_PUBLIC_OFFER,
            'menu' => self::JOIN_ASIDE_BAR
        ],

        self::LICENSE_LICENSE_DESCRIPTION => [
            'prefix_path' => 'join/licenses/',
            'title' => 'titles.license-description',
            'parent_route' => 'join.licenses',
            'route' => self::PREFIX_ROUTE . self::LICENSE_LICENSE_DESCRIPTION,
            'menu' => self::JOIN_ASIDE_BAR
        ],

        self::LICENSE_CHILDREN_AND_JUNIORS => [
            'prefix_path' => 'join/licenses/',
            'title' => 'titles.children-and-juniors',
            'parent_route' => 'join.licenses',
            'route' => self::PREFIX_ROUTE . self::LICENSE_CHILDREN_AND_JUNIORS,
            'menu' => self::JOIN_ASIDE_BAR
        ],

        self::TRIATHLON => [
            'prefix_path' => 'join/',
            'title' => 'titles.what-is-triathlon',
            'parent_route' => 'join',
            'route' => self::PREFIX_ROUTE . self::TRIATHLON,
            'menu' => self::JOIN_ASIDE_BAR
        ],
        self::PARATRIATHLON_INTRODUCTION => [
            'prefix_path' => 'join/',
            'title' => 'titles.paratriathlon-introduction',
            'parent_route' => 'join',
            'route' => self::PREFIX_ROUTE . self::PARATRIATHLON_INTRODUCTION,
            'menu' => self::JOIN_ASIDE_BAR
        ],
        self::EDUCATION_AND_TRAINING => [
            'prefix_path' => 'join/',
            'title' => 'titles.education-and-training',
            'parent_route' => 'join',
            'route' => self::PREFIX_ROUTE . self::EDUCATION_AND_TRAINING,
            'menu' => self::JOIN_ASIDE_BAR
        ],
        self::VOLUNTEERS_AND_JUDGES => [
            'prefix_path' => 'join/',
            'title' => 'titles.volunteers-and-judges',
            'parent_route' => 'join',
            'route' => self::PREFIX_ROUTE . self::VOLUNTEERS_AND_JUDGES,
            'menu' => self::JOIN_ASIDE_BAR
        ],

        // training section

        self::INSURANCE_BICYCLE => [
            'prefix_path' => 'training/',
            'title' => 'titles.insurance-bicycle',
            'parent_route' => 'training',
            'route' => self::PREFIX_ROUTE . self::INSURANCE_BICYCLE,
            'menu' => self::TRAINING_ASIDE_BAR
        ],

        self::ROAD_SAFETY => [
            'prefix_path' => 'training/',
            'title' => 'titles.road-safety',
            'parent_route' => 'training',
            'route' => self::PREFIX_ROUTE . self::ROAD_SAFETY,
            'menu' => self::TRAINING_ASIDE_BAR
        ],

        //about section

        self::ABOUT_FEDERATION => [
            'prefix_path' => 'about/',
            'title' => 'titles.about-federation',
            'parent_route' => 'about',
            'route' => self::PREFIX_ROUTE . self::ABOUT_FEDERATION,
            'menu' => self::ABOUT_ASIDE_BAR
        ],

        self::DEVELOPMENT_STRATEGY => [
            'prefix_path' => 'about/',
            'title' => 'titles.development-strategy',
            'parent_route' => 'about',
            'route' => self::PREFIX_ROUTE . self::DEVELOPMENT_STRATEGY,
            'menu' => self::ABOUT_ASIDE_BAR
        ],

        self::VALUES => [
            'prefix_path' => 'about/',
            'title' => 'titles.values',
            'parent_route' => 'about',
            'route' => self::PREFIX_ROUTE . self::VALUES,
            'menu' => self::ABOUT_ASIDE_BAR
        ],

        self::DOCUMENTS => [
            'prefix_path' => 'about/',
            'title' => 'titles.documents',
            'parent_route' => 'about',
            'route' => self::PREFIX_ROUTE . self::DOCUMENTS,
            'menu' => self::ABOUT_ASIDE_BAR
        ],

        self::PARTNERS => [
            'prefix_path' => 'about/',
            'title' => 'titles.partners',
            'parent_route' => 'about',
            'route' => self::PREFIX_ROUTE . self::PARTNERS,
            'menu' => self::ABOUT_ASIDE_BAR
        ],


        self::VACANCIES => [
            'prefix_path' => 'about/',
            'title' => 'titles.vacancies',
            'parent_route' => 'about',
            'route' => self::PREFIX_ROUTE . self::VACANCIES,
            'menu' => self::ABOUT_ASIDE_BAR
        ],

        // athletes section

        self::SELECTION_POLICY => [
            'prefix_path' => 'athletes/',
            'title' => 'titles.selection-policy',
            'parent_route' => 'athletes',
            'route' => self::PREFIX_ROUTE . self::SELECTION_POLICY,
            'menu' => self::ATHLETES_ASIDE_BAR
        ],

        self::CLEAN_SPORT => [
            'prefix_path' => 'athletes/',
            'title' => 'titles.clean-sport',
            'parent_route' => 'athletes',
            'route' => self::PREFIX_ROUTE . self::CLEAN_SPORT,
            'menu' => self::ATHLETES_ASIDE_BAR
        ],

        self::INTERNATIONAL_STARTS_CALENDAR => [
            'prefix_path' => 'athletes/',
            'title' => 'titles.international-starts-calendar',
            'parent_route' => 'athletes',
            'route' => self::PREFIX_ROUTE . self::INTERNATIONAL_STARTS_CALENDAR,
            'menu' => self::ATHLETES_ASIDE_BAR
        ],

        self::RATING_CLUBS => [
            'prefix_path' => 'athletes/',
            'title' => 'titles.rating-clubs',
            'parent_route' => 'athletes',
            'route' => self::PREFIX_ROUTE . self::RATING_CLUBS,
            'menu' => self::ATHLETES_ASIDE_BAR
        ],

        self::CHAMPIONSHIPS_AND_QUALIFICATIONS => [
            'prefix_path' => '/',
            'title' => 'titles.championships-and-qualifications',
            'parent_route' => 'home',
            'route' => self::PREFIX_ROUTE . self::CHAMPIONSHIPS_AND_QUALIFICATIONS
        ],
        self::COMPETITION_RULES => [
            'prefix_path' => '/',
            'title' => 'titles.competition-rules',
            'parent_route' => 'home',
            'route' => self::PREFIX_ROUTE . self::COMPETITION_RULES
        ],

//        self::CHILDREN_SECTIONS => [
//            'prefix_path' => '/clubs-and-schools/',
//            'title' => 'titles.children-sections',
//            'parent_route' => 'organizations.index',
//            'route' => self::PREFIX_ROUTE . self::CHILDREN_SECTIONS,
//            'menu' => self::ORGANIZATIONS_ASIDE_BAR
//        ],

        self::TERMS_OF_SERVICE => [
            'prefix_path' => '/',
            'title' => 'titles.terms-of-service',
            'parent_route' => 'home',
            'route' => self::PREFIX_ROUTE . self::TERMS_OF_SERVICE,
        ],

        self::PUBLIC_OFFER => [
            'prefix_path' => '/',
            'title' => 'titles.public-offer',
            'parent_route' => 'home',
            'route' => self::PREFIX_ROUTE . self::PUBLIC_OFFER,
        ],

    ];

    const TERMS_OF_SERVICE = 'terms-of-service';
    const PUBLIC_OFFER = 'main-public-offer';
    const CHAMPIONSHIPS_AND_QUALIFICATIONS = 'championships-and-qualifications';
    const COMPETITION_RULES = 'competition-rules';
    const TRIATHLON = 'triathlon';
    const PARATRIATHLON_INTRODUCTION = 'paratriathlon-introduction';
    const EDUCATION_AND_TRAINING = 'education-and-training';
    const VOLUNTEERS_AND_JUDGES = 'volunteers-and-judges';

    const LICENSE_LOYALTY_PROGRAMS = 'loyalty-programs';
    const LICENSE_PUBLIC_OFFER = 'public-offer';
    const LICENSE_LICENSE_DESCRIPTION = 'license-description';
    const LICENSE_CHILDREN_AND_JUNIORS = 'children-and-juniors';

    const INSURANCE_BICYCLE = 'insurance-bicycle';
    const ROAD_SAFETY = 'road-safety';

    const  ABOUT_FEDERATION = 'about-federation';
    const  DEVELOPMENT_STRATEGY = 'development-strategy';
    const  VALUES = 'values';
    const  DOCUMENTS = 'documents';
    const  PARTNERS = 'partners';
    const  VACANCIES = 'vacancies';
    const  CONTACTS = 'contacts';


    const SELECTION_POLICY = 'selection-policy';
    const CLEAN_SPORT = 'clean-sport';
    const INTERNATIONAL_STARTS_CALENDAR = 'international-starts-calendar';
    const RATING_CLUBS = 'rating-clubs';

//    const CHILDREN_SECTIONS = 'children-sections';

    // Aside bars
    const MENU_ITEM_PROPERTY_IS_STATIC = 'is_static';
    const MENU_ITEM_PROPERTY_IMAGE = 'svg_image';

    const ORGANIZATIONS_ASIDE_BAR = [
        'organizations.clubs' => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'management',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.clubs',
        ],
        'organizations.children-sections' => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'child',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.children-sections',
        ]
    ];
    const JOIN_ASIDE_BAR = [
        self::TRIATHLON => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'triathlon',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],
        'titles.licenses' => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'license-description',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'sub_menu' => [
                'join.licenses.payment' => [
                    self::MENU_ITEM_PROPERTY_IMAGE => FALSE,
                    self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
                    'title' => 'titles.license-payment',
                ],
                self::LICENSE_LOYALTY_PROGRAMS => [
                    self::MENU_ITEM_PROPERTY_IMAGE => 'loyalty',
                    self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
                ],
//                self::LICENSE_PUBLIC_OFFER => [
//                    self::MENU_ITEM_PROPERTY_IMAGE => 'public-offer',
//                    self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
//                ],
                self::LICENSE_LICENSE_DESCRIPTION => [
                    self::MENU_ITEM_PROPERTY_IMAGE => 'license-description',
                    self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
                ],
                self::LICENSE_CHILDREN_AND_JUNIORS => [
                    self::MENU_ITEM_PROPERTY_IMAGE => 'child-junior',
                    self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
                ],
            ],
            'keys' => [
                'join.licenses.payment',
                self::LICENSE_LOYALTY_PROGRAMS,
                self::LICENSE_PUBLIC_OFFER,
                self::LICENSE_LICENSE_DESCRIPTION,
                self::LICENSE_CHILDREN_AND_JUNIORS
            ],

        ],
        self::PARATRIATHLON_INTRODUCTION => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'paratriathlon',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],
        self::EDUCATION_AND_TRAINING => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'education-and-training',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],
        self::VOLUNTEERS_AND_JUDGES => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'volunteers-and-judges',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],
    ];

    const ABOUT_ASIDE_BAR = [

        self::ABOUT_FEDERATION => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'about',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],

        'about.management' => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'management',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.management',
        ],

        'about.coaching-staff' => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'timer',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.coaching-staff',
        ],

        self::DEVELOPMENT_STRATEGY => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'arrow-graph',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],

        self::VALUES => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'star',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],

        self::DOCUMENTS => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'document',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],

        self::PARTNERS => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'like',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],

        self::VACANCIES => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'document-check',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],
        'about.faq' => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'question',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.faq',
        ],
        'about.contacts' => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'phone',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.contacts',
        ],
    ];


    const ATHLETES_ASIDE_BAR = [
        'titles.national-team' => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'license-description',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'sub_menu' => [
                'athletes.national-team' => [
                    self::MENU_ITEM_PROPERTY_IMAGE => FALSE,
                    self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
                    'title' => 'titles.national-team-main',
                ],
                'athletes.youth-team' => [
                    self::MENU_ITEM_PROPERTY_IMAGE => FALSE,
                    self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
                    'title' => 'titles.national-team-youth',
                ],
                'athletes.reserve' => [
                    self::MENU_ITEM_PROPERTY_IMAGE => FALSE,
                    self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
                    'title' => 'titles.national-team-reserve',
                ],
            ],
            'keys' => ['athletes.national-team', 'athletes.youth-team', 'athletes.reserve'],
        ],
        'athletes.age-group' => [
            self::MENU_ITEM_PROPERTY_IMAGE => FALSE,
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.no-national-team',
        ],
        self::SELECTION_POLICY=> [
            self::MENU_ITEM_PROPERTY_IMAGE => 'selection-policy',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],
        self::CLEAN_SPORT => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'clean-sport',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],
        self::INTERNATIONAL_STARTS_CALENDAR => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'calendar',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],

        'athletes.rating.elite' => [
            self::MENU_ITEM_PROPERTY_IMAGE => FALSE,
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.rating-athletes',
        ],

        'athletes.rating.age-group' => [
            self::MENU_ITEM_PROPERTY_IMAGE => FALSE,
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.rating-amateurs',
        ],

        self::RATING_CLUBS => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'rating',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE
        ],

    ];

    const TRAINING_ASIDE_BAR = [

        'articles.' . ArticleService::STRONG_EXERCISES => [
            self::MENU_ITEM_PROPERTY_IMAGE => '',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.strength-exercises',
        ],
        'articles.' . ArticleService::TOP_TIPS => [
            self::MENU_ITEM_PROPERTY_IMAGE => '',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.top-tips',
        ],

        'articles.' . ArticleService::BICYCLE_MECHANICS => [
            self::MENU_ITEM_PROPERTY_IMAGE => '',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.bicycle-mechanics',
        ],

        self::INSURANCE_BICYCLE => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'insurance-bicycle',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE,
            'title' => 'titles.insurance-bicycle'
        ],

        self::ROAD_SAFETY => [
            self::MENU_ITEM_PROPERTY_IMAGE => 'road-safety',
            self::MENU_ITEM_PROPERTY_IS_STATIC => TRUE,
            'title' => 'titles.road-safety'
        ],

        'articles.' . ArticleService::TRIATHLETE_NUTRITION => [
            self::MENU_ITEM_PROPERTY_IMAGE => '',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.triathlete-nutrition',
        ],
        'articles.' . ArticleService::TRAINING_PLAN => [
            self::MENU_ITEM_PROPERTY_IMAGE => '',
            self::MENU_ITEM_PROPERTY_IS_STATIC => FALSE,
            'title' => 'titles.training-plan',
        ]
    ];
}
