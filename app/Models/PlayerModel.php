<?php

namespace App\Models;

use CodeIgniter\Model;

class PlayerModel extends Model
{
    protected $table = 'players';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'age', 'position', 'team_id', 'country_id'];
}