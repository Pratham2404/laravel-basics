<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ContentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getAllTasks',[TaskController::class,'getAllTasks']);
Route::get('getTask/{id}',[TaskController::class,'getTaskById']);
Route::post('newTask',[TaskController::class,'addTask']);
Route::put('updateTask/{id}',[TaskController::class,'updateTask']);
Route::delete('deleteTask/{id}',[TaskController::class,'deleteTask']);
Route::get('restoreTask/{id}',[TaskController::class,'restoreTask']);
Route::put('{task}/{id}',[TaskController::class,'startendTask']);


//Page Routes
Route::get('getPage',[PageController::class,'getPageData']);
Route::post('addPage',[PageController::class,'addPageData']);
Route::put('updatePage/{id}',[PageController::class,'updatePageData']);
Route::delete('deletePage/{id}',[PageController::class,'deletePageData']);

//Component Routes
Route::get('getComponent',[ComponentController::class,'getComponentData']);
Route::post('addComponent',[ComponentController::class,'addComponentData']);
Route::patch('updateComponent/{id}',[ComponentController::class,'updateComponentData']);
Route::delete('deleteComponent/{id}',[ComponentController::class,'deleteComponentData']);



//Content Routes
Route::get('getContent',[ContentController::class,'getContentData']);
Route::post('addContent',[ContentController::class,'addContentData']);
Route::put('updateContent/{id}',[ContentController::class,'updateContentData']);
Route::delete('deleteContent/{id}',[ContentController::class,'updateContentData']);

