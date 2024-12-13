<?php

namespace App\Controllers;

use App\Models\teamModel;
use App\Models\leaguesModel;

class teamController extends BaseController
{
    protected $teamModel;
    protected $leagueModel;

    public function __construct()
    {
        $this->teamModel = new TeamModel();
        $this->leagueModel = new LeaguesModel();
    }

    // READ: Menampilkan semua tim
    public function index()
    {
        $data['teams'] = $this->teamModel
            ->select('teams.*, leagues.name as league_name')
            ->join('leagues', 'leagues.id = teams.league_id')
            ->findAll();
        return view('teams/index', $data);
    }

    // CREATE: Menambahkan tim baru
    public function create()
    {
        $data['leagues'] = $this->leagueModel->findAll();
        return view('teams/create', $data);
    }

    public function store()
    {
        $this->teamModel->save([
            'name' => $this->request->getPost('name'),
            'league_id' => $this->request->getPost('league_id'),
        ]);
        return redirect()->to('/teams');
    }

    // EDIT: Form untuk mengedit data tim
    public function edit($id)
    {
        $data['team'] = $this->teamModel->find($id);
        $data['leagues'] = $this->leagueModel->findAll();
        return view('teams/edit', $data);
    }

    public function update($id)
    {
        $this->teamModel->update($id, [
            'name' => $this->request->getPost('name'),
            'league_id' => $this->request->getPost('league_id'),
        ]);
        return redirect()->to('/teams');
    }

    // DELETE: Menghapus data tim
    public function delete($id)
    {
        $this->teamModel->delete($id);
        return redirect()->to('/teams');
    }
}