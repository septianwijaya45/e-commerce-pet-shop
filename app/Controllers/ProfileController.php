<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfilModel;
use App\Models\UserModel;
use Myth\Auth\Password;

class ProfileController extends BaseController
{
    protected $user, $profile;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->profile = new ProfilModel();
    }

    public function index($id)
    {
        $group = $this->user->getGroupUser($id);
        $user = $this->user->find($id);
        $profil = $this->profile->where('id_user', $id)->first();

        if($group->group_id == 1){
            $data = [
                'title'     => 'Profil Admin',
                'validation'    => \Config\Services::validation(),
                'user'      => $user,
                'profil'    => $profil
            ];

            return view('profil/index', $data);
        }else{
            $data = [];
            return view('profil/index', $data);
        }
    }

    public function update($id)
    {
        $group = $this->user->getGroupUser($id);
        $profil = $this->profile->where('id_user', $id)->first();
        if($group->group_id == 1){
            if(!$this->validate([
                'nama'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'      => 'Nama Harus Diisi!'
                    ]
                ],
                'no_telepon'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'      => 'Nomor Telepon Harus Diisi!',
                    ]
                ],
                'alamat'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'      => 'Alamat Harus Diisi!'
                    ]
                ],
                'email'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'      => 'Email Harus Diisi!'
                    ]
                ],
                'username'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'      => 'Username Harus Diisi!'
                    ]
                ],
                
            ])){
                session()->setFlashdata('error', 'Failed to update data!');
                return redirect()->back();
            }
            // check when password is valiable
            if($this->request->getVar('password') != null || $this->request->getVar('password') != ''){
                $this->user->update($id, [
                    'email'     => $this->request->getVar('email'),
                    'username'  => $this->request->getVar('username'),
                    'password_hash' =>  Password::hash($this->request->getVar('password'))
                ]);

                if($profil){
                    $this->profile->update($profil->id, [
                        'nama'          => $this->request->getVar('nama'),
                        'no_telepon'    => $this->request->getVar('username'),
                        'alamat'        => $this->request->getVar('alamat')
                    ]);
                }else{
                    $this->profile->insert([
                        'id_user'       => $id,
                        'nama'          => $this->request->getVar('nama'),
                        'no_telepon'    => $this->request->getVar('username'),
                        'alamat'        => $this->request->getVar('alamat')
                    ]);
                }
            }else{
                $this->user->update($id, [
                    'email'     => $this->request->getVar('email'),
                    'username'  => $this->request->getVar('username'),
                    'password_hash' =>  Password::hash($this->request->getVar('password'))
                ]);

                if($profil){
                    $this->profile->update($profil->id, [
                        'nama'          => $this->request->getVar('nama'),
                        'no_telepon'    => $this->request->getVar('username'),
                        'alamat'        => $this->request->getVar('alamat')
                    ]);
                }else{
                    $this->profile->insert([
                        'id_user'       => $id,
                        'nama'          => $this->request->getVar('nama'),
                        'no_telepon'    => $this->request->getVar('username'),
                        'alamat'        => $this->request->getVar('alamat')
                    ]);
                }
            }

            session()->setFlashdata('success', 'Berhasil Edit data!');
            return redirect()->back();
        }
    }
}
