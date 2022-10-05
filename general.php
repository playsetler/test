<?php

/* 1 задание */

$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];

$unique_keys_array = [];

$result_array = array_filter($array, function($value) use (&$unique_keys_array) {
    if(!in_array($value['id'], $unique_keys_array)) {
        $unique_keys_array[] = $value['id'];
        return true;
    }
});

echo '<pre>';
print_r($result_array);
echo '</pre>';

/* 2 задание */

$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];

uasort($array, function($a, $b) {
    if ($a['id'] == $b['id']) { return 0; }
    return ($a['id'] < $b['id']) ? -1 : 1;
});

echo '<pre>';
print_r($array);
echo '</pre>';

/* 3 задание */

$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];

function get($array, $key, $condition) {
    return array_filter($array, function($value) use ($key, $condition) {
        if($value[$key] == $condition) return true;
    });
}

echo '<pre>';
print_r(get($array, 'id', 1));
echo '</pre>';

/* 4 задание */

$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];

$unique_keys_array = [];
$result_array = [];

array_walk($array, function($value) use (&$unique_keys_array, &$result_array) {
    if(!in_array($value['id'], $unique_keys_array)) {
        $unique_keys_array[] = $value['id'];
        $result_array[] = array($value['name'] => $value['id']);
    }
});

echo '<pre>';
print_r($result_array);
echo '</pre>';

/* 5 задание */
// не решено
$query = 'SELECT DISTINCT id, name FROM goods WHERE goods.id = (SELECT DISTINCT goods_id, COUNT(DISTINCT tag_id) AS num FROM goods_tags WHERE num = (SELECT COUNT(id) FROM tags)) ORDER BY goods.id'; 

/* 6 задание */

$query = 'SELECT DISTINCT department_id FROM evaluations WHERE gender = true AND value > 5';

?>