<?php

namespace App\Constants;

use phpDocumentor\Reflection\Types\Self_;

abstract class Athlete {
        const CATEGORY_LIST = [
            'standard' => 'Любитель',
            'elite' => 'Элита',
            'paraathlete' => 'Параатлет'
        ];
        const RATING_CATEGORY_LIST = [
            'standard' => 'Любитель',
            'elite' => 'Элита',
            'paraathlete' => 'Параатлет',
            'kids_6_7' => 'Дети 6-7',
            'kids_7_8' => 'Дети 7-8',
            'kids_9_10' => 'Дети 9-10',
            'kids_8_9' => 'Дети 8-9',
            'kids_10_11' => 'Дети 10-11',
            'kids_11_12' => 'Дети 11-12',
            'u15' => 'U15', //13-15
            'junior' => 'Junior',
        ];

        const CATEGORY_PARA = 'paraathlete';
        const CATEGORY_STANDARD = 'standard';

    const EXCEPTION_COUNTRIES = ['Российская Федерация'];
    const AGE_GROUP_LIST = [
        'kids_6_7' => 'Дети 6-7',
        'kids_7_8' => 'Дети 7-8',
        'kids_9_10' => 'Дети 9-10',
        'kids_8_9' => 'Дети 8-9',
        'kids_10_11' => 'Дети 10-11',
        'kids_11_12' => 'Дети 11-12',
        'u15' => 'U15', //13-15
        'junior' => 'Junior',
        'paraathlete' => 'Para',
        'age_group_16_17' => 'Age Group: 16 – 17',
        'age_group_18_29' => 'Age Group: 18 – 29',
        'age_group_20_29' => 'Age Group: 20 – 29',
        'age_group_30_34' => 'Age Group: 30 – 34',
        'age_group_35_39' => 'Age Group: 35 – 39',
        'age_group_30_39' => 'Age Group: 30 – 39',
        'age_group_40_49' => 'Age Group: 40 – 49',
        'age_group_50_59' => 'Age Group: 50 – 59',
        'age_group_60_plus' => 'Age Group: 60+',
        'age_group_mtb_18_99' => 'Age Group MTB', // MTB
    ];

    const AGE_GROUP_LANG_KEY_LIST = [
        'kids_6_7' => 'age-groups.kids_6_7',
        'kids_7_8' => 'age-groups.kids_7_8',
        'kids_9_10' => 'age-groups.kids_9_10',
        'kids_8_9' => 'age-groups.kids_8_9',
        'kids_10_11' => 'age-groups.kids_10_11',
        'kids_11_12' => 'age-groups.kids_11_12',
        'u15' => 'age-groups.u15', //13-15
        'junior' => 'age-groups.junior',
        'paraathlete' => 'age-groups.paraathlete',
        'age_group_16_17' => 'age-groups.age_group_16_17',
        'age_group_18_29' => 'age-groups.age_group_18_29',
        'age_group_20_29' => 'age-groups.age_group_20_29',
        'age_group_30_34' => 'age-groups.age_group_30_34',
        'age_group_35_39' => 'age-groups.age_group_35_39',
        'age_group_30_39' => 'age-groups.age_group_30_39',
        'age_group_40_49' => 'age-groups.age_group_40_49',
        'age_group_50_59' => 'age-groups.age_group_50_59',
        'age_group_60_plus' => 'age-groups.age_group_60_plus',
        'age_group_mtb_18_99' => 'age-groups.age_group_mtb_18_99', // MTB
    ];

