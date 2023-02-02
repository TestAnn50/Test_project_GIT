<?php
//1: verbinding maken met database
$link = new mysqli('localhost','root','Test1234','classicmodels');

//2: als de verbinding gelukt is
//even iets wijzigen om Git te testen
$b = 'verandering voor git';
if($link)
{
    //3: opbouw van de query
    $query = 'select customerName from customers where customernumber = 129';
    echo $query.'<br><br>';

    //4a: prepared statement initialiseren
    $stmt = mysqli_stmt_init($link);

    //4b: statement aanmaken
    if (mysqli_stmt_prepare($stmt,$query))
    {
        //5a: query uitvoeren
        mysqli_stmt_execute($stmt);
        //5b: result ophalen : get_result
        $result = mysqli_stmt_get_result($stmt);
        //5c: record uit het result halen
        $row = mysqli_fetch_row($result);
        //resultaat op het scherm tonen
        echo '<br>de naam van de klant is '.$row[0];
    }
    else { echo 'geen resultaat van de query';}

    //6: verbinding sluiten
    mysqli_close($link);
}

else
    {
        echo 'Failed to connect ('.mysqli_connect_error().')';
    }
?>
