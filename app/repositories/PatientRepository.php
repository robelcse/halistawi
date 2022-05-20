<?php

namespace App\repositories;

use App\Models\Patient;
use App\interfaces\CrudInterface;
use Illuminate\Http\Request;

class PatientRepository implements CrudInterface
{
    public function getAll()
    {
        $patients = Patient::orderBy('patient_id', 'desc')->get();
        return $patients;
    }
    public function findById($id)
    {
        $patient = Patient::findOrfail($id);
        return $patient;
    }
    public function create(Request $request)
    {
        $patient = Patient::create($request->all());
        return $patient;
    }
    public function edit(Request $request, $id)
    {
        $patient = $this->findById($id);

        $patient->update($request->all());
        return $patient;
    }
    public function delete($id)
    {
        $patient = $this->findById($id);
        $patient->delete();
        return $patient;
    }
}
