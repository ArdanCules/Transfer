<?php

namespace App\Models;

use CodeIgniter\Model;

class transfersModel extends Model
{
    protected $table = 'transfers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['player_id', 'from_team_id', 'to_team_id', 'transfer_fee', 'transfer_date'];
}