    const AGE_GROUP_LIST_BY_CATEGORY = [

        'elite'=>[
            'kids_6_7' => 'Дети 6-7',
            'kids_7_8' => 'Дети 7-8',
            'kids_9_10' => 'Дети 9-10',
            'kids_8_9' => 'Дети 8-9',
            'kids_10_11' => 'Дети 10-11',
            'kids_11_12' => 'Дети 11-12',
            'u15' => 'U15', //13-15
            'junior' => 'Junior',
            'age_group_18_plus' => 'Elite',
        ],
        'paraathlete' => [
            'paraathlete' => 'Para'
        ],
        'standard' => [
            'kids_6_7' => 'Дети 6-7',
            'kids_7_8' => 'Дети 7-8',
            'kids_9_10' => 'Дети 9-10',
            'kids_8_9' => 'Дети 8-9',
            'kids_10_11' => 'Дети 10-11',
            'kids_11_12' => 'Дети 11-12',
            'u15' => 'U15', //13-15
            'junior' => 'Junior',
            'age_group_16_17' => 'Age Group: 16 – 17',
            'age_group_18_29' => 'Age Group: 18 – 29',
            'age_group_20_29' => 'Age Group: 20 – 29',
            'age_group_30_34' => 'Age Group: 30 – 34',
            'age_group_35_39' => 'Age Group: 35 – 39',
            'age_group_30_39' => 'Age Group: 30 – 39',
            'age_group_40_49' => 'Age Group: 40 – 49',
            'age_group_50_59' => 'Age Group: 50 – 59',
            'age_group_60_plus' => 'Age Group: 60+',
            'age_group_mtb_18_99' => 'Age Group MTB', // MTB
        ]
    ];


    const AGE_GROUP_LANG_KEY_LIST_BY_CATEGORY = [

        'elite'=>[
            'kids_6_7' => 'age-groups.kids_6_7',
            'kids_7_8' => 'age-groups.kids_7_8',
            'kids_9_10' => 'age-groups.kids_9_10',
            'kids_8_9' => 'age-groups.kids_8_9',
            'kids_10_11' => 'age-groups.kids_10_11',
            'kids_11_12' => 'age-groups.kids_11_12',
            'u15' => 'age-groups.u15', //13-15
            'junior' => 'age-groups.junior',
            'age_group_18_plus' => 'age-groups.elite',
        ],
        'paraathlete' => [
            'paraathlete' => 'age-groups.paraathlete'
        ],
        'standard' => [
            'kids_6_7' => 'age-groups.kids_6_7',
            'kids_7_8' => 'age-groups.kids_7_8',
            'kids_9_10' => 'age-groups.kids_9_10',
            'kids_8_9' => 'age-groups.kids_8_9',
            'kids_10_11' => 'age-groups.kids_10_11',
            'kids_11_12' => 'age-groups.kids_11_12',
            'u15' =>'age-groups.u15', //13-15
            'junior' =>  'age-groups.junior',
            'age_group_16_17' => 'age-groups.age_group_16_17',
            'age_group_18_29' => 'age-groups.age_group_18_29',
            'age_group_20_29' => 'age-groups.age_group_20_29',
            'age_group_30_34' => 'age-groups.age_group_30_34',
            'age_group_35_39' => 'age-groups.age_group_35_39',
            'age_group_30_39' => 'age-groups.age_group_30_39',
            'age_group_40_49' => 'age-groups.age_group_40_49',
            'age_group_50_59' => 'age-groups.age_group_50_59',
            'age_group_60_plus' => 'age-groups.age_group_60_plus',
            'age_group_mtb_18_99' => 'age-groups.age_group_mtb_18_99', // MTB
        ]
    ];


