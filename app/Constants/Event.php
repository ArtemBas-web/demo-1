<?php

namespace App\Constants;

abstract class Event {
    const ALL_CATEGORY_LIST = [
        'kids_6_7' => 'Дети 6-7',
        'kids_7_8' => 'Дети 7-8',
        'kids_8_9' => 'Дети 8-9',
        'kids_9_10' => 'Дети 9-10',
        'kids_10_11' => 'Дети 10-11',
        'kids_11_12' => 'Дети 11-12',
        'u15' => 'U15', //12-15
        'junior' => 'Junior', //от 16 до 18
        'elite' => 'Элита', //
        'age_group' => 'Age Group', //
//        'age_group_type_from_sixteen' => 'Age Group (16+)',
//        'age_group_type_mtb' => 'Age Group MTB',
        'paraathletes' => 'Параатлеты', //
    ];

    const ALL_CATEGORY_LANG_KEY_LIST = [
        'kids_6_7' => 'age-groups.kids_6_7',
        'kids_7_8' => 'age-groups.kids_7_8',
        'kids_8_9' => 'age-groups.kids_8_9',
        'kids_9_10' => 'age-groups.kids_9_10',
        'kids_10_11' => 'age-groups.kids_10_11',
        'kids_11_12' => 'age-groups.kids_11_12',
        'u15' => 'age-groups.u15', //12-15
        'junior' => 'age-groups.junior', //от 16 до 18
        'elite' => 'age-groups.elite', //
        'age_group' => 'age-groups.age_group', //
        'age_group_type_from_sixteen' => 'age-groups.age_group_type_from_sixteen',
        'age_group_type_mtb' => 'age-groups.age_group_type_mtb',
        'paraathletes' => 'age-groups.paraathlete', //
    ];

    const CURRENT_CATEGORY_LIST = [
        'kids_7_8' => 'Дети 7-8',
        'kids_9_10' => 'Дети 9-10',
        'kids_11_12' => 'Дети 11-12',
        'u15' => 'U15', //13-15
        'junior' => 'Junior', //от 16 до 18
        'elite' => 'Элита', //
        'age_group' => 'Age Group', //
        'age_group_type_from_sixteen' => 'Age Group (16+)',
        'age_group_type_mtb' => 'Age Group MTB',
        'paraathletes' => 'Параатлеты', //
    ];

    const CATEGORY_LIST_UNTIL_2024 = [
        'kids_6_7' => 'Дети 6-7',
        'kids_8_9' => 'Дети 8-9',
        'kids_10_11' => 'Дети 10-11',
        'u15' => 'U15', //12-15
        'junior' => 'Junior', //от 16 до 18
        'elite' => 'Элита', //
        'age_group' => 'Age Group', //
        'age_group_type_from_sixteen' => 'Age Group (16+)',
        'paraathletes' => 'Параатлеты', //
    ];
}
