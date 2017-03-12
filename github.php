<!DOCTYPE html>

<head>
    <?php include(dirname(__DIR__)."/html/php/head.php");?>
    <script src='js/jquery.js'></script>
</head>
<body>
    <div id="body">
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
            echo ', I hear you!';
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
