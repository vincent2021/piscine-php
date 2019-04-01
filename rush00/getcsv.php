<?php 
function ft_getcsv() {
    $file = "private/product.csv";
    if (file_exists($file)) {
        $data = fopen($file, 'r');
        while ($line = fgetcsv($data, ",")) {
            $array[] = $line;
        }
        unset($array[0]);
        fclose($data);
        return $array;
    }
    return 0;
}
function ft_delcsv($id) {
    $file = "../private/product.csv";
    $flag = 0;
    if (file_exists($file)) {
        $data = fopen($file, 'r');
        while ($line = fgetcsv($data, ",")) {
            $array[] = $line;
        }
        fclose($data);
        $data = fopen($file, 'w');
        foreach ($array as $line) {
            if ($line[0] != $id) {
                fputcsv($data, $line, ",");
            }
            if ($line[0] == $id) {
                $flag = 1;
            }
        }
        fclose($data);
        if ($flag == 1)
            return 1;
    }
    return 0;
}

function ft_stockmgmt($id, $nb) {
    $file = "private/product.csv";
    $flag = 0;
    if (file_exists($file)) {
        $data = fopen($file, 'r');
        while ($line = fgetcsv($data, ",")) {
            $array[] = $line;
        }
        fclose($data);
        $data = fopen($file, 'w');
        foreach ($array as $line) {
            if ($line[0] != $id) {
                fputcsv($data, $line, ",");
            } else if ($line[0] == $id && ($line[4] + $nb) >= 0) {
                $line[4] = $line[4] + $nb;
                fputcsv($data, $line, ",");
                $flag = 1;
            } else {
                fputcsv($data, $line, ",");
            }
        }
        fclose($data);
        if ($flag == 1)
            return 1;
    }
    return 0;
}
?>