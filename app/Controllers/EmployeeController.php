<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelEmployees;
use CodeIgniter\I18n\Time;

class EmployeeController extends BaseController
{
    protected $modelEmployees;

    public function __construct()
    {
        $this->modelEmployees = new ModelEmployees();
    }

    public function index()
    {
        helper(['form']);

        $data = [
            'title' => 'Beranda Data Karyawan',
            'employees' => $this->modelEmployees->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('pages/employee/index', $data);
    }

    public function store()
    {
        $name = $this->request->getVar('name');
        $position = $this->request->getVar('position');
        $salary = $this->request->getVar('salary');

        $rules = [
            'name' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'alpha_space' => 'Nama harus berupa huruf'
                ]
            ],
            'position' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Posisi harus diisi',
                    'alpha_space' => 'Posisi harus berupa huruf'
                ]
            ],
            'salary' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gaji harus diisi',
                ]
            ],
        ];

        if ($this->validate($rules)) {
            // Decimal Number
            $decimalSalary = (float) str_replace('.', '', $salary);

            $data = [
                'name' => $name,
                'position' => $position,
                'salary' => $decimalSalary,
            ];

            $this->modelEmployees->save($data);
            session()->setFlashdata('success', 'Data karyawan berhasil ditambahkan');
            return redirect()->to(base_url('/'));
        }

        session()->setFlashdata('error', 'Data karyawan yang anda masukkan tidak valid');
        return redirect()->back()->withInput();
    }

    public function show(int $employeeId)
    {
        $data = [
            'title' => 'Lihat Data Karyawan',
            'employee' => $this->modelEmployees->where('employee_id', $employeeId)->first(),
        ];

        return view('pages/employee/show', $data);
    }

    public function edit(int $employeeId)
    {
        helper(['form']);

        $data = [
            'title' => 'Edit Data Karyawan',
            'employee' => $this->modelEmployees->where('employee_id', $employeeId)->first(),
        ];

        return view('pages/employee/edit', $data);
    }


    public function update(int $employeeId)
    {
        $name = $this->request->getVar('name');
        $position = $this->request->getVar('position');
        $salary = $this->request->getVar('salary');

        $rules = [
            'name' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'alpha_space' => 'Nama harus berupa huruf'
                ]
            ],
            'position' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Posisi harus diisi',
                    'alpha_space' => 'Posisi harus berupa huruf'
                ]
            ],
            'salary' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gaji harus diisi',
                ]
            ],
        ];

        if ($this->validate($rules)) {
            // Decimal Number
            $decimalSalary = (float) str_replace('.', '', $salary);

            $data = [
                'name' => $name,
                'position' => $position,
                'salary' => $decimalSalary,
                'updated_at' => Time::now(),
            ];

            $this->modelEmployees
                ->where('employee_id', $employeeId)
                ->set($data)
                ->update();

            session()->setFlashdata('success', 'Data karyawan berhasil diubah');
            return redirect()->to(base_url('/'));
        }

        session()->setFlashdata('error', 'Data karyawan yang anda masukkan tidak valid');
        return redirect()->back()->withInput();
    }

    public function delete(int $employeeId)
    {
        $employee = $this->modelEmployees->where('employee_id', $employeeId)->first();

        if (!$employee) {
            session()->setFlashdata('error', 'Data karyawan gagal dihapus');
            return redirect()->back();
        }

        $this->modelEmployees->delete($employeeId);
        session()->setFlashdata('success', 'Data karyawan berhasil dihapus');
        return redirect()->to(base_url('/'));
    }
}
