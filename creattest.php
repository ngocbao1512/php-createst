<?php
    class QUESTION {
        protected $questionId;
        private $question;

        public function __construct($questionId,$question) {
            $this->questionId = $questionId;
            $this->question = $question;
        }

        public function getquestion() {
            $strquestion = $this->questionId."|".$this->question."\n";
            return $strquestion;
        }
    }

    class ANSWER {
        private $questionId;
        private $optionId;
        private $option;
        private $point;

        public function __construct($questionId,$optionId,$option,$point) {
            $this->questionId = $questionId;
            $this->optionId = $optionId;
            $this->option = $option;
            $this->point = $point;
        }

        public function getanswer() {
            $stranswer = $this->questionId."|".$this->optionId."|".$this->option."|".$this->point."\n";
            return $stranswer;
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<pre>";
        print_r($_POST);
        echo "</pre>"; 


        $questionId = $_POST[questionId];
        if ($questionId != 0 ) {
            $question = new QUESTION($questionId,$_POST[question]);
            // open file question.txt then write question id and question into it
            $filequestion = fopen("question.txt","a") or die("unbale to open file");
            fwrite($filequestion,$question->getquestion());
            

            $answera = new ANSWER($questionId,a,$_POST[a],$_POST[scorea]);
            $answerb = new ANSWER($questionId,b,$_POST[b],$_POST[scoreb]);
            $answerc = new ANSWER($questionId,c,$_POST[c],$_POST[scorec]);
            $answerd = new ANSWER($questionId,d,$_POST[d],$_POST[scored]);
            /* open file option.txt then add below answer into file*/
            $fileanswer = fopen("options.txt","a");
            fwrite($fileanswer,$answera->getanswer());
            fwrite($fileanswer,$answerb->getanswer());
            fwrite($fileanswer,$answerc->getanswer());
            fwrite($fileanswer,$answerd->getanswer());
            fclose($filenanswer);
            
            
        }
    ?>
    <form action="#" method="post">
    câu    <input type="number" name="questionId" value="0" style="width:25px;height:30px;">
    <input type="text" name="question" value="ban cam thay de chiu nhat khi nao" style="min-width:400px; height:30px">
    <p class="optiona">a <input type="text" value="when i sleep" name="a"><input type="number" name="scorea" value="0" style="width:25px; margin-left:10px;"></p>
    <p class="optiona">b <input type="text" value="when i sleep" name="b"><input type="number" name="scoreb" value="0" style="width:25px; margin-left:10px;"></p>
    <p class="optiona">c <input type="text" value="when i sleep" name="c"><input type="number" name="scorec" value="0" style="width:25px; margin-left:10px;"></p>
    <p class="optiona">d <input type="text" value="when i sleep" name="d"><input type="number" name="scored" value="0" style="width:25px; margin-left:10px;"></p>
    <input type="submit" value="cau tiep theo">
    </form>
    <a href="index.php">xem bai kiem tra</a>
</body>
</html>