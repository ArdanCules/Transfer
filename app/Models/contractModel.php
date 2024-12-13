<?php

namespace App\Models;

use CodeIgniter\Model;

class ContractModel extends Model
{
    protected $table = 'contracts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['player_id', 'team_id', 'start_date', 'end_date', 'salary'];
}