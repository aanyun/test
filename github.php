<?php
// Check for safe mode
if( ini_get('safe_mode') ){
    echo "safe_mode";
}else{
    echo "hello";
}
echo shell_exec('git pull origin master');


?>