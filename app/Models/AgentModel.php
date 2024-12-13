<?php

namespace App\Models;

use CodeIgniter\Model;

class AgentModel extends Model
{
    protected $table = 'agents';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'contact_info'];
}