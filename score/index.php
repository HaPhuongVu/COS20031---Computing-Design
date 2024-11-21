<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archer Record System</title>
    <!--Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
     crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="style.css">
     <link href="styleforbutton.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="app" class="container-fluid bg-success text-center">
        <?php
        require "main.php";
        ?>
        <div class="mb-4">
            <label for="round" class="h1">Choose round</label><br>
            <select name="round" id="round">
                <?php
                // read data from each row
                while ($row = $roundName->fetch_assoc()){
                    echo "
                    <option value='$row[name]'>$row[name]</option>
                    ";
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
        <label for="archer" class="h1">Choose archer</label><br>
            <select name="archer" id="archer">
                <?php
                // read data from each row
                while ($row = $archerName->fetch_assoc()){
                    echo "
                    <option value='$row[name]'>$row[name]</option>
                    ";
                }
                ?>
            </select>
            <select name="default equipment" id="defaultEquipment">
                <?php
                // read data from each row
                while ($row = $defaultEquipment->fetch_assoc()){
                    echo "
                    <option value='$row[type]'>$row[type]</option>
                    ";
                }
                ?>
            </select>
        </div>
        <button type="button" class="btn-dark p-2 rounded shadow-none mb-4 w-25" onclick="" value="SubmitRound">Done</button>
        <button id="openCal" type="button" class="btn-dark p-2 rounded shadow-none w-25" onclick="showCal()"><i class="fa-solid fa-pencil"></i></button>
        <div id="calScore" style="display: none;">
            <h1>Enter Score</h1>
            <div id="updated">
            <form method="get" action="">
            <div class="blankSquareContainer">
                <div class="blankSquare"><input type="hidden" name="arrow1" id="arrow1"></div>
                <div class="blankSquare"><input type="hidden" name="arrow2" id="arrow2"></div>
                <div class="blankSquare"><input type="hidden" name="arrow3" id="arrow3"></div>
                <div class="blankSquare"><input type="hidden" name="arrow4" id="arrow4"></div>
                <div class="blankSquare"><input type="hidden" name="arrow5" id="arrow5"></div>
                <div class="blankSquare"><input type="hidden" name="arrow6" id="arrow6"></div>
            </div>
            <div id="totalContainer">
                <div id="totalLabel">Total:</div>
                <div id="totalValue">
                    <?php // Display total value or perform other calculations ?>
                </div>
            </div>
            <button id="submitButton" type="submit">Submit</button>
        </form>

        <div id="buttonContainer">
            <button class="score scoreX" onclick="pushValue('X')">X</button>
            <button class="score score10" onclick="pushValue(10)">10</button>
            <button class="score score9" onclick="pushValue(9)">9</button>
            <button class="score score8" onclick="pushValue(8)">8</button>
            <button class="score score7" onclick="pushValue(7)">7</button>
            <button class="score score6" onclick="pushValue(6)">6</button>
            <button class="score score5" onclick="pushValue(5)">5</button>
            <button class="score score4" onclick="pushValue(4)">4</button>
            <button class="score score3" onclick="pushValue(3)">3</button>
            <button class="score score2" onclick="pushValue(2)">2</button>
            <button class="score score1" onclick="pushValue(1)">1</button>
            <button class="score scoreM" onclick="pushValue(0)">M</button>
        </div>
            </div>
        </div>
        <p id="error"></p>
        <button type="button" value="SubmitEnd" onclick=""></button>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        function showCal(){
            var x = document.getElementById('calScore');
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function SubmitRound(){
            var roundName = $("#round").val();
            var archerName = $("#archer").val();
            var equipmentName = $("#defaultEquipment").val();
            $.post("submitRound.php", {roundName: roundName, archerName: archerName, equipmentName: equipmentName},
                function(data){
                    $("#updated").html(data)
                }
            );
        }

        // Function for button score

        var currentIndex = 0; // Track the current index

        function pushValue(a) {
            var blankSquares = document.getElementsByClassName("blankSquare");

            if (currentIndex >= blankSquares.length) {
                currentIndex = 0; // Reset the index if it exceeds the number of squares
            }

            var inputField = blankSquares[currentIndex].querySelector('input');
            inputField.value = a; // Set the value in the current blank square's hidden input field
            blankSquares[currentIndex].innerHTML = a; // Set the value in the current blank square
            currentIndex++; // Increment the index for the next square

            calculateSum(); // Calculate and update the sum
        }

        function calculateSum() {
            var blankSquares = document.getElementsByClassName("blankSquare");
            var sum = 0;

            for (var i = 0; i < blankSquares.length; i++) {
                var value = parseInt(blankSquares[i].innerHTML);
                if (!isNaN(value)) {
                    sum += value;
                }
            }

            var totalValue = document.getElementById("totalValue");
            totalValue.innerHTML = sum;
        }

        // Function for end number
        var endNumber = 1;

        function SubmitEnd(){
            if(endNumber > 5){
                return ;
            }
            var arrow1 = $("#arrow1").val();
            var arrow2 = $("#arrow2").val();
            var arrow3 = $("#arrow3").val();
            var arrow4 = $("#arrow4").val();
            var arrow5 = $("#arrow5").val();
            var arrow6 = $("#arrow6").val();

            $.post("submitRound.php", {arrow1: arrow1, arrow2: arrow2, arrow3: arrow3, arrow4: arrow4, arrow5:arrow5, arrow6:arrow6},
                function(data){
                    $("#error").html(data)
                }
            );
            endNumber++;
        }
    </script>
</body>
</html>