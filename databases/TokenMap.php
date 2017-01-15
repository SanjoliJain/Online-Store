<?php

namespace DBC;

class TokenMap extends ObjectMap
{
    protected $table = 'token';
    protected $primary = 'tokenId';

    public function getTokenObjByToken( $token )
    {
        return $this->find()->where('token',$token)->get();
    }
    public function deleteTokenByUserId( $userId )
    {
        return $this->where('userId', $userId)->delete();
    }

}

 ?>
