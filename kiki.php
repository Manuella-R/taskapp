<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Completion Tube</title>
    <style>
        #tube {
            width: 300px;
            height: 300px;
            background-color: #ddd;
            border-radius: 50%;
            position: relative;
            overflow: hidden;
        }

        #filler {
            background-color: #4CAF50;
            height: 0;
            transition: height 0.5s; /* Add a smooth transition effect */
            border-radius: 50%;
        }

        #percentage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #000;
        }
    </style>
</head>
<body>

<div id="tube">
    <div id="filler"></div>
    <div id="percentage">0%</div>
</div>

<script>
    var buttonsClicked = 0;
    var maxButtons = 4; // Set the total number of buttons

    function completeTask() {
        if (buttonsClicked < maxButtons) {
            var filler = document.getElementById('filler');
            var percentageElement = document.getElementById('percentage');

            var currentHeight = parseFloat(filler.style.height) || 0;
            var newHeight = currentHeight + (300 / maxButtons); // Adjusted based on the total height of the tube

            filler.style.height = newHeight + 'px';
            buttonsClicked++;

            var percentage = (buttonsClicked / maxButtons) * 100;
            percentageElement.innerHTML = Math.round(percentage) + '%';

            
        }
    }
</script>

<button onclick="completeTask()">Task 1</button>
<button onclick="completeTask()">Task 2</button>
<button onclick="completeTask()">Task 3</button>
<button onclick="completeTask()">Task 4</button>

</body>
</html>
