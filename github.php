<!DOCTYPE html>

<head>
    <?php include(dirname(__DIR__)."/html/php/head.php");?>
    <script src='js/jquery.js'></script>
</head>
<body>
    <div id="body">
        <button id='github' value="Pull!"></button>
        <script>
        $('#github').onclick(function(e){
            console.log('Hello world!');
        });
        </script>
    </div>
</body>
</html>
