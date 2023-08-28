<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <style>
    /* Center the ulbox */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    #ulbox {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    /* Style the webcam container */
    #webcam-container {
        width: 500px;
        height: 500px;
        border: 1px solid #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #status {

        width: 500px;
        height: 40px;
        background-color: green;


    }
    </style>


</head>

<body>


    <div id="ulbox">

        <h2>Face Mask Detection System</h2>

        <div id="webcam-container"></div>

        <br>

        <button type="button" onclick="init()" class="btn btn-primary">Start Processing</button>

        <br>
        <br>
        <div id="status">
            <h3 id="status-display" style="text-align: center; color:white;">Allowed</h3>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js">
    </script>

    <script type="text/javascript">
    // More API functions here:
    // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

    // the link to your model provided by Teachable Machine export panel


    let model, webcam, maxPredictions;

    // Load the image model and setup the webcam
    async function init() {
        const modelURL = "ai-brain/model.json";
        const metadataURL = "ai-brain/metadata.json";

        // load the model and metadata
        // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
        // or files from your local hard drive
        // Note: the pose library adds "tmImage" object to your window (window.tmImage)
        model = await tmImage.load(modelURL, metadataURL);
        maxPredictions = model.getTotalClasses();

        webcam = new tmImage.Webcam(500, 500, true); // width, height, flip
        await webcam.setup(); // request access to the webcam
        await webcam.play();
        window.requestAnimationFrame(loop);

        // append elements to the DOM
        document.getElementById("webcam-container").appendChild(webcam.canvas);
    }

    async function loop() {
        webcam.update(); // update the webcam frame
        await predictor();
        window.requestAnimationFrame(loop);
    }


    var Isplaying = "no";

    async function predictor() {
        // predict can take in an image, video, or canvas HTML element
        const prediction = await model.predict(webcam.canvas);

        // Find the index of "with mask" and "without mask" classes in the predictions
        let withMaskIndex = -1;
        let withoutMaskIndex = -1;

        for (let i = 0; i < maxPredictions; i++) {
            if (prediction[i].className === "with mask") {
                withMaskIndex = i;
            } else if (prediction[i].className === "without mask") {
                withoutMaskIndex = i;
            }
        }

        if (withMaskIndex !== -1 && withoutMaskIndex !== -1) {

            const withMaskProbability = prediction[withMaskIndex].probability;
            const withoutMaskProbability = prediction[withoutMaskIndex].probability;


            if (withMaskProbability > withoutMaskProbability) {
                document.getElementById("status").style.backgroundColor = "green";
                document.getElementById("status-display").innerHTML = "Allowed: " + withMaskProbability.toFixed(2);
            } else if (withoutMaskProbability > withMaskProbability) {


                if (Isplaying === "no") {

                    Isplaying = "yes";

                    const warningSound = new Audio('media/warning-sound.mp3');
                    warningSound.play();

                    // Add an event listener to change Isplaying back to "no" when the sound ends
                    warningSound.addEventListener("ended", function() {
                        Isplaying = "no";
                    });
                }

                document.getElementById("status").style.backgroundColor = "red";
                document.getElementById("status-display").innerHTML = "Disallowed: " + withoutMaskProbability
                    .toFixed(2);
            }


        }
    }
    </script>
</body>

</html>