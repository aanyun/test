<?php
// Check for safe mode
if( ini_get('safe_mode') ){
    echo "safe_mode";
}else{
    echo "hello";
}
echo shell_exec('/usr/bin/git pull origin master 2>&1');


?>