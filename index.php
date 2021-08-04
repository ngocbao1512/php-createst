<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>The Final examination</title>
</head>
<body>
    <?php
        require_once 'function-a.php'; //  $arrayquestions
        require_once 'function-b.php'; // $arrayOptions

        $newArr = array();

        foreach($arrQuestions as $key=>$value) {
            $newArr[$key]["question"] = $value["question"];
            $newArr[$key]["sentences"] = $arrOptions[$key];
        }


    ?>
    <div class="content">
        <h1>Trac nghiem tinh cach</h1>
        <form action="result.php" method="POST">
            <?php
                $i = 1;
                foreach($newArr as $key => $value) {
                    echo '<div class="question">';
                    echo '<p><span>Cau hoi '.$i.' : </span>'.$value["question"].'</p>';
                    echo '<ul>';
                    foreach($value["sentences"] as $keyC => $valueC) {
                        echo '<li><input type="radio" name="'.$key.'"  value="'.$valueC["point"].'">'." ".$keyC." ".$valueC["option"].'</li> <br>';
                    }
                    echo '</ul>';
                    echo '</div>';
                    $i++;
                }
            ?>
            <input type="submit" value="kiemtra" name="submit">
        </form>
    </div>
</body>
</html>