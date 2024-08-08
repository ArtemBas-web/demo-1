<?php

namespace App\Constants;

/**
 *
 */
abstract class EventAdmissionRule {


    /**
     * @param $category
     * @param $type
     *
     * @return  bool
     */
    public static function isSameTypeByCategory(string $category, string $type)
    :bool {

        info('Category: ' . $category . ' Type: ' . $type);

        $rules = self::getAllRules();
        if (empty($rules[$category]))
            return FALSE;

        return $rules[$category]['athlete']['category'] == $type;
    }

    /**
     * @param $category
     *
     * @return mixed
     */
    public static function getAgeRulesByCategory($category) {

        $rules = self::getAllRules();

        return $rules[$category];
    }

    /**
     * @return array
     */
    public static function getAllRules()
    :array {

        return [
            'kids_6_7' => ['athlete' => ['category' => 'elite'], 'age_groups' => ['kids_6_7']],
            'kids_7_8' => ['athlete' => ['category' => 'elite'], 'age_groups' => ['kids_7_8']],
            'kids_8_9' => ['athlete' => ['category' => 'elite'], 'age_groups' => ['kids_8_9']],
            'kids_9_10' => ['athlete' => ['category' => 'elite'], 'age_groups' => ['kids_9_10']],
            'kids_10_11' => ['athlete' => ['category' => 'elite'], 'age_groups' => ['kids_10_11']],
            'kids_11_12' => ['athlete' => ['category' => 'elite'], 'age_groups' => ['kids_11_12']],
            'u15' => ['athlete' => ['category' => 'elite'], 'age_groups' => ['u15']],
            'junior' => ['athlete' => ['category' => 'elite'], 'age_groups' => ['junior']],
            'elite' => ['athlete' => ['category' => 'elite'], 'age_groups' => array_keys(Athlete::AGE_GROUP_ADULTS)],
            'age_group' => [
                'athlete' => ['category' => 'standard'],
                'age_groups' => array_keys(Athlete::AGE_GROUP_ADULTS)
            ],
            'age_group_type_from_sixteen' => [
                'athlete' => ['category' => 'standard'],
                'age_groups' => array_keys(Athlete::AGE_GROUP_ADULTS_TYPE_FROM_SIXTEEN)
            ],
            'age_group_type_mtb' => [
                'athlete' => ['category' => 'standard'],
                'age_groups' => array_keys(Athlete::AGE_GROUP_ADULTS_TYPE_MTB)
            ],
            'paraathletes' => [
                'athlete' => ['category' => 'paraathlete'],
                'age_groups' => ['paraathlete']
            ]
        ];
    }


    /**
     * @param $category
     *
     * @return array|string[]
     */
    public static function getCrossing($category)
    :array {

        $crossing = [
            'age_group' => ['age_group_type_from_sixteen', 'age_group_type_mtb'],
            'age_group_type_from_sixteen' => ['age_group', 'age_group_type_mtb'],
            'age_group_type_mtb' => ['age_group', 'age_group_type_from_sixteen'],
        ];

        return $crossing[$category] ?? [];
    }

}
