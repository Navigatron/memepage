<!DOCTYPE html>
<head>
    <script type="text/javascript">
        window.voting = false;
    </script>
    <!--Generic Head data-->
    <?php include(dirname(__DIR__)."/html/php/head.php");?>
    <!--Specific styling for this page-->
    <link rel="stylesheet" type='text/css' href="css/freshmemes.css">
    <!--JQuery-->
    <script src='js/jquery.js'></script>
    <!--Captcha woohoo-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!--My captcha ajax verification script-->
    <script src='js/unlock.js'></script>
    <!--For uploading memes.-->
    <script src='js/upload.js'></script>
    <!--For showing memes, by freshness. TODO: decide on script based on php get-->
    <script src='js/memes.js'></script>
    <!--Enable voting on memes - 'dooting'-->
    <script src='js/doot.js'></script>
    <!--PHP puts a script here if the user is verified human.-->
    <?php
        if(isset($_COOKIE['token'])){
            //Verify the token.
            require_once(dirname(__DIR__).'/html/php/verify.php');
            $result = verify($_COOKIE['token']);
            if($result){
                //MORE_MAGIC
                ?>
                <script type="text/javascript">
                    $(document).ready(function(){
                        unlock();
                    });
                </script>
                <?php
            }//*/
        }
     ?>
</head>
<body>
    <!--Header-->
    <?php include(dirname(__DIR__)."/html/php/header.php");?>
    <div id="body">
        <!--Select Memestreme-->
        <div id="sortBlock" class="card">
                <span>Currently displaying memes by freshness</span>
        </div>
        <!--Captcha verification - to unlock upload and voting-->
        <div id='captchaBlock' class="card">
            <form id="captchaForm" class="form" action="index.php" method="post">
                <div class="g-recaptcha" data-sitekey="6Lc4QxoUAAAAALrigh2xUtSNbOXXg7N_k1WB8dzR"></div>
                <input type="submit" name="submit" value="Unlock Voting and Uploading">
                <span id="captchaFeedback"></span>
                <!--Need the submit system firing. GetCookie verifies captcha, CheckCookie will...? -->
            </form>
        </div>
        <!--Upload Meme - Unlocked by Captcha verification-->
        <div id='uploadBlock' class="card" style='display: none;'>
            <span>Your meme here!</span>
            <input type='button' id='upload' value="upload"></input>
            <input type="file" id='file'></input>
            <span id='UploadMessage'></span>
        </div>
        <!--Memes-->
        <div id='memes'>
        </div>
        <div id='moarMemes'>
            <button id='moarMemesButton' type="button" name="button">Moar Memes</button>
        </div>
    </div>
</body>
</html>
