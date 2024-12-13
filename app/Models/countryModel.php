<?php

namespace App\Models;

use CodeIgniter\Model;

class countryModel extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'continent'];
}