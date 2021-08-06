<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Branch;
use App\Models\User;
use App\Models\Base;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\Major;
use App\Models\Teacher_managment;
use DB;

class adminController extends Controller
{
    public function amozeshgah_add(Request $request)
    {
        $amozeshgah_id = $request->amozeshgah_id;
//        ughjikuijk
        $amozeshgah_title = $request->amozeshgah_title;
        $amozeshgah_timeAdd = $request->amozeshgah_timeAdd;


        if (empty($amozeshgah_id)) {


            $branch = new Branch();
            $branch->title = $amozeshgah_title;
            $branch->date = $amozeshgah_timeAdd;
            $branch->parent = 0;

            if ($branch->save()) {
                return "save";
            } else {
                return "no";
            }

        } else {

            $query = Branch::where('id', $amozeshgah_id)->first();

            if ($query) {
                $query->title = $amozeshgah_title;
                if ($query->update()) {
                    return "update";
                } else {
                    return "no";
                }

            }


        }

    }


    public function branch_add(Request $request)
    {
        $branch = new Branch();
        $branch->title = $request->branch_title;
        $branch->date = $request->branch_timeAdd;
        $branch->parent = $request->parent_id;

        if ($branch->save()) {
            return $request->amozeshgah_title;
        }

    }

    public function amozeshgah_get(Request $request)
    {
        $query = DB::table('branch')
            ->where('parent', 0)
            ->paginate(5);
        return $query;

    }

    public function get_amozeshgah_branch(Request $request)
    {
        $amozeshgah_id = $request->amozeshgah_id;
        $query = DB::table('branch')
            ->where('parent', $amozeshgah_id)
            ->paginate(5);
        return $query;

    }


    public function remove_amozeshgah(Request $request)
    {


        $id = $request->amozeshgah_id;


        /*get branch of amozeshgah*/
        $query = Branch::where('parent', $id)->get();


        /****************if amozeshgah have a branch*******************/
        if (sizeof($query) > 0) {

            $ids = [];
            array_push($ids, $id);

            /**************ids of branches of amozeshgah*/
            foreach ($query as $key => $value) {
                $id = $query[$key]->id;
                array_push($ids, $id);
            }

            $queryDeleted = DB::table('branch')
                ->WhereIn('id', $ids)
                ->delete();

            if ($queryDeleted) {
                return "yes";
            } else {
                return "no";
            }

        } /****************if amozeshgah not  have a branch*******************/
        else {
            $queryDeleted = DB::table('branch')
                ->Where('id', $id)
                ->delete();

            if ($queryDeleted) {
                return "yes";
            } else {
                return "no";
            }
        }


    }

    public function branchSelect(Request $request)
    {
        $branch_select_id = $request->branch_select_id;
        $query = DB::table('base')
            ->where('branch_id', $branch_select_id)
            ->get();

        return $query;

    }


