<?php
echo 'Произошла ошибка: <br>';
echo 'Line:' . $e->getLine() . "<br>";
echo 'File:' . $e->getFile() . "<br>";
echo $e->getMessage() . "<br>";
echo $e->getTraceAsString();
