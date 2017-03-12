<!DOCTYPE html>

<head>
    <?php include(dirname(__DIR__)."/html/php/head.php");?>
    <script src='js/jquery.js'></script>
</head>
<body>
    <?php include(dirname(__DIR__)."/html/php/header.php");?>
    <div id="body" class='card'>
        <?php
        echo 'Including error reporting...';
        include(dirname(__DIR__)."/html/php/ReportErrors.php");
        echo 'declaring function...';
        function log($text){
            echo $text.'<br/>';
        }/*
        echo 'Calling function...';
        log('Handling...');
        echo 'Whats wrong?;
        if(isset($_GET['pull'])){
            log('pull is set!');
        } else {
            log('pull is Not set :(');
            log('');
            log('Status:');
            log('');
            log(shell_exec('git status'));
        }
        if (isset($_GET['pull']) && $_GET['pull']=='true') {
            log('Pull is set to true, Pulling!');
            log('Status before pull:');
            log('');
            log(shell_exec('git status'));
            log('');
            log('Fetching changes:');
            log('');
            log(shell_exec('git fetch 2>&1'));
            log('');
            log('Merging Changes:');
            log('');
            log(shell_exec('git merge 2>&1'));
            log('');
            log('Status after pull: ');
            log('');
            log(shell_exec('git status'));

        }//*/
        //Pointless change to test git system
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
