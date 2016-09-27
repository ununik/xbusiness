<?php
namespace Library\MySQl;

function parse_mysql_dump($url){
    $file_content = file($url);
    foreach($file_content as $sql_line){
          	$result = Connection::connect()->prepare($sql_line);
        	$result->execute();
        	print_r($result);
    }
}