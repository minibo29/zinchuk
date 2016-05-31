<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */
//    Route::get('/', function () {
//        return view('tasks', [
//            'tasks' => Task::orderBy('created_at', 'asc')->get()
//        ]);
//    });

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    });

    /**
     * Delete Task
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/');
    });


    /** Company */
    Route::get('/', 'CompanyController@displayReminder');
    Route::get('company', 'CompanyController@index');
    Route::any('company/add', 'CompanyController@addCompany');
    Route::get('company/{id}', 'CompanyController@detailCompany');
    Route::get('history/{id}', 'CompanyController@historyCompany');
    Route::post('history/add', 'CompanyController@addCommentToHistory');

    /** Employee */
    Route::post('employee/add', 'EmployeeController@addEmployee');
    Route::any('employee/autoload-employee', 'EmployeeController@autoloadEmployee');


    Route::post('physical-address/add', 'PhysicalAddressController@addPhysicalAddress');
    Route::post('building-object/add', 'BuildingObjectController@addBuildingObject');

});
