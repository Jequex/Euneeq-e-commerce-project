<?php
/**************************/
/**** functions ***********/
/**************************/

function sanitizeString($var){
    // Sanitizes string and text inputed from form elements
    @$var = strip_tags($var);
    @$var = htmlentities($var);
    @$var = stripslashes($var);
    return @mysql_real_escape_string($var);
    }
?>