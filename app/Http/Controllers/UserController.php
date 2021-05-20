<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use function Symfony\Component\Translation\t;

class UserController extends Controller
{
    public function index($return_json = false)
    {
        $users = [];
        $file_name = "user-data/users.csv";
        if (file_exists($file_name)) {
            if (($handle = fopen($file_name, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                    array_push($users, [
                        "id" => $data[0],
                        "first_name" => $data[1],
                        "last_name" => $data[2],
                        "gender" => $data[3],
                        "area_code" => $data[4],
                        "phone" => $data[5],
                        "email" => $data[6],
                        "address" => $data[7],
                        "nationality" => $data[8],
                        "education" => $data[9],
                        "dob" => $data[10],
                        "preferred_contact" => $data[11]
                    ]);
                }
                fclose($handle);
                if ($return_json)
                    return $users;
                return view('users-list')->with(['users' => $users]);
            }
        } else {
            return view('users-list')->with([
                'users' => $users,
                'message' => 'No users are added to the list',
                "success" => false
            ]);
        }
    }


    public function create()
    {
        return view('register');
    }


    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required|min:3",
            "last_name" => "required|min:3",
            "gender" => "required|min:3",
            "area_code" => "required",
            "phone" => "required",
            "email" => "required|email:rfc,dns",
            "address" => "required",
            "nationality" => "required",
            "education" => "required",
            "dob" => "required|date",
            "preferred_contact" => "required"
        ]);

        $user = [
            "id" => Uuid::uuid4(),
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "gender" => $request->gender,
            "area_code" => $request->area_code,
            "phone" => $request->phone,
            "email" => $request->email,
            "address" => $request->address,
            "nationality" => $request->nationality,
            "education" => $request->education,
            "dob" => $request->dob,
            "preferred_contact" => $request->preferred_contact
        ];

        $fp = fopen('user-data/users.csv', 'a');
        fputcsv($fp, $user, ',', ' ');
        fclose($fp);

        return redirect()->route('users.index')->with([
            'users' => $this->index(true),
            'success' => true,
            'message' => 'User ' . $request->first_name . ' created successfully ',
        ]);
    }

    public function destroy($id)
    {
        $delete_flag = false;
        $users = $this->index(true);
//        return $users;
        $fp = fopen('user-data/users.csv', 'w+');
        foreach ($users as $user) {
            if ($user['id'] == $id) {
                $delete_flag = true;
                continue;
            }
            fputcsv($fp, $user, ',', ' ');
        }
        fclose($fp);
        return redirect()->route('users.index')->with([
            'users' => $this->index(true),
            'message' => ($delete_flag) ? 'User deleted successfully' : 'Sorry! User not found',
            'success' => $delete_flag
        ]);
    }


    public function edit($id)
    {
        $user_object=[];
        $users=$this->index(true);
        foreach ($users as $user){
            if($id==$user['id'])
                $user_object=$user;
        }
        return view('edit')->with(['user'=>$user_object]);
    }


    public function update(Request $request, $id)
    {
        $this->destroy($id);
        return $this->store($request);
    }

}