    const AGE_GROUP_YEARS = [
        'male' => [
            'elite' =>[
                'kids_6_7' => ['min' => 6, 'max' => 7],
                'kids_7_8' => ['min' => 7, 'max' => 8],
                'kids_9_10' => ['min' => 9, 'max' => 10],
                'kids_11_12' => ['min' => 11, 'max' => 12],
                'u15' => ['min' => 13, 'max' => 15],
                'junior' => ['min' => 16, 'max' => 19], //от 16 до 17
                'age_group_20_29' => ['min' => 20, 'max' => 29],
                'age_group_30_34' => ['min' => 30, 'max' => 34],
                'age_group_35_39' => ['min' => 35, 'max' => 39],
                'age_group_40_49' => ['min' => 40, 'max' => 49],
                'age_group_50_59' => ['min' => 50, 'max' => 59],
                'age_group_60_plus' => ['min' => 60, 'max' => 99],
            ],
            'paraathlete' => [
                'paraathlete' => ['min'=>6, 'max'=>99]
            ],
            'standard' => [
                'age_group_16_17' => ['min' => 16, 'max' => 17],
                'age_group_mtb_18_99' => ['min' => 18, 'max' => 99], // MTB
                'age_group_18_29' => ['min' => 18, 'max' => 29],
                'age_group_30_34' => ['min' => 30, 'max' => 34],
                'age_group_35_39' => ['min' => 35, 'max' => 39],
                'age_group_40_49' => ['min' => 40, 'max' => 49],
                'age_group_50_59' => ['min' => 50, 'max' => 59],
                'age_group_60_plus' => ['min' => 60, 'max' => 99],
            ]

        ],
        'female' => [
            'elite' =>[
                'kids_6_7' => ['min' => 6, 'max' => 7],
                'kids_7_8' => ['min' => 7, 'max' => 8],
                'kids_9_10' => ['min' => 9, 'max' => 10],
                'kids_11_12' => ['min' => 11, 'max' => 12],
                'u15' => ['min' => 13, 'max' => 15],
                'junior' => ['min' => 16, 'max' => 19], //от 16 до 17
                'age_group_20_29' => ['min' => 20, 'max' => 29],
                'age_group_30_39' => ['min' => 30, 'max' => 39],
                'age_group_40_49' => ['min' => 40, 'max' => 49],
                'age_group_50_59' => ['min' => 50, 'max' => 59],
                'age_group_60_plus' => ['min' => 60, 'max' => 99],
            ],
            'paraathlete' => [
                'paraathlete' => ['min'=>6, 'max'=>99]
            ],
            'standard' => [
                'age_group_16_17' => ['min' => 16, 'max' => 17],
                'age_group_mtb_18_99' => ['min' => 18, 'max' => 99], // MTB
                'age_group_18_29' => ['min' => 18, 'max' => 29],
                'age_group_30_39' => ['min' => 30, 'max' => 39],
                'age_group_40_49' => ['min' => 40, 'max' => 49],
                'age_group_50_59' => ['min' => 50, 'max' => 59],
                'age_group_60_plus' => ['min' => 60, 'max' => 99],
            ]
        ]
    ];



    const AGE_GROUP_ADULTS = [
        'age_group_20_29' => 'Age Group: 20 – 29',
        'age_group_18_29' => 'Age Group: 18 – 29',
        'age_group_30_34' => 'Age Group: 30 – 34',
        'age_group_35_39' => 'Age Group: 35 – 39',
        'age_group_30_39' => 'Age Group: 30 – 39',
        'age_group_40_49' => 'Age Group: 40 – 49',
        'age_group_50_59' => 'Age Group: 50 – 59',
        'age_group_60_plus' => 'Age Group: 60+',
    ];

    const AGE_GROUP_ADULTS_TYPE_FROM_SIXTEEN = [
        'age_group_16_17' => 'Age Group: 16 – 17',
        'age_group_20_29' => 'Age Group: 20 – 29',
        'age_group_18_29' => 'Age Group: 18 – 29',
        'age_group_30_34' => 'Age Group: 30 – 34',
        'age_group_35_39' => 'Age Group: 35 – 39',
        'age_group_30_39' => 'Age Group: 30 – 39',
        'age_group_40_49' => 'Age Group: 40 – 49',
        'age_group_50_59' => 'Age Group: 50 – 59',
        'age_group_60_plus' => 'Age Group: 60+',
    ];
    const AGE_GROUP_ADULTS_TYPE_MTB = [
        'age_group_mtb_18_99' => 'Age Group: 18 – 99', // MTB
    ];

    const CATEGORY_DEFAULT = 'standard';
}
