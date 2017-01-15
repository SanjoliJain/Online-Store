<?php

namespace Authenticator;

use Model\User;
use Model\Token;

class Authenticate
{
    private $userDB;
    private $tokenDB;

    public function __construct($databaseFactory)
    {
        $this->userDB = $databaseFactory->getUserMap();
        $this->tokenDB = $databaseFactory->getTokenMap();
    }

    public function authenticate($username, $password)
    {
        $status = false;
        $message = null;
        $token = null;
        $user = $this->getUserByCredentials($username, $password);
        if ($user instanceof User) {
            $this->tokenDB->deleteTokenByUserId($user->userId);
            $tokenObj = $this->generateToken($user->userId);
            $status = true;
            $message = 'Logged In Successfully';
            $token = $tokenObj->token;
        } else {
            $message = 'Invalid Credentials';
        }
        return array('status' => $status, 'message' => $message,'token'=>$token);
    }

    private function generateToken($userId)
    {
        $token = new Token();
	$token->input(array(
		'userId' => $userId,
		'token' => hash_hmac('sha1', time().'|'.$userId,'secret_key')
        ));
        $this->tokenDB->save($token);
        return $token;
    }

    private function getUserByCredentials($username, $password)
    {
        return $this->userDB->getUserByCredentials($username, $password);
    }
    public function isUserLoggedIn($request){
        $token = $request->getHeader('token'); //var_dump($token); die;
        return $this->tokenDB->getTokenObjByToken($token) instanceof Token;
    }

}


?>
