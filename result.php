<?php

require("list.php");

if(isset($_POST["submit"])){

    function validator(){
        if (
            (isset($_POST["opt_0"]) && !empty($_POST["opt_0"])) &&
            (isset($_POST["opt_1"]) && !empty($_POST["opt_1"])) &&
            (isset($_POST["opt_2"]) && !empty($_POST["opt_2"])) &&
            (isset($_POST["opt_3"]) && !empty($_POST["opt_3"])) &&
            (isset($_POST["opt_4"]) && !empty($_POST["opt_4"])) &&
            (isset($_POST["opt_5"]) && !empty($_POST["opt_5"])) &&
            (isset($_POST["opt_6"]) && !empty($_POST["opt_6"])) &&
            (isset($_POST["opt_7"]) && !empty($_POST["opt_7"]))
            ) {
        } 
        else {
            $message= urlencode("You need to complete the answer");
            header("Location: index.php?message=".$message);
            die();
        }
    }
    validator();

    $questionAndAnswer = [];

    for($index = 0; $index < count($questionaires); $index++){
        $postVar = "opt_" . $index; // to get the variable name from the FORM

        $needToPush = [
            "question" => $questionaires[$index]["question"],
            "answer" => json_decode($_POST[$postVar], true)
        ];
        
       array_push($questionAndAnswer, $needToPush);

       $postVar++;
    }


    $answerA = 0;
    $answerB = 0;
    $answerC = 0;

    foreach($questionAndAnswer as $key=>$value){
         if($value["answer"]["option"] == "A"){
            $answerA++;
         }   

         if($value["answer"]["option"] == "B"){
            $answerB++;
         }  

         if($value["answer"]["option"] == "C"){
            $answerC++;
         }  
    }

    
    $newQuestionAndAnswer = $questionAndAnswer;
    shuffle($newQuestionAndAnswer);
    $newQuestionAndAnswer = array_values($newQuestionAndAnswer);
}
?>


<form action="index.php" method="POST">
    <input type="submit" value="Back to Questionaire" /> 
</form>


<table>
    <thead>
        <th>Question #</th>
        <th>Answer</th>
    </thead>
    <tbody>
        <?php foreach($newQuestionAndAnswer as $key=>$value){ ?>
        <tr>
            <td><?php echo $value["question"]["no"] ?></td>
            <td><?php echo $value["answer"]["option"] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php 
    echo "Count(A): ". $answerA . "<br />";
    echo "Count(B): ". $answerB . "<br />";
    echo "Count(C): ". $answerC . "<br />";
    echo "Total Answers: ". count($questionAndAnswer);
    echo "<br />";

?>



<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>