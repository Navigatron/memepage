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
        function leg($text){//Are you sure there are no issues?
            echo $text.'<br/>';
        }
        echo 'Calling function...';
        leg('Handling...');
        echo 'Whats wrong?';
        if(isset($_GET['pull'])){
            leg('pull is set!');
        } else {
            leg('pull is Not set :(');
            leg('');
            leg('Status:');
            leg('');
            leg(shell_exec('git status'));
        }
        if (isset($_GET['pull']) && $_GET['pull']=='true') {
            leg('Pull is set to true, Pulling!');
            leg('Status before pull:');
            leg('');
            leg(shell_exec('git status'));
            leg('');
            leg('Fetching changes:');
            leg('');
            leg(shell_exec('git fetch 2>&1'));
            leg('');
            leg('Merging Changes:');
            leg('');
            leg(shell_exec('git merge 2>&1'));
            leg('');
            leg('Status after pull: ');
            leg('');
            leg(shell_exec('git status'));

        }//*/
        //Pointless change to test git system
         ?>
        <button id='github'>Pull</button>
        <script>
        $('#github').on('click', function(e){
            console.leg('Hreffing...');
            window.location.href = 'http://jeretho.zzzz.io/github.php?pull=true';
        });
        </script>
    </div>
</body>
</html>
