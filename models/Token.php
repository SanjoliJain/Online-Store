<?php

namespace Model;

use Model\BaseModel;

class Token extends BaseModel
{
    protected $keys = array('userId', 'token');
    protected $primary = 'tokenId';
}

?>
