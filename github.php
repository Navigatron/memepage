<!DOCTYPE html>

<head>
    <?php include(dirname(__DIR__)."/html/php/head.php");?>
    <script src='js/jquery.js'></script>
</head>
<body>
    <div id="body">
        <?php
        if (isset(_GET['pull']) && _GET['pull']==true) {
            echo 'I hear you!';
        }
         ?>
        <button id='github'>Pull</button>
        <script>
        $('#github').on('click', function(e){
            $.get('http://jeretho.zzzz.io/github.php?pull=true');
        });
        </script>
    </div>
</body>
</html>
