<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DirectConnection extends Model
{
   protected $connection = 'mongodb';
   protected $collection = 'direct_connection';

}
?>