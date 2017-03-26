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
        <div id='captchaBlock' style='display: none;'>
            <span>TODO: Captcha unlock</span>
            <form class="form" action="index.php" method="post">
                <div class="g-recaptcha" data-sitekey="6Lc4QxoUAAAAALrigh2xUtSNbOXXg7N_k1WB8dzR"></div>
                <!--Need the submit system firing. GetCookie verifies captcha, CheckCookie will...? -->
            </form>
        </div>
        <!--Upload Meme-->
        <div class="card" style='display: block;'>
            <span>Your meme here!</span>
            <input type="file" id='file'></input>
            <input type='button' id='upload' value="upload"></input>
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
