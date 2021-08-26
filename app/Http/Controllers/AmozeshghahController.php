<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\Branch;
use App\Models\User;
use App\Models\Base;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\Major;
use App\Models\Teacher_managment;
use DB;

class AmozeshghahController extends Controller
{
    public function index()
    {
        return view('amozeshgah.index');

    }

    public function branch_add(Request $request)
    {
        $branch_id = $request->branch_id;
        $branch_title = $request->branch_title;
        $branch_timeAdd = $request->branch_timeAdd;

        //ToDo get amozeshghah id


        if (empty($branch_id)) {


            $branch = new Branch();
            $branch->title = $branch_title;
            $branch->date = $branch_timeAdd;
            $branch->parent = 97;

            if ($branch->save()) {
                return "save";
            } else {
                return "no";
            }

        } else {

            $query = Branch::where('id', $branch_id)->first();

            if ($query) {
                $query->title = $branch_title;
                $query->updated_at = $branch_timeAdd;

                if ($query->update()) {
                    return "update";
                } else {
                    return "no";
                }

            }


        }


    }

    public function branch_get(Request $request)
    {
        //ToDo get amozeshghah id

        $query = DB::table('branch')
            ->where('parent', 97)
            ->paginate(5);
        return $query;

    }

    public function remove_branch(Request $request)
    {


        $id = $request->branch_id;


        $queryDeleted = DB::table('branch')
            ->Where('id', $id)
            ->delete();

        if ($queryDeleted) {
            return "yes";
        } else {
            return "no";
        }
    }

    public function user_add(Request $request)
    {
        //ToDo get Amozeshghah id


        $userId = $request->userId;
        $name = $request->name;
        $userName = $request->userName;
        $userPass = $request->userPass;
        $user_timeAdd = $request->user_timeAdd;


        if (empty($userId)) {


            $branch = new User();
            $branch->name = $name;
            $branch->username = $userName;
            $branch->password = $userPass;
            //type_user=2 => USER OF AMOZESHGHAH
            $branch->type_user = 2;
            $branch->amozeshgah_id = "93";
            $branch->created_at = $user_timeAdd;

            if ($branch->save()) {
                return "save";
            } else {
                return "no";
            }

        } else {

            $query = User::where('id', $userId)->first();

            if ($query) {

                $query->username = $userName;
                $query->password = $userPass;
                $query->updated_at = $user_timeAdd;

                if ($query->update()) {
                    return "update";
                } else {
                    return "no";
                }

            }


        }

    }

    public function user_get(Request $request)
    {
        //ToDo get Amozeshghah id
        $amozeshghah_id = "93";

        $query = DB::table('users')
            ->where('type_user', 2)
            ->where('amozeshgah_id', $amozeshghah_id)
            ->paginate(5);
        return $query;

    }

    public function get_branches_of_amozeshghah(Request $request)
    {


        $userId = $request->userId;

        $query = User::where('id', $userId)->first();

        $branches = [];
        if ($query->branch_access_id != null) {

            /***************convert string array to int array*/
            $branches = array_map('intval', explode('/', $query->branch_access_id));
        }

        /*******************************************amozeshgah with branch*/

        //ToDo get Amozeshghah id
        $amozeshghah_id = 93;


        $parent = DB::table('branch')
            ->where('id', $amozeshghah_id)
            ->first();


        $childes = DB::table('branch')
            ->where('parent', $amozeshghah_id)
            ->get();

        $parent_id = $parent->id;

        $i = 0;
        foreach ($childes as $key1 => $row) {
            $child_parent_field = $row->parent;

            if ($parent_id == $child_parent_field) {
                $parent->sub[$i++] = $row;
            }
        }


        return response()->json([
            'user_access_branches' => $branches,
            'amozeshgah' => $parent,


        ]);

    }

    public function user_access_branch(Request $request)
    {
        $userId = $request->userId;
        $amozeshghah_id = join('/', $request->branchIds);




        $query = User::where('id', $userId)->first();



        if ($query) {
            $query->branch_access_id = $amozeshghah_id;
            if ($query->update()) {
                return "yes";
            }

        }


    }


}
