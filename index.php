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

    // проверяем, нужна ли сортировка. Если в массиве 1 или меньше элементов, то сортировать там нечего и незачем
    if ($count <= 1)
        return $array;

    // делаем первое вхождение в массив - опорным. Сортировать будем относительно него
    $pivot = $array[0];

    /**

     * $ leftSide хранит массив меньше, чем эталонное значение, которое является левым разделом
     * $ rightSide хранит массив больше, чем эталонное значение, которое является правильным разделом
     */

    $leftSide = $rightSide = array();   //array инициализирует переменные, как массивы

    // сравниваем первое вхождение в массиве с остальными
    for ($i = 1; $i < $count; $i++)
    {   //если опорное значение больше следующего вхождения в массиве
        if ($pivot > $array[$i])
        {
            // помещаем его слева от опорного вхождения
            $leftSide[] = $array[$i];
        }
        else
        {
            // если опорное значение меньше следующего вхождения, то помещаем его справа
            $rightSide[] = $array[$i];
        }
    }

    // после того как получили левую и правую части массива, рекурсивно сортируем их
    $leftSide = quickSort($leftSide);
    $rightSide = quickSort($rightSide);

    // делаем конкатенацию отсортированных левой части, опорного значения и правой части
    return array_merge($leftSide, array($pivot), $rightSide); //array_merge - объединение N массивов в один
}

function binarySearch(array $unsortedArray, $searchFor)
{
    // проверяем, не пустой ли массив поступил на вход
    if (count($unsortedArray) === 0)
        return false;

    $low = 0;
    $high = count($unsortedArray) - 1; //count - возвращает количество элементов в массиве

    while ($low <= $high)
    {

        // находим значение вхождение в середине массива
        $mid = floor(($low + $high) / 2); //floor - округление в меньшую сторону

        // если нашли искомое в середине массива
        if ($unsortedArray[$mid] == $searchFor)
        {
            return true; //возвращаем 1
        }

        if ($searchFor < $unsortedArray[$mid])
        {
            // ищем искомое значение в левой части массива
            $high = $mid - 1;
        } else
        {
            // ищем правой части
            $low = $mid + 1;
        }
    }

    // если не нашли ничего подходящего, значит заданное значение не существует, возвращаем 0
    return false;
}

$array = [10, -5, 18, 11, 13, -19, 30, 25, 10]; //массив с числами

$sortedArray = quickSort($array);  //запись отсортированного массива в переменную
$searchedArray = binarySearch($sortedArray, 30);  //передаем массив и число, которое надо найти в функцию бинарного поиска

?>

<?php
echo "Quick sort " . "<br><br>";    //ну типа вывод на страничку
foreach ($sortedArray as &$value)
{
    echo $value . "<br>";
}
?>


//////////////////////////////////////////


<?php
echo "<br><br>" . "Binary search: " . $searchedArray;   //ну типа еще один вывод
?>

</body>
</html>


