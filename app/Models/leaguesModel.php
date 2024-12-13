<?php

namespace App\Models;

use CodeIgniter\Model;

class leaguesModel extends Model
{
    protected $table = 'leagues';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'country_id'];
}