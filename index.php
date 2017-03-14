<!DOCTYPE html>

<head>
    <?php include(dirname(__DIR__)."/html/php/head.php");?>
    <script src='js/jquery.js'></script>
</head>
<body>
    <!--Header-->
    <?php include(dirname(__DIR__)."/html/php/header.php");?>
    <div id="body">
        <!--Select Memestreme-->
        <div class="card">
            <div class="line">
                <span>Currently displaying memes by freshness</span>
            </div>
            <div class="line">
                <span>TODO - show me the freshest memes</span>
            </div>
            <div class="line">
                <span>TODO - show me the spiciest memes</span>
            </div>
        </div>
        <!--Upload Meme-->
        <div class="card">
            <span>Your meme here!</span>
            <input type="file" id='file'></input>
            <input type='button' id='upload' value="upload"></input>
            <script src='js/upload.js'></script>
            <span id='UploadMessage'></span>
        </div>
        <!--Memes-->
    </div>
</body>
</html>
