<?php

$yourName = "Chelsa Mortenson"; // Change this to your actual name
$assignmentName = "PHP Basics";
$number1 = 30;
$number2 = 70;
$total = $number1 + $number2;


$languages = ["PHP", "HTML", "JavaScript"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Assignment</title>
</head>
<body>
    <h1><?php echo $assignmentName; ?></h1>
    <h2><?php echo $yourName; ?></h2>
    
    <p>Number 1: <?php echo $number1; ?></p>
    <p>Number 2: <?php echo $number2; ?></p>
    <p>Total: <?php echo $total; ?></p>

    <h3>Programming Languages:</h3>
    <ul id="languageList"></ul>

    <script>
        
        let languages = <?php echo json_encode($languages); ?>;

        
        let list = document.getElementById("languageList");
        languages.forEach(language => {
            let listItem = document.createElement("li");
            listItem.textContent = language;
            list.appendChild(listItem);
        });
    </script>
</body>
</html>
