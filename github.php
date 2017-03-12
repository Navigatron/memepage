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
        leg('Error reporting is ON.');
        function leg($text){
            echo $text.'<br/>';
        }
        if(isset($_GET['action'])){
            leg('Action is set!');
            if($_GET['action']=='status'){
                leg('Action is set to Status!');
                leg('');
                leg('Status before Fetch:');
                leg('');
                leg(shell_exec('git status'));
                leg('');
                leg('Fetching changes:');
                leg('');
                leg(shell_exec('git fetch 2>&1'));
                leg('');
                leg('Status after fetch: ');
                leg('');
                leg(shell_exec('git status'));
            }elseif ($_GET['action']=='pull') {
                leg('Action is set to Pull!');
                leg('');
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
            }else{
                leg('Action is WRONG! current setting: '.$_GET['action']);
            }
        } else {
            leg('Action is not set!');
            leg('Welcome to the Version control system!');
        }
        //Pointless change to test git system
         ?>
         <button id='status'>Status</button>
        <button id='pull'>Pull</button>
        <script>
        $('#status').on('click', function(e){
            console.log('Hreffing...');
            window.location.href = 'http://jeretho.zzzz.io/github.php?action=status';
        });
        $('#pull').on('click', function(e){
            console.log('Hreffing...');
            window.location.href = 'http://jeretho.zzzz.io/github.php?action=pull';
        });
        </script>
    </div>
</body>
</html>
