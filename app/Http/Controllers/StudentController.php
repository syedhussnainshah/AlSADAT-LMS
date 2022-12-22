<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function AddmissionForm()
    {
        return view('Dashboard.student.addmission-form');
    }
    public function addstudent(Request $request)
    {
        $date = date('d-M-y');
        $request->validate([
            'StudentBform' => 'required|unique:student',
            'StudentName' => 'required',
            'StudentEmail' => 'required',
            'StudentWhatsappNumber' => 'required',
            'StudentClass' => 'required',
            'StudentDOB' => 'required',
            'StudentCampus' => 'required',
            'StudentGender' => 'required',
            'StudentCast' => 'required',
            // 'gardian' => 'required',
            'GradianCNIC' => 'required',
            'GradianName' => 'required',
            'GardianGender' => 'required',
            'GardianAddress' => 'required',
            'GardianNumber' => 'required',
        ]);

        $insertStudentData = DB::table('student')->insertGetId([
            'StudentBform' => $request->StudentBform,
            'StudentName' => $request->StudentName,
            'StudentEmail' => $request->StudentEmail,
            'StudentWhatsappNumber' => $request->StudentWhatsappNumber,
            'StudentClass' => $request->StudentClass,
            'StudentDOB' => $request->StudentDOB,
            'StudentCampus' => $request->StudentCampus,
            'StudentGender' => $request->StudentGender,
            'StudentCast' => $request->StudentCast,
            'addmission_date' => $date,
        ]);
        if ($insertStudentData) {
            $inserGardianData = DB::table('gardian')->insert([
                'student_id' => $insertStudentData,
                'GradianCNIC' => $request->GradianCNIC,
                'GradianName' => $request->GradianName,
                'GardianGender' => $request->GardianGender,
                'GardianNumber' => $request->GardianNumber,
                'GardianAddress' => $request->GardianAddress,
            ]);
            if ($inserGardianData) {
                return back()->with('success', 'Data Inserted');
            } else {
                echo "No Insert";
            }
        } else {
            echo "No SUbmit";
        }
    }
    public function allstudent()
    {
        $select = DB::table('student')
            ->join('gardian', 'student.student_id', '=', 'gardian.student_id')
            ->select()
            ->get();
        return view('Dashboard.student.all-student')
            ->with('student', $select);
    }
    public function UpdateStudent(Request $request)
    {
        // $request->validate([
        //     'StudentBform' => 'required',
        //     'StudentName' => 'required',
        //     'StudentEmail' => 'required',
        //     'StudentWhatsappNumber' => 'required',
        //     'StudentClass' => 'required',
        //     'StudentDOB' => 'required',
        //     'StudentCampus' => 'required',
        //     'StudentGender' => 'required',
        //     'StudentCast' => 'required',
        //     'GradianCNIC' => 'required',
        //     'GradianName' => 'required',
        //     'GardianGender' => 'required',
        //     'GardianAddress' => 'required',
        // ]);
        $update = DB::table('student')->where('student_id', $request->student_id)->update([
            'StudentBform' => $request->StudentBform,
            'StudentName' => $request->StudentName,
            'StudentEmail' => $request->StudentEmail,
            'StudentWhatsappNumber' => $request->StudentWhatsappNumber,
            'StudentClass' => $request->StudentClass,
            'StudentDOB' => $request->StudentDOB,
            'StudentCampus' => $request->StudentCampus,
            'StudentGender' => $request->StudentGender,
            'StudentCast' => $request->StudentCast,
        ]);
        if ($update) {
            $gardianupdate = DB::table('gardian')->where('student_id', $request->student_id)->update([
                'GradianCNIC' => $request->GradianCNIC,
                'GradianName' => $request->GradianName,
                'GardianGender' => $request->GardianGender,
                'GardianNumber' => $request->GardianNumber,
                'GardianAddress' => $request->GardianAddress,
            ]);
            if ($gardianupdate) {
                return redirect('All-Student');
            } else {
                echo ("No Update Gardian");
                return redirect('All-Student');
            }
        } else {
            echo $request->student_id;
            echo "STudent No Update";
            return redirect('All-Student');
        }
    }
    public function StudentUdatedForm(Request $request)
    {
        $select = DB::table('student')
            ->where('student.student_id', $request->student_id)
            ->join('gardian', 'student.student_id', '=', 'gardian.student_id')
            ->get()
            ->first();
        $class = DB::table('classes')->select()->get();

        return view('Dashboard.student.update-form')
            ->with('data', $select)
            ->with('classes', $class);
    }
    public function campusselect($id)
    {
        return view('Dashboard.student.campus-attendance');
    }
    public function campusselects()
    {
        return view('Dashboard.student.campus-attendance');
    }

    public function GoToClass()
    {
        $select = DB::table('classes')->select()->get();
        return view('Dashboard.student.all-classes')
            ->with('classes', $select);
    }
}
