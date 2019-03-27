<?php
function ft_is_sort($array)
    {
        $array2 = $array;
        array_multisort($array2, SORT_ASC, SORT_STRING);
        for ($i=0; $array[$i] ; $i++)
            if ($array[$i] != $array2[$i])
                return 0;
        return 1;
    }
?>
