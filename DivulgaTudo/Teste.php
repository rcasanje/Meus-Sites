<?php
printf("%s/%s/%s", date('d'), date('m'), date('Y'));
printf("<br>%s:%s:%s", date('H'), date('i'), date('s'));
echo("<br>---------- WITH TIME ZONE ----------");
date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y H:i:s');
echo("<br>".$data."<br>");
?>