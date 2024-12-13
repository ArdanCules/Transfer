<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table = 'teams';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'league_id'];  // Pastikan kolom 'league_id'

    // Jika Anda ingin membuat fungsi untuk mendapatkan data tim dengan nama liga
    public function getTeamsWithLeagues()
    {
        return $this->select('teams.*, leagues.name as league_name')
                    ->join('leagues', 'leagues.id = teams.league_id')
                    ->findAll();
    }
}