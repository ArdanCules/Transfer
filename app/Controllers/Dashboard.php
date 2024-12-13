<?php

namespace App\Controllers;

use App\Models\AgentModel;
use App\Models\ContractModel;
use App\Models\CountryModel;
use App\Models\LeaguesModel;
use App\Models\PlayerModel;
use App\Models\TeamModel;
use App\Models\TransfersModel;

class Dashboard extends BaseController
{
    protected $agentModel;
    protected $contractModel;
    protected $countryModel;
    protected $leaguesModel;
    protected $playerModel;
    protected $teamModel;
    protected $transfersModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->agentModel = new AgentModel();
        $this->contractModel = new ContractModel();
        $this->countryModel = new CountryModel();
        $this->leaguesModel = new LeaguesModel();
        $this->playerModel = new PlayerModel();
        $this->teamModel = new TeamModel();
        $this->transfersModel = new TransfersModel();
    }

    public function index()
    {
        // Mengecek apakah pengguna sudah login
        

        // Mengambil data dari model
       
        $contracts = $this->contractModel->findAll();
        $countries = $this->countryModel->findAll();
        $leagues = $this->leaguesModel->findAll();
        $players = $this->playerModel->findAll();
        $teams = $this->teamModel->findAll();
        $transfers = $this->transfersModel->findAll();

        // Mengirim data ke view
        return view('dashboard/index', [
            
            'contracts' => $contracts,
            'countries' => $countries,
            'leagues' => $leagues,
            'players' => $players,
            'teams' => $teams,
            'transfers' => $transfers,
        ]);
    }
}
