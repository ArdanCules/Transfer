<?php

namespace App\Controllers;

use App\Models\PlayerModel;
use App\Models\teamModel;
use App\Models\countryModel;

class PlayerController extends BaseController
{
    protected $playerModel;
    protected $teamModel;
    protected $countryModel;

    public function __construct()
    {
        $this->playerModel = new PlayerModel();
        $this->teamModel = new teamModel();
        $this->countryModel = new CountryModel();
    }

    // READ: Menampilkan semua pemain
    public function index()
    {
        $data['players'] = $this->playerModel
            ->select('players.*, teams.name as team_name, countries.name as country_name')
            ->join('teams', 'teams.id = players.team_id')
            ->join('countries', 'countries.id = players.country_id')
            ->findAll();

        return view('players/index', $data);
    }

    // CREATE: Menambahkan pemain baru
    public function create()
    {
        $data['teams'] = $this->teamModel->findAll();
        $data['countries'] = $this->countryModel->findAll();
        return view('players/create', $data);
    }

    public function store()
    {
        $this->playerModel->save([
            'name' => $this->request->getPost('name'),
            'age' => $this->request->getPost('age'),
            'position' => $this->request->getPost('position'),
            'team_id' => $this->request->getPost('team_id'),
            'country_id' => $this->request->getPost('country_id'),
        ]);
        return redirect()->to('/players');
    }

    // EDIT: Form untuk mengedit pemain
    public function edit($id)
    {
        $data['player'] = $this->playerModel->find($id);
        $data['teams'] = $this->teamModel->findAll();
        $data['countries'] = $this->countryModel->findAll();
        return view('players/edit', $data);
    }

    public function update($id)
    {
        $this->playerModel->update($id, [
            'name' => $this->request->getPost('name'),
            'age' => $this->request->getPost('age'),
            'position' => $this->request->getPost('position'),
            'team_id' => $this->request->getPost('team_id'),
            'country_id' => $this->request->getPost('country_id'),
        ]);
        return redirect()->to('/players');
    }

    // DELETE: Menghapus pemain
    public function delete($id)
    {
        $this->playerModel->delete($id);
        return redirect()->to('/players');
    }
}