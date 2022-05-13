<?php
function quickSort($arr)
{
    // count () возвращает количество элементов в массиве
    $count = count($arr);

    // Определяем, нужна ли сортировка (исключая не массив, а количество элементов массива меньше или равно 1)
    if ($count <= 1) return $arr;

    // Определяем промежуточное значение, которое является ссылочным значением
    $baseValue = $arr[0];
    /**
     * Определить два пустых массива для разделения исходного массива слева и справа
     * $ leftArr хранит массив меньше, чем эталонное значение, которое является левым разделом
     * $ rightArr хранит массив больше, чем эталонное значение, которое является правильным разделом
     */

    $leftArr = $rightArr = array();

    // Сравнить среднее значение массива, обратить внимание на значение $ i, начиная с 1 (или $ i = 0; $ i <$ count-1)
    for ($i = 1; $i < $count; $i++)
    {
        if ($baseValue > $arr[$i])
        {
            // Меньше значения эталона помещается в левый раздел
            $leftArr[] = $arr[$i];
        }
        else
        {
            // Меньше, чем эталонное значение помещается в правильный раздел
            $rightArr[] = $arr[$i];
        }
    }

    // Рекурсивная сортировка подпоследовательностей элементов, меньших, чем контрольное значение, и подпоследовательностей элементов, превышающих контрольное значение
    $leftArr = quickSort($leftArr);
    $rightArr = quickSort($rightArr);

    // Возвращаем объединенный и отсортированный массив, помещаем значения эталона в массив и объединяем их вместе, обращаем внимание на порядок, левый раздел помещается впереди, значение эталона размещается посередине, а правый раздел помещается сзади
    return array_merge($leftArr, array($baseValue), $rightArr);
}
function binarySearch(Array $arr, $x)
{
    // check for empty array
    if (count($arr) === 0)
        return false;

    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {

        // compute middle index
        $mid = floor(($low + $high) / 2);

        // element found at mid
        if($arr[$mid] == $x) {
            return true;
        }

        if ($x < $arr[$mid]) {
            // search the left side of the array
            $high = $mid -1;
        }
        else {
            // search the right side of the array
            $low = $mid + 1;
        }
    }

    // If we reach here element x doesnt exist
    return false;
}

$arr = [10, 5, 18, 11, 13, 19, 30, 25, 10];
//var_dump(quickSort($arr));
$sorted_arr = quickSort($arr);
//var_dump($sorted_arr);
var_dump(binarySearch($sorted_arr, 6));


