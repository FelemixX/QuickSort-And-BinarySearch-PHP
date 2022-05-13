<!DOCTYPE html>
<html>
<head>
    <title>Это говнокод</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php
function quickSort($array)
{
    // count () возвращает количество элементов в массиве
    $count = count($array);

    // Определяем, нужна ли сортировка (исключая не массив, а количество элементов массива меньше или равно 1)
    if ($count <= 1) return $array;

    // Определяем промежуточное значение, которое является ссылочным значением
    $pivot = $array[0];
    /**
     * Определить два пустых массива для разделения исходного массива слева и справа
     * $ leftSide хранит массив меньше, чем эталонное значение, которое является левым разделом
     * $ rightSide хранит массив больше, чем эталонное значение, которое является правильным разделом
     */

    $leftSide = $rightSide = array();

    // Сравнить среднее значение массива, обратить внимание на значение $ i, начиная с 1 (или $ i = 0; $ i <$ count-1)
    for ($i = 1; $i < $count; $i++)
    {
        if ($pivot > $array[$i])
        {
            // Меньше значения эталона помещается в левый раздел
            $leftSide[] = $array[$i];
        } else
        {
            // Меньше, чем эталонное значение помещается в правильный раздел
            $rightSide[] = $array[$i];
        }
    }

    // Рекурсивная сортировка подпоследовательностей элементов, меньших, чем контрольное значение, и подпоследовательностей элементов, превышающих контрольное значение
    $leftSide = quickSort($leftSide);
    $rightSide = quickSort($rightSide);

    // Возвращаем объединенный и отсортированный массив, помещаем значения эталона в массив и объединяем их вместе, обращаем внимание на порядок, левый раздел помещается впереди, значение эталона размещается посередине, а правый раздел помещается сзади
    return array_merge($leftSide, array($pivot), $rightSide);
}

function binarySearch(array $arr, $search_for)
{
    // проверяем, не пустой ли массив поступил на вход
    if (count($arr) === 0)
        return false;

    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high)
    {

        // считаем значение в середине массива
        $mid = floor(($low + $high) / 2);

        // если нашли искомое в середине массива
        if ($arr[$mid] == $search_for)
        {
            return true;
        }

        if ($search_for < $arr[$mid])
        {
            // ищем искомое значение в левой части массива
            $high = $mid - 1;
        } else
        {
            // ищем правой части
            $low = $mid + 1;
        }
    }

    // если не нашли ничего подходящего, значит заданное значение не существует, возвращаем false
    return false;
}

$array = [10, 5, 18, 11, 13, 19, 30, 25, 10];
//var_dump(quickSort($arr));    //вывод отсортированного массива по жоскаму )0)
$sorted_arr = quickSort($array);  //запись отсортированного массива в переменную
$searched_arr = binarySearch($sorted_arr, 30);
//var_dump($sorted_arr);    //тестовый вывод записанного результата работы сортировки
//var_dump(binarySearch($sorted_arr, 6)); //вывод результата бинарного поиска

?>

<?php
echo "Quick sort " . "<br><br>";
foreach ($sorted_arr as &$value) {
    echo $value . "<br>";
}
?>


//////////////////////////////////////////


<?php
echo "<br><br>". "Binary search: " . $searched_arr;
?>

</body>
</html>


