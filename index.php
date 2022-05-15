<!DOCTYPE html>
<html>
<head>
    <title>Это говнокод</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<body>
<?php
function quickSort($array)
{
    // count () возвращает количество элементов в массиве
    $count = count($array);

    // Определяем, нужна ли сортировка (исключая не массив, а количество элементов массива меньше или равно 1)
    if ($count <= 1) return $array;

    // определяем опорное вхождение в массиве
    $pivot = $array[0];
    /**
     * Определить два пустых массива для разделения исходного массива слева и справа
     * $ leftSide хранит массив меньше, чем эталонное значение, которое является левым разделом
     * $ rightSide хранит массив больше, чем эталонное значение, которое является правильным разделом
     */

    $leftSide = $rightSide = array();

    // сравниваем первое вхождение в массиве с остальными
    for ($i = 1; $i < $count; $i++)
    {   //если опорное значение больше следующего вхождения в массиве
        if ($pivot > $array[$i])
        {
            // помещаем его слева от опорного вхождения
            $leftSide[] = $array[$i];
        } else
        {
            // если опорное значение меньше следующего вхождения, то помещаем его справа
            $rightSide[] = $array[$i];
        }
    }

    // после того как получили левую и правую части массива, сортируем их
    $leftSide = quickSort($leftSide);
    $rightSide = quickSort($rightSide);

    // делаем конкатенацию отсортированных левой части, опорного значения и правой части
    return array_merge($leftSide, array($pivot), $rightSide);
}

function binarySearch(array $unsorted_array, $search_for)
{
    // проверяем, не пустой ли массив поступил на вход
    if (count($unsorted_array) === 0)
        return false;

    $low = 0;
    $high = count($unsorted_array) - 1;

    while ($low <= $high)
    {

        // находим значение вхождение в середине массива
        $mid = floor(($low + $high) / 2);

        // если нашли искомое в середине массива
        if ($unsorted_array[$mid] == $search_for)
        {
            return true;
        }

        if ($search_for < $unsorted_array[$mid])
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

$array = [10, -5, 18, 11, 13, -19, 30, 25, 10]; //массив с числами

$sorted_arr = quickSort($array);  //запись отсортированного массива в переменную
$searched_arr = binarySearch($sorted_arr, 30);  //передаем массив и число, которое надо найти в функцию бинарного поиска

?>

<?php
echo "Quick sort " . "<br><br>";
foreach ($sorted_arr as &$value)
{
    echo $value . "<br>";
}
?>


//////////////////////////////////////////


<?php
echo "<br><br>" . "Binary search: " . $searched_arr;
?>

</body>
</html>


