<!DOCTYPE html>

<head>
    <?php include(dirname(__DIR__)."/html/php/head.php");?>
    <script src='js/jquery.js'></script>
</head>
<body>
    <?php include(dirname(__DIR__)."/html/php/header.php");?>
    <div id="body" class='card'>
        <?php
        include(dirname(__DIR__)."/html/php/ReportErrors.php");
        echo 'About to IF';
        if(isset($_GET['pull'])){
            echo ', _GET[pull] is set';
            echo ', it is equal to '.$_GET['pull'];
        } else {
            echo ', get is not set!';
        }
        if (isset($_GET['pull']) && $_GET['pull']=='true') {
            echo ', I hear you!<br/><br/>Git status:<br/>';
            echo shell_exec('git status');
            echo '<br/>Git fetch:<br/>';
            echo shell_exec('git fetch');
            echo '<br/>Git pull:<br/>';
            echo shell_exec('git pull');
            echo '<br/>Git status:<br/>';
            echo shell_exec('git status');
        }//*/
         ?>
        <button id='github'>Pull</button>
        <script>
        $('#github').on('click', function(e){
            console.log('Hreffing...');
            window.location.href = 'http://jeretho.zzzz.io/github.php?pull=true';
        });
        </script>
    </div>
</body>
</html>
