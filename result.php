<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>The final examination</title>
</head>
<body>
    <?php
    $data = file('question.txt') or die("can not read file");

    $point = 0;

    array_shift($data);

    foreach($data as $key => $value) {
        $tmp = explode("|",$value);
        $id = $tmp[0];
        $point += $_POST[$id];        
    }

    $data = file("result.txt") or die("Cannot read file");
    array_shift($data);
    foreach($data as $key => $value) {
        $tmp = explode("|",$value);
        $min = $tmp[0];
        $max = $tmp[1];
        $content = $tmp[2];
        if($point >= $min && $point <= $max) {
            $result = $content;
            break;
        }
    }
    ?>
    <div class="content">
        <h1>ket qua trac nghiem</h1>
        <p><b>tong so diem cua ban la : </b><?php echo $point;?></p>
        <p><?php echo $result; ?></p>
    </div>
</body>
</html>