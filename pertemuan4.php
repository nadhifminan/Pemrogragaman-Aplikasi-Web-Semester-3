<?php
if (isset($_GET['a']) and isset($_GET['a']))
{
    $a=$_GET['a'];
    $b=$_GET['b'];
    $harapan = ['saya','pemuda', 'harapan', 'bangsa'];
    $reversed = array_reverse($harapan);

    foreach(array_reverse($harapan) as $item) {
        echo $item,"<br>";
    }
    echo $a+$b ,"<br>";
}
?>
<form action='' method= 'get'>
    A=<input  type='text' name='a'>
    B=<input type ='text' name='b' required>
    <input type='submit' value='+'><br><br>


    <input type='submit' value='hasil'>
</form>