<!DOCTYPE html>
<html>
<head>
    <title>Cronómetro Online</title>
    <style>
        .stopwatch {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }
        .time {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .controls {
            display: flex;
            gap: 10px;
        }
        .laps {
            margin-top: 20px;
        }
        .lap {
            font-size: 24px;
        }
    </style>
</head>
    <body>
        <button id="start">start</button>
        <button id="stop">stop</button>
        <button id="lap">lap</button>
        <button id="reset">reset</button>
        <label id="hours">00</label>:<label id="minutes">00</label>:<label id="seconds">00</label>
        <div class="laps" id="laps"></div>
<script>
  var hoursLabel = document.getElementById("hours");
        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var start = document.getElementById("start");
        var stop = document.getElementById("stop");
        var lap = document.getElementById("lap");
        var reset = document.getElementById("reset");

        var totalSeconds = 0;
        var myInterval;

        start.addEventListener("click", startFun);
        stop.addEventListener("click", stopFun);
        lap.addEventListener("click", lapFun);
        reset.addEventListener("click", resetFun);

        function setTime() {
            ++totalSeconds;
            secondsLabel.innerHTML = pad(totalSeconds % 60);
            minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60) % 60);
            hoursLabel.innerHTML = pad(parseInt(totalSeconds / 3600));
        }

        function pad(val) {
            var valString = val + "";
            if (valString.length < 2) {
                return "0" + valString;
            } else {
                return valString;
            }
        }

        function startFun() {
            myInterval = setInterval(setTime, 1000);
        }

        function stopFun() {
            clearInterval(myInterval);
        }

        function lapFun() {
            let lapTime = formatTime(totalSeconds);
            let lapElement = document.createElement("div");
            lapElement.className = "lap";
            lapElement.innerText = lapTime;
            document.getElementById("laps").appendChild(lapElement);
        }

        function resetFun() {
            clearInterval(myInterval);
            totalSeconds = 0;
            hoursLabel.innerHTML = "00";
            minutesLabel.innerHTML = "00";
            secondsLabel.innerHTML = "00";
            document.getElementById("laps").innerHTML = "";
        }

        function formatTime(totalSeconds) {
            let hours = pad(parseInt(totalSeconds / 3600));
            let minutes = pad(parseInt(totalSeconds / 60) % 60);
            let seconds = pad(totalSeconds % 60);
            return `${hours}:${minutes}:${seconds}`;
        }
</script>
    </body>
</html>