    public function user_add(Request $request)
    {
        $userId = $request->userId;
        $userName = $request->userName;
        $user_timeAdd = $request->user_timeAdd;


        if (empty($userId)) {


            $branch = new User();
            $branch->name = $userName;
            $branch->created_at = $user_timeAdd;

            if ($branch->save()) {
                return "save";
            } else {
                return "no";
            }

        } else {

            $query = User::where('id', $userId)->first();

            if ($query) {
                $query->name = $userName;
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
        $query = DB::table('users')
            ->paginate(5);
        return $query;

    }

    public function get_branches(Request $request)
    {

        $userId = $request->userId;

        $query = User::where('id', $userId)->first();

        $branches = [];
        if ($query->branch_access_id != null) {

            /***************convert string array to int array*/
            $branches = array_map('intval', explode('/', $query->branch_access_id));
        }

        /*******************************************amozeshgah with branch*/
        $parents = DB::table('branch')
            ->where('parent', 0)
            ->get();

        $childes = DB::table('branch')
            ->where('parent', '!=', 0)
            ->get();


        foreach ($parents as $key => $value) {
            $parent_id = $value->id;

            $i = 0;
            foreach ($childes as $key1 => $row) {
                $child_parent_field = $row->parent;

                if ($parent_id == $child_parent_field) {
                    $parents[$key]->sub[$i++] = $row;
                }
            }
        }

        return response()->json([
            'user_access_branches' => $branches,
            'amozeshgah' => $parents,


        ]);

    }

    public function user_access_branch(Request $request)
    {
        $userId = $request->userIds;
        $branchIds = $request->branchIds;
        $branchIds = join('/', $branchIds);


        $query = User::where('id', $userId)->first();

        if ($query) {
            $query->branch_access_id = $branchIds;
            if ($query->update()) {
                return "yes";
            }

        }


    }

    public function remove_user(Request $request)
    {


        $userId = $request->userId;

        $query = DB::table('users')
            ->Where('id', $userId)
            ->delete();

        if ($query) {
            return "yes";
        } else {
            return "no";
        }


    }

    /******************************start base*/

    public function base_add(Request $request)
    {
        $baseId = $request->baseId;
        $baseTitle = $request->baseTitle;
        $branch_id = $request->branch_id;
        $created_at = $request->created_at;


        if (empty($baseId)) {


            $base = new Base();
            $base->title = $baseTitle;
            $base->branch_id = $branch_id;
            $base->created_at = $created_at;

            if ($base->save()) {
                return "save";
            } else {
                return "no";
            }

        } else {

            $query = Base::where('id', $baseId)->first();

            if ($query) {
                $query->title = $baseTitle;
                $query->branch_id = $branch_id;

                if ($query->update()) {
                    return "update";
                } else {
                    return "no";
                }

            }


        }

    }

    public function base_get(Request $request)
    {
        $base = DB::table('base')
            ->leftJoin('branch', 'base.branch_id', '=', 'branch.id')
            ->select('base.*', 'branch.title as title_branch', 'branch.parent as parent_branch')
            ->get();


        $branch = Branch::get();
        /*********************************find amozeshgah title wiht branch parent******/


        foreach ($base as $key => $value) {
            $parent = $value->parent_branch;

            foreach ($branch as $key1 => $row) {
                $branch_id = $row->id;

                if ($parent == $branch_id) {
                    $base[$key]->amozeshgah = $row->title;
                }
            }
        }


        /********************paginate with array*/
        $items = $base;
        $perPage = 5;
        $page = null;
        $options = [];

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        /* return $query;*/

    }

    public function remove_base(Request $request)
    {


        $baseId = $request->baseId;

        $query = DB::table('base')
            ->Where('id', $baseId)
            ->delete();

        if ($query) {
            return "yes";
        } else {
            return "no";
        }


    }

    public function get_bases(Request $request)
    {
        $query = DB::table('base')
            ->get();
        return $query;

    }

    public function amozeshgah_get_for_select(Request $request)
    {
        $query = DB::table('branch')
            ->where('parent', 0)
            ->get();
        return $query;

    }

    public function amozeshgahSelect(Request $request)
    {
        $amozeshgah_select_id = $request->amozeshgah_select_id;
        $query = DB::table('branch')
            ->where('parent', $amozeshgah_select_id)
            ->get();

        return $query;

    }

    /******************************end base*/
    /******************************start  lesson*/

    public function lesson_add(Request $request)
    {
        $lessonId = $request->lessonId;
        $lessonTitle = $request->lessonTitle;
        $branch_id = $request->branch_id;
        $baseId = $request->baseId;
        $majorId = $request->majorId;
        $created_at = $request->created_at;


        if (empty($lessonId)) {


            $lesson = new Lesson();
            $lesson->title = $lessonTitle;
            $lesson->branch_id = $branch_id;
            $lesson->base_id = $baseId;
            $lesson->major_id = $majorId;
            $lesson->created_at = $created_at;

            if ($lesson->save()) {
                return "save";
            } else {
                return "no";
            }

        } else {

            $query = Lesson::where('id', $lessonId)->first();

            if ($query) {
                $query->title = $lessonTitle;
                $query->branch_id = $branch_id;
                $query->base_id = $baseId;
                $query->major_id = $majorId;
                $query->updated_at = $created_at;

                if ($query->update()) {
                    return "update";
                } else {
                    return "no";
                }

            }


        }

    }

    public function lesson_get(Request $request)
    {
        $lesson = DB::table('lesson')
            ->leftJoin('branch', 'lesson.branch_id', '=', 'branch.id')
            ->leftJoin('base', 'lesson.base_id', '=', 'base.id')
            ->leftJoin('major', 'lesson.major_id', '=', 'major.id')
            ->select('lesson.*', 'base.title as title_base',
                'branch.title as title_branch',
                'branch.parent as parent_branch',
                'major.title as title_major')
            ->get();

        /* return $major;*/

        /************************************************/

        $branch = Branch::get();
        /*********************************find amozeshgah title wiht branch parent******/


        foreach ($lesson as $key => $value) {
            $parent = $value->parent_branch;

            foreach ($branch as $key1 => $row) {
                $branch_id = $row->id;

                if ($parent == $branch_id) {
                    $lesson[$key]->amozeshgah = $row->title;
                }

            }
        }


        /********************paginate with array*/
        $items = $lesson;
        $perPage = 5;
        $page = null;
        $options = [];

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);


    }

    public function remove_lesson(Request $request)
    {


        $lessonId = $request->lessonId;

        $query = DB::table('lesson')
            ->Where('id', $lessonId)
            ->delete();

        if ($query) {
            return "yes";
        } else {
            return "no";
        }


    }

    public function baseSelect(Request $request)
    {
        $base_select_id = $request->base_select_id;
        $query = DB::table('major')
            ->where('base_id', $base_select_id)
            ->get();

        return $query;

    }


    /******************************end  lesson*/

    /*save image from dropzone to server with method*/
    public function teacher_pic_Dropzone(Request $request)
    {
        /*******************************************************/
        ini_set("memory_limit", "500000");
        ini_set('post_max_size', '500000');
        ini_set('upload_max_filesize', '500000');

        $imageName = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move(public_path('dropZon/teacher'), $imageName);
        /********************************************************************/


        return response()->json($imageName);
    }

    /*when remove from dropzone image must delete from server*/
    public function teacher_pic_Dropzone_remove(Request $request)
    {
        $img = $request->img;
        /******************************remove from directory*/

        if (isset($img)) {
            $fileName = public_path('dropZon/teacher' . '/' . $img);
            unlink($fileName);
        }
        return "yes";
    }


    public function teacher_add(Request $request)
    {
        $teacherId = $request->teacherId;
        $teacherName = $request->teacherName;
        $teacherUserName = $request->teacherUserName;
        $teacherPass = $request->teacherPass;
        $is_mosh = $request->is_mosh;
        $amozeshgah_id = $request->amozeshgah_id;
        $created_or_update_at = $request->created_or_update_at;


        $teacher_pic = $request->teacher_pic;
        if ($teacher_pic == "")
            $teacher_pic = null;


        if (empty($teacherId)) {

            $teacher = new Teacher();
            $teacher->name = $teacherName;
            $teacher->user_name = $teacherUserName;
            $teacher->pass = $teacherPass;
            $teacher->pic = $teacher_pic;
            $teacher->is_mosh = $is_mosh;
            $teacher->amozeshgah_id = $amozeshgah_id;
            $teacher->created_at = $created_or_update_at;


            if ($teacher->save()) {
                return "save";
            } else {
                return "no";
            }

        } else {

            $query = Teacher::where('id', $teacherId)->first();

            if ($query) {
                $query->name = $teacherName;
                $query->user_name = $teacherUserName;
                $query->pass = $teacherPass;
                $query->pic = $teacher_pic;
                $query->is_mosh = $is_mosh;
                $query->amozeshgah_id = $amozeshgah_id;
                $query->updated_at = $created_or_update_at;

                if ($query->update()) {
                    return "update";
                } else {
                    return "no";
                }

            }


        }

    }

    public function teacherLesson(Request $request)
    {
        $id = $request->teacher_managment_id;
        $amozeshgah_id = $request->amozeshgah_id;
        $branch_id = $request->branch_id;
        $base_id = $request->base_id;
        $major_id = $request->major_id;
        $lesson_id = $request->lesson_id;
        $teacher_id = $request->teacher_id;
        $created_or_update_at = $request->created_or_update_at;


        if (empty($id)) {

            $Teacher_managment = new Teacher_managment();
            $Teacher_managment->amozeshgah_id = $amozeshgah_id;
            $Teacher_managment->branch_id = $branch_id;
            $Teacher_managment->base_id = $base_id;
            $Teacher_managment->major_id = $major_id;
            $Teacher_managment->lesson_id = $lesson_id;
            $Teacher_managment->teacher_id = $teacher_id;
            $Teacher_managment->created_at = $created_or_update_at;


            if ($Teacher_managment->save()) {
                return "save";
            } else {
                return "no";
            }

        } else {

            $query = Teacher_managment::where('id', $id)->first();

            if ($query) {
                $query->amozeshgah_id = $amozeshgah_id;
                $query->branch_id = $branch_id;
                $query->base_id = $base_id;
                $query->major_id = $major_id;
                $query->lesson_id = $lesson_id;
                $query->teacher_id = $teacher_id;
                $query->updated_at = $created_or_update_at;

                if ($query->update()) {
                    return "update";
                } else {
                    return "no";
                }

            }


        }

    }


    public function teacher_get(Request $request)
    {
        $query = DB::table('teacher')
            ->leftJoin('branch', 'teacher.amozeshgah_id', '=', 'branch.id')
            ->select('teacher.*', 'branch.title as amozeshgah_title')
            ->paginate(5);
        return $query;

    }


    public function get_teacher_img_for_edit(Request $request)
    {

        $curent_news_img = $request->img;


        /*******************************get img*/
        $target_dir = public_path('dropZon/teacher' . '/');

        $fil_list = array();

        $dir = $target_dir;

        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {

                while (($file = readdir($dh)) !== false) {
                    if ($file != '' && $file != '.' && $file != '..' && $file == $curent_news_img) {
                        $file_path = $target_dir . $file;

                        if (!is_dir($file_path)) {
                            $size = filesize($file_path);
                            $fil_list[] = array('name' => $file, 'size' => $size, 'path' => $file_path);
                        }
                    }
                }
                closedir($dh);
            }

        }

        return response()->json(['fil_list' => $fil_list]);

    }

