<?php

fflush(STDIN);
echo "\n\e[33m ############ 欢迎来到phpcmder v0.1! 需要帮助请输入help ###########\n\n";
echo "\e[0m >>> ";
while(1){
   $cmd = fgets(STDIN);
   $cmd = trim($cmd);
   if($cmd=='exit'||$cmd=='exit()'){
       echo "bye!\n";
       break;
   }
   if($cmd=='help'){
     help(); continue;
   }

   $arr_179633571=[];
   exec("php -r '".$cmd."'",$arr_179633571);
   if(count($arr_179633571)==1){
      echo $arr_179633571[0]."\n";
   }else{
      echo json_encode(array_values($arr_179633571), JSON_UNESCAPED_UNICODE+JSON_PRETTY_PRINT)."\n";
   }
   echo '>>> ';
}

function help(){
   echo "\n\e[33m";
   echo "输入 exit或者按ctrl+c可以退出\n";
   echo "可以直接输入php代码回车来执行\n";
   echo "联系作者: admin@liyiru.top\n";
   echo "\n\e[0m";
   echo '>>> ';
}
