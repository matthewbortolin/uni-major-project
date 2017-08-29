<?php
function validPhone($phone){
            
            $regexMob = "/^0[4,5]\d\d\d\d\d\d\d\d$/" ;
            $regexLand = "/^\(0[2,3,6,7,8,9]\)\s\d\d\d\d\d\d\d\d$/";

             if (preg_match($regexMob,$phone) || preg_match($regexLand, $phone)){
  
                     return true;           
             } 
   
             else{

                    return false;
              }
}

?>