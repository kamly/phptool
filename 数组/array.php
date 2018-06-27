<?php
/**
 * Created by PhpStorm.
 * User: lijiaming
 * Date: 2018/5/17
 * Time: 上午10:56
 */


/**
 * 检测一个数组是否为二维数组
 * @param $rs
 * @return bool
 */
function isMultiArray($rs)
{
    foreach ($rs as $value) {
        if (is_array($value)) {
            return TRUE;
        }
    }
    return FALSE;
}

$data_1 = [1, 2, 3];
$data_2 = ["name" => "kamly", "age" => 2, "address" => ["city" => "gz", "home" => "keyi"]];
var_dump("isMultiArray([1,2,3]) : " . isMultiArray($data_1));
var_dump("isMultiArray([\"name\" => \"kamly\",\"age\" => 2, \"address\" => [\"city\" => \"gz\", \"home\" => \"keyi\"]]) : " . isMultiArray($data_2));


/**
 *
 * @param array $data 要排序的二维数组
 * @param string $fieldName 要排序的字段名
 * @param int $sortString SORT_ASC | SORT_DESC
 * @return array
 */
function arrayMultiSortByOnField(array $data, $fieldName, $sortString = SORT_DESC)
{
    if (!$data) {
        return $data;
    }
    $fieldRs = array();
    foreach ($data as $key => $value) {
        $fieldRs[$key] = $value[$fieldName];
    }
    array_multisort($fieldRs, $sortString, $data);
    return $data;
}

$data = [["name" => "kamly", "age" => 2], ["name" => "Datevial", "age" => 10]];

var_dump(arrayMultiSortByOnField($data, 'age'));