    public function remove_teacher(Request $request)
    {


        $teacherId = $request->teacherId;

        $img = $request->img;
        /******************************remove from directory*/

        if (isset($img)) {
            $fileName = public_path('dropZon/teacher' . '/' . $img);
            unlink($fileName);
        }

        /******************************remove from table*/


        $query = DB::table('teacher')
            ->Where('id', $teacherId)
            ->delete();

        if ($query) {
            return "yes";
        } else {
            return "no";
        }


    }
    public function remove_teacher_lesson(Request $request)
    {


        $id = $request->teacher_managment_id;

        /******************************remove from table*/


        $query = DB::table('teacher_managment')
            ->Where('id', $id)
            ->delete();

        if ($query) {
            return "yes";
        } else {
            return "no";
        }


    }

    public function majorSelect(Request $request)
    {
        $major_select_id = $request->major_select_id;
        $query = DB::table('lesson')
            ->where('major_id', $major_select_id)
            ->get();

        return $query;

    }

    public function baseSelectForLesson(Request $request)
    {


        $base_select_id = $request->base_select_id;
        $query = DB::table('major')
            ->where('base_id', $base_select_id)
            ->get();


        if (sizeof($query) > 0) {
            return response()->json([
                'have_major' => 'yes',
                'major' => $query,


            ]);
        }


        $major_select_id = $request->base_select_id;
        $query = DB::table('lesson')
            ->where('base_id', $major_select_id)
            ->get();

        if (sizeof($query) > 0) {
            return response()->json([
                'have_major' => 'no',
                'lesson' => $query,
            ]);
        }


    }

