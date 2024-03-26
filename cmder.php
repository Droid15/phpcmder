<?php

fflush(STDIN);
echo "\n\e[33m ############ 欢迎来到phpcmder v0.1! 需要帮助请输入help ###########\n\n";
echo "\e[0m";
while(1){
    if (!function_exists("readline")) {
        echo "\e[33m Readline extension not available.\n";
        break;
    }

    readline_completion_function(function ($cmd) {
        return [];
    });

    $cmd = readline(">>> ");
    $cmd = trim($cmd);
    if($cmd=='exit'||$cmd=='exit()'){
       echo "bye!\n";
       break;
    }
    if($cmd=='help'){
       help(); continue;
    }

    $arr_179633571=[];
    $os = strtolower( php_uname('s') );
    if($os=='windows nt'){
        exec('php -r "'.$cmd.'"',$arr_179633571);
    }else{
        exec("php -r '$cmd'",$arr_179633571);
    }
    var_dump($arr_179633571);
}

function help(){
   echo "\n\e[33m";
   echo "输入 exit或者按ctrl+c可以退出\n";
   echo "可以直接输入php代码回车来执行\n";
   echo "联系作者: admin@liyiru.top\n";
   echo "\n\e[0m";
   echo '>>> ';
}
