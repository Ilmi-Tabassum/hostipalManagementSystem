<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Student;
use App\Request\PatientFormValidationRequest;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function index()
    {
        return view('patient.index');
    }

    /**
     *
     * @return mixed
     * @throws \Exception
     * @description Always try to use camel case convention for writing method.It must a verb
     * @as you are using ajax response always try to send limited data like 10/20/100
     */
//    public function fetchpatient()
    public function fetchPatient()
    {
        //you are fetching collections but so the name of the collection should be patients not patient
        $patients = Patient::paginate(20);
//        $patient = Patient::all();
        return response()->json([
            'patient' => $patient,

        ]);
    }

    public function store(PatientFormValidationRequest $request)
    {

        // try to make to controller as simple as possible. Create a ValidationRequest file and validate there

//        $validator = Validator::make($request->all(), [
//            'name' => ' required|max:191',
//            'email' => 'required|email|max:191',
//            'phone' => 'required|max:191',
//            'address' => 'required|max:191',
//
//        ]);
//        if ($validator->fails()) {
//            return response()->json([
//                'status' => 400,
//                'errors' => $validator->messages(),
//            ]);
//        }
      //  else {
            // its a bad practice to create a new object in controller
            // try to use eloquent or create a  array first then just imsert it

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ];
            Patient::create($data);// DB::table('patients')->insert($data);
//            $patient = new Patient();
//            $patient->name = $request->input('name');
//            $patient->email = $request->input('email');
//            $patient->phone = $request->input('phone');
//            $patient->address = $request->input('address');
//
//
//            $patient->save();
            return response()->json([
                'status' => 200,
                'message' => 'Added Successfully!'
            ]);
     //   }
    }

    public function edit($id)
    {
     if(empty($id)) {
         throw new \Exception('Id is required');
     }
      $patient = Patient::find($id);
     return response()->json([
         'patient' => $patient], 200);
        //try to avoid if else block

//        if ($patient) {
//            return response()->json([
//                'status' => 200,
//                'patient' => $patient,
//            ]);
//        } else {
//            return response()->json([
//                'status' => 404,
//                'message' => 'Patient not Found',
//            ]);
//        }
    }

    /**
     * @param PatientFormValidationRequest $request
     * @param $id
     * @return mixed
     * @issues to many code
     * @too many if else block
     * @description try to use ajax response
     */
    public function update(PatientFormValidationRequest $request, $id)
    {
        //this PatientFormValidationRequest is a custom validation request
        //this will automatically validate the request
        //if you want the message then add validation request on the handler
        if(empty($id)) {
            throw new \Exception('Id is required');
        }
        $patient = Patient::find($id);
        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        Patient::where('id', $id)->update($params);
        return response()->json([
            'message' => 'Updated Successfully!'
        ], 200);

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


