<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Mongo extends Model
{
   protected $connection = 'mongodb';
   protected $collection = 'user';

}
?>