<?php 

class sanitize
{
      public static function sqlSanitize($var)
    {
        $var= addslashes($var);
        return $var;
    }
}


?>
