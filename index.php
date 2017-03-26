<!DOCTYPE html>
<head>
    <?php include(dirname(__DIR__)."/html/php/head.php");?>
    <link rel="stylesheet" type='text/css' href="css/freshmemes.css">
    <script src='js/jquery.js'></script>
    <!--Captcha woohoo-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
        </div>
        <!--Captcha verification-->
        <div id='captchaBlock' class="card">
            <form id="captchaForm" class="form" action="index.php" method="post">
                <div class="g-recaptcha" data-sitekey="6Lc4QxoUAAAAALrigh2xUtSNbOXXg7N_k1WB8dzR"></div>
                <input type="submit" name="submit" value="Unlock Voting and Uploading">
                <!--Need the submit system firing. GetCookie verifies captcha, CheckCookie will...? -->
            </form>
        </div>
        <!--Upload Meme-->
        <div id='uploadBlock' class="card" style='display: block;'>
            <span>Your meme here!</span>
            <input type='button' id='upload' value="upload"></input>
            <input type="file" id='file'></input>
            <script src='js/upload.js'></script>
            <span id='UploadMessage'></span>
        </div>
        <!--Memes-->
        <div id='memes'>
            <script src='js/memes.js'></script>
            <!--Script auto-puts in the memes.-->
        </div>
    </div>
</body>
</html>
