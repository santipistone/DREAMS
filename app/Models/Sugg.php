<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Sugg extends Model
{
   protected $connection = 'mongodb';
   protected $collection = 'suggestion';

}
?>