<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 09.03.2019
 * Time: 22:14
 */

namespace IDefendApi\DataStorage;


class File
{
    public $content;

    public $mimeType;

    public $name;


    public function __construct($content,$mimeType,$name)
    {
        $this->content=$content;
        $this->mimeType=$mimeType;
        $this->name=$name;
    }

}