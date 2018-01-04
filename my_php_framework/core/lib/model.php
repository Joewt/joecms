<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 26/11/2017
 * Time: 11:15 AM
 */
namespace core\lib;
use core\lib\config;
class model extends \Medoo\Medoo
{
    public function __construct()
    {
        $option = config::all('database');
        parent::__construct($option);
    }
}