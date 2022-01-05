<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Student;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function index()
    {
        return view('patient.index');
    }

    public function fetchpatient()
    {
        $patient = Patient::all();
        return response()->json([
            'patient' => $patient,

        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ' required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:191',
            'address' => 'required|max:191',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $patient = new Patient();
            $patient->name = $request->input('name');
            $patient->email = $request->input('email');
            $patient->phone = $request->input('phone');
            $patient->address = $request->input('address');


            $patient->save();
            return response()->json([
                'status' => 200,
                'message' => 'Added Successfully!'
            ]);
        }
    }

    public function edit($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            return response()->json([
                'status' => 200,
                'patient' => $patient,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Patient not Found',
            ]);
        }
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => ' required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:191',
            'address' => 'required|max:191',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $patient = Patient::find($id);
            if ($patient) {
                $patient->name = $request->input('name');
                $patient->email = $request->input('email');
                $patient->phone = $request->input('phone');
                $patient->address = $request->input('address');
                $patient->update();


                return response()->json([
                    'status' => 200,
                    'message' => 'Updated Successfully!'
                ]);

            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'student not found'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);

        $patient->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Student Deleted Successfully.'
        ]);

    }
}


