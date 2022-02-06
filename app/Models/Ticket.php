<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Ticket extends Model
{
   protected $connection = 'mongodb';
   protected $collection = 'ticket';

}
?>