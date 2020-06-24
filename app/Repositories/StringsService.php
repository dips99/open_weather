<?php
namespace App\Repositories;


class StringsService{
    public  function str_palindrome($str)
    {
        $response = 'Palindrome given string - '.$str;
        if(strlen($str)==0 || strlen($str)==1){
            $ret = $response;
			return $ret;
		}
		else{
			$strLen = strlen($str)-1;
    		$revStr = '';
			for($i=$strLen; $i>=0; $i--){
				$revStr.=$str[$i];
            }
            $ret = $response.' reverse string -' .$revStr;
			if($revStr == $str)
				return $ret;
			else
				return 'not a'.$ret;
		}
    }
}