<?php

$dis_func = ini_get('disable_functions');
echo "\n\e[33m############ 欢迎来到phpcmder v0.1! 需要帮助请输入help ###########\n";
echo "############ Welcome to phpcmder V0.1! If you need to help, please enter help ###########\n\n";
echo "\e[0m";
$cmd='';
while(1){
    if (!function_exists("readline")) {
        echo "\e[33m Readline extension not available.\n";
        break;
    }

    //tab activity
    readline_completion_function(function ($get_cmd) use (&$cmd){
        if($get_cmd==''){
          return false;
        }
        $func = get_defined_functions() ?? [];
        $arr = [];
        foreach($func['internal'] as $func_name){
          if($res = strstr($func_name, $get_cmd)){
                $arr[] = $res;                
             }
        }
        if($arr && count($arr)<12){
            echo "\n\n".implode("\t", $arr),"\n\n";
            $cmd = readline(">>> ");
        }
    });

    $cmd = readline(">>> ");
    $cmd = trim($cmd);
    if($cmd===""){
        continue;
    }
    if($cmd=='exit'||$cmd=='exit()'){
       echo "bye!\n";
       break;
    }
    if($cmd=='help'){
       help(); continue;
    }

    $arr_179633571=[];
    $os = strtolower( php_uname('s') );

    if(is_numeric($cmd)){
      echo $cmd."\n";
      continue;
    }
    
    if($cmd[0]=='$' && strpos(trim($cmd),' ')==false){
        $cmd = "var_dump($cmd);";
    }

    if(substr($cmd, -1)!=';'){
      $cmd .= ';';
    }

    echo "\e[32m";
    if(strpos($dis_func, 'eval') == false){
      $res = eval($cmd);
      readline_add_history($cmd);
      echo "\e[0m\n";  
      continue;
    }
    
    if($os=='windows nt'){
        exec('php -r "'.$cmd.'"',$arr_179633571);
    }else{
        str_replace("'", "\'", $cmd);
        exec("php -r '$cmd'",$arr_179633571);
    }
    readline_add_history($cmd);
    echo implode("\n",$arr_179633571)."\n";
    echo "\e[0m";
}

function help(){
   echo "\n\e[33m";
   echo "输入 exit或者按ctrl+c可以退出\n";
   echo "Enter exit or press Ctrl+C to exit\n";
   echo "可以直接输入php代码回车来执行\n";
   echo "联系作者: admin@liyiru.top\n";
   echo "Author: admin@liyiru.top\n";
   echo "\n\e[0m";
}
