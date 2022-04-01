<?php
    
    $from = 0;
    $currency_from = "Select A Currency";
    $currency_to = "Select A Currency";
    $result = 0;

    $currencies = array("USD"=>0.91,"CAD"=>0.72,"EUR"=>1);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Assignment 2</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="Karacaoglu_Assignment2_style.css"/>
    </head>

    <body>
        <h2>Currency Converter</h2>
        <form action="Karacaoglu_Assignment2.php" method="post">

            From:<input type="from" name="from" placeholder= 
                "<?php
                    if((empty($_REQUEST["from"]) || empty($_REQUEST["currency-from"]) || empty($_REQUEST["currency-to"])) == true){
                        echo $from;
                    }
                    else{
                        $from = $_REQUEST["from"];
                        echo $from;
                    }
                ?>"/>
            
            <label id="select-from">Currency:</label>
            <select name="currency-from"> 
                <option value="" disabled selected>
                    <?php 
                        if(((empty($_REQUEST["from"]) || empty($_REQUEST["currency-from"])) || empty($_REQUEST["currency-to"]))== true){
                            echo $currency_from;
                        }
                        else{
                            $currency_from = $_REQUEST["currency-from"];
                            echo $currency_from;
                        }
                    ?>
                </option> 
                <option value="USD">US Dollar</option>
                <option value="CAD">Canadian Dollar</option>
                <option value="EUR">Euro</option>
            </select>
            <br>
            
            To:<output type="to" name="to">
                <?php

                    if( ((empty($_REQUEST["from"]) || empty($_REQUEST["currency-from"])) || empty($_REQUEST["currency-to"])) == false){
                        $from = $_REQUEST["from"];
                        $currency_from = $_REQUEST["currency-from"];
                        $currency_to = $_REQUEST["currency-to"];

                        foreach($currencies as $key => $value){
                            if($key == $currency_from){
                                $fromVal = $value;
                            }
                            if($key == $currency_to){
                                $toVal = $value;
                            }
                        }
                        $result = $from * $fromVal / $toVal;
                        $result = round($result, 2);
                    }
                    echo $result;
                ?></output>
            <label id="select-to">Currency:</label>
            <select id="select-to-options" name="currency-to">
                <option value="" disabled selected>
                    <?php 

                        if(((empty($_REQUEST["from"]) || empty($_REQUEST["currency-from"])) || empty($_REQUEST["currency-to"]))==true){
                            echo $currency_to;
                        }
                        else{
                            $currency_to = $_REQUEST["currency-to"];
                            echo $currency_to;
                        }

                    ?>
                </option> 
                <option value="USD">US Dollar</option>
                <option value="CAD">Canadian Dollar</option>
                <option value="EUR">Euro</option>
            </select><br>
            <input type="submit" value="Convert"/>
    </form>
    </body>
</html>