    public function get_teacherLesson(Request $request)
    {
        $teacher_id = $request->teacher_id;
        $query = DB::table('teacher_managment')
            ->leftJoin('branch', 'teacher_managment.branch_id', '=', 'branch.id')
            ->leftJoin('base', 'teacher_managment.base_id', '=', 'base.id')
            ->leftJoin('major', 'teacher_managment.major_id', '=', 'major.id')
            ->leftJoin('lesson', 'teacher_managment.lesson_id', '=', 'lesson.id')
            ->join('teacher', function ($join) use ($teacher_id) {
                $join->on('teacher_managment.teacher_id', '=', 'teacher.id')
                    ->where('teacher.id', $teacher_id);
            })
            ->select('teacher_managment.*',
                'branch.title as branch_title', 'base.title as base_title',
                'major.title as major_title', 'lesson.title as lesson_title',
                'teacher.name as teacher_title', 'branch.parent as branch_parent',)
            ->get();


        $branch = Branch::get();
        /*********************************find amozeshgah title wiht branch parent******/


        foreach ($query as $key => $value) {
            $parent = $value->branch_parent;

            foreach ($branch as $key1 => $row) {
                $branch_id = $row->id;

                if ($parent == $branch_id) {
                    $query[$key]->amozeshgah = $row->title;
                }
            }
        }


        /********************paginate with array*/
        $items = $query;
        $perPage = 5;
        $page = null;
        $options = [];

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);


    }

    /******************************start major*/
    public function maghtaSelect(Request $request)
    {
        $maghtaSelect_value = $request->maghtaSelect_value;
        $query = DB::table('base')
            ->where("maghta", $maghtaSelect_value)
            ->get();

        return $query;

    }

    public function major_add(Request $request)
    {
        $majorId = $request->majorId;
        $majorTitle = $request->majorTitle;
        $base_id = $request->base_id;
        $branch_id = $request->branch_id;
        $created_or_update_at = $request->created_or_update_at;

        if (empty($majorId)) {

            $major = new Major();
            $major->title = $majorTitle;
            $major->base_id = $base_id;
            $major->branch_id = $branch_id;
            $major->created_at = $created_or_update_at;


            if ($major->save()) {
                return "save";
            } else {
                return "no";
            }

        } else {

            $query = Major::where('id', $majorId)->first();

            if ($query) {
                $query->title = $majorTitle;
                $query->base_id = $base_id;
                $query->branch_id = $branch_id;
                $query->updated_at = $created_or_update_at;

                if ($query->update()) {
                    return "update";
                } else {
                    return "no";
                }

            }


        }

    }

    public function major_get(Request $request)
    {
        $major = DB::table('major')
            ->leftJoin('base', 'major.base_id', '=', 'base.id')
            ->leftJoin('branch', 'major.branch_id', '=', 'branch.id')
            ->select('major.*', 'base.title as title_base', 'branch.title as title_branch', 'branch.parent as parent_branch')
            ->get();

        /* return $major;*/

        /************************************************/

        $branch = Branch::get();
        /*********************************find amozeshgah title wiht branch parent******/


        foreach ($major as $key => $value) {
            $parent = $value->parent_branch;

            foreach ($branch as $key1 => $row) {
                $branch_id = $row->id;

                if ($parent == $branch_id) {
                    $major[$key]->amozeshgah = $row->title;
                }

            }
        }


        /********************paginate with array*/
        $items = $major;
        $perPage = 5;
        $page = null;
        $options = [];

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);


    }

    public function remove_major(Request $request)
    {

        $majorId = $request->majorId;

        $query = DB::table('major')
            ->Where('id', $majorId)
            ->delete();

        if ($query) {
            return "yes";
        } else {
            return "no";
        }


    }


    /******************************end major*/


}
