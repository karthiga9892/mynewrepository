<?php

namespace Obs\Validpackage;

class Validpackage
{
    public function emailvalidate(String $email)
    {
    	// echo $email;exit;
       if($this->domainExists($email)) {
        $success = 1;
    $message ='This Domain exists; I will accept this email as valid.';

}
else {
    $success =2;
    $message = 'This Domain does not exists;  Invalid email.';
}
// return $message;
return array('true'=>$success,'message'=>$message,'email'=>$email);
    }

    public function domainExists($email, $record = 'MX'){
    list($user, $domain) = explode('@', $email);
        // $domain = "optisolbusiness.com";
    return checkdnsrr($domain, $record);
}
}