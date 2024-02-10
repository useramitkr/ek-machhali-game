<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ek Machli</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="fish.css">
</head>
<body>
    <div class="center-screen">

        <div class="gameContainer">
            <h1>Ek Machli Game</h1>
            <h2>You vs. Me</h2>
            <div class="player1 players">
                <img src="fish.png" class="option p1" name="Machhli" onclick="playSound('fish.mp3')">
                <img src="water.png" class="option p1" name="Paani me gayi" onclick="playSound('pani.mp3')">
                <img src="chapaak.png" class="option p1" name="Chapaak" onclick="playSound('chpk.mp3')">
            </div>

            <div class="selecter players">
                <input type="text" class="select" id="select" readonly>
            </div>

            <div class="player2 players">
                <img src="fish.png" class="option p1" name="Machhli" onclick="playSound('fish.mp3')">
                <img src="water.png" class="option p1" name="Paani me gayi" onclick="playSound('pani.mp3')">
                <img src="chapaak.png" class="option p1" name="Chapaak" onclick="playSound('chpk.mp3')">
            </div>

            <p class="credit"><a href="#"> You can't beat me 😁 Open Challenge</a><br><a href="#"> Ultra Max Pro Hard Level </a></p>
            
        </div>
        <script>
            // Function to play sound
            function playSound(soundFile) {
                const audio = new Audio(soundFile);
                audio.playbackRate = 1.2;
                audio.play();
            }
        
        </script>
    </div>

    <script>
        // Phrases/actions in the sequence
        const actions = ['Machhli', 'Paani me gayi', 'Chapaak', 'Machhli', 'Machhli', 'Paani me gayi', 'Paani me gayi', 'Chapaak', 'Chapaak', 'Machhli', 'Machhli', 'Machhli', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Chapaak', 'Chapaak', 'Chapaak', 'Machhli', 'Machhli', 'Machhli', 'Machhli', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Machhli',   'Machhli', 'Machhli', 'Machhli', 'Machhli', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak','Machhli',   'Machhli',  'Machhli', 'Machhli', 'Machhli', 'Machhli', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Machhli',   'Machhli',   'Machhli',  'Machhli', 'Machhli', 'Machhli', 'Machhli', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Machhli',   'Machhli',   'Machhli',   'Machhli',  'Machhli', 'Machhli', 'Machhli', 'Machhli', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Machhli',   'Machhli',   'Machhli', 'Machhli', 'Machhli',  'Machhli', 'Machhli', 'Machhli', 'Machhli', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Machhli',   'Machhli',   'Machhli', 'Machhli', 'Machhli',  'Machhli', 'Machhli', 'Machhli', 'Machhli', 'Machhli', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Paani me gayi', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', 'Chapaak', ];
        
        // Current index in the sequence
        let currentIndex = 0;

        // Function to handle option click
        function handleOptionClick(action) {
            // Check if the selected action matches the expected action in the sequence
            if (action !== actions[currentIndex]) {
                document.getElementById('select').value = 'Player failed - Out!';
                return;
            }

            // Update the input field with the selected action
            document.getElementById('select').value = action;

            // Move to the next action in the sequence
            currentIndex = (currentIndex + 1) % actions.length;

            // Let the CPU play
            playCPU();
        }

        // Function to let the CPU play
        function playCPU() {
            const cpuAction = actions[currentIndex];
            // Simulate CPU selecting the action
            document.getElementById('select').value = cpuAction;

            // Move to the next action in the sequence
            currentIndex = (currentIndex + 1) % actions.length;
        }

        // Add click event listeners to each option
        document.querySelectorAll('.option').forEach((option) => {
            option.addEventListener('click', () => {
                handleOptionClick(option.getAttribute('name'));
            });
        });

        // Initial call to start the game
        playCPU();
    </script>

</body>
</html>
