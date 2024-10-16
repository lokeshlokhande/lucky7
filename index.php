<html>
    <body>
    <form action="#" method="post" >
        <select name="betType">
            <option value="">Select Bet</option>
            <option value="L7">lucky 7</option>
            <option value="A7">Above 7</option>
            <option value="B7">Below 7</option>
        </select>
        <br><br><br>
        <input type="submit" name="betnow" value="Continue playing">
        <br> <br>
        <input type="submit" name="reset" value="Reset & play again">
    </form>
    </body>
</html>




<?php
session_start();


if(isset($_SESSION['balance'])){

}else{
    $_SESSION['balance'] = 100;
}


if(isset($_POST["betnow"])){

    $userInput = $_POST['betType']; // L7 | A7 | B7

    betNow($userInput);

}



if(isset($_POST["reset"])){

    resetGame();

}





function betNow($userInput){
    $betAmount = 10;



    echo " <br> Dice 1 : " . $dice1 = rand(1,6);
    echo " <br> Dice 2 : " . $dice2 = rand(1,6);
    echo " <br> Total : " . $total = $dice1 + $dice2;

    if($total == '7'){
        echo " <br> You got total for lucky 7";
        $result = "L7";
    }elseif($total > '7'){
        echo " <br> You got total for Above 7";
        $result = "A7";
    }else{
        echo " <br> You got total for below 7";
        $result = "B7";
    }

    if($userInput == $result){
        echo " <br> Congratulations you have win the bet";
        if($userInput == 'A7' || $userInput == 'B7'){
            $creditAmount = 20;
        }else{
            $creditAmount = 30;
        }

        $_SESSION['balance'] = $_SESSION['balance'] - $betAmount + $creditAmount;
        echo " <br> Congratulations ! you win ! Updated balance is ". $_SESSION['balance'];
    }else{
        echo " <br> Sorry you have lose the bet";
        $_SESSION['balance'] = $_SESSION['balance'] - $betAmount;
        echo " <br> Sorry ! you lose ! Updated balance is ". $_SESSION['balance'];

    }

    echo " <br> Wallet Amount : " . $_SESSION['balance'];

}

function resetGame(){
    $_SESSION['balance'] = 100; 
}



?>
