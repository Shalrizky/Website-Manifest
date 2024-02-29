<?php

namespace App\Controllers;

use App\Models\ClientSyaksiahModel;

class SyaksiahController extends BaseController
{
    protected $clientSyaksiahModel;

    public function __construct()
    {
        $this->clientSyaksiahModel = new ClientSyaksiahModel();
    }

    public function index_syaksiah()
    {
        $data = [
            'title' => 'Client Data Syaksiah',
            'created_at' => date('Y-m-d'),

        ];
        return view('pages/v_index_syaksiah', $data);
    }

    public function ambilDataClient()
    {
        if ($this->request->isAJAX()) {
            $client = $this->clientSyaksiahModel->getClient();
            $data = [
                'client' => $client,
            ];

            $view = view('pagePartision/dataClientSyaksiah', $data);

            return $this->response->setJSON(['data' => $view]);
        } else {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'AJAX request expected']);
        }
    }

    public function simpanDataClient()
    {
        if ($this->request->isAJAX()) {
            if ($this->request->isAjax()) {
                $validation = \Config\Services::validation();

                // Aturan validasi
                $validationRules = [
                    'nama_client_syaksiah' => 'required',
                    
                ];

                $validationMessages = [
                    'nama_client_syaksiah' => [
                        'required' => 'Nama client tidak boleh kosong',
                    ],
                  
                ];

                if (!$this->validate($validationRules, $validationMessages)) {
                    $msg = [
                        'error' => $validation->getErrors(),
                    ];
                    return $this->response->setStatusCode(200)->setJSON($msg);
                } else {

                    // Try inserting data into the database
                    try {
                        $clientSyaksiahData = [
                            'nama_client_syaksiah' => $this->request->getVar('nama_client_syaksiah'),
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d'),
                        ];

                        $this->clientSyaksiahModel->insert($clientSyaksiahData);

                        $msg = [
                            'success' => "Data berhasil ditambahkan!",
                        ];

                        return $this->response->setStatusCode(200)->setJSON($msg);
                    } catch (\Exception $e) {
                        $msg = [
                            'errorDatabase' => "Terjadi kesalahan saat menambahkan data: " . $e->getMessage(),
                        ];
                        return $this->response->setStatusCode(500)->setJSON($msg);
                    }
                }
            }
        }
    }

}
