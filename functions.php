<?php

use Main\Rule;
use Main\Validate;
use Main\Model\User;







function Add_Days_Simple($date1,$number_of_days){
    
  
     $str =' + '. $number_of_days. ' month';

    $date2= date('d-m-Y', strtotime($date1 . $str)); 

    return $date2; //$date2 is a string
}//[end function]



/**
 * @param $date1 - data inicial
 * @param $number_of_days - quantidade de periodos
 * @param $number_of_plots - parcela atual
 */
function Add_Days($date1,$number_of_days,$number_of_plots){
    
    $str =' + '. ($number_of_plots - 1). ' month';
    $date2= date('d/m/Y', strtotime($date1 . $str)); 


    return $date2; 

}//[end function]




function GetDaysDiference($date_one, $date_two)
{ 
    return ( strtotime($date_one) - strtotime($date_two) ) /60/60/24;
}



function FormatPrice($value)
{
return str_replace('.',',',$value);
}

function GetDay($date){

    return date('d', strtotime($date));

}



    function ValidateDate($date){

        return date('d/m/Y', $date );
    }

    function FormatDate($date){

            return date('d/m/Y', strtotime($date));

        }

    function FomartDateShortYear($date){

        return date('d/m/y', strtotime($date)); 

    }


    function GetActualDate(){
        return date('d/m/Y');
    }

    function GetYear(){
        return date('Y');
    }

    function setHash($value){

        return Validate::setHash( $value );

    }

    function getHash($value){

        return Validate::getHash( $value );

    }

    function CheckLogin()
    {
        if( User::checkLogin() )
        {
            User::setError(Rule::ALREADY_CONNECTED);
            header("Location: /dashboard");
            exit;
        }
    }


    function getConstValues($results,$item)
    {
       
        return $results[0][$item];
      
    }
    
?>