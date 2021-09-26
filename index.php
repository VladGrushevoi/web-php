<html>
 <head>
  <title>PHP Test</title>
  <link rel="stylesheet" href="css/index.css">
 </head>
 <body>
     <h1>Лабораторні роботи WEB</h1>
     <div class="container">
    <?php
    // $app->get('/cowsay', function() use($app) {
    //     $app['monolog']->addDebug('cowsay');
    //     return "<pre>". \Cowsayphp\Cow::say("Cool beans") ."</pre>";
    //   });
    // require('../vendor/autoload.php');
        $buttons_labs = [
            "1-laba.php"=>"Перша лабораторна","2-laba.php"=>"Друга лабораторна",
            "3-laba.php"=>"Третя лабораторна","4-laba.php"=>"Четверта лабораторна",
            "5-laba.php"=>"П'ята лабораторна","6-laba.php"=>"Шоста лабораторна",
            "7-laba.php"=>"Сьома лабораторна","8-laba.php"=>"Восьма лабораторна"
        ];
        ;
        foreach($buttons_labs as $key => &$button){
            echo "<a href=\"labs/$key\"> $button </a>";
        }
    ?>
    </div>
 </body>
</html>