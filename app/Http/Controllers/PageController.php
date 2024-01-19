<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{  
    public function getPageData(){
        try {
            // $page = 
            $page = Page::all();
            return $page;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function addPageData(Request $req) {
        try {
            $page = new Page;
            $page->name = $req->name;
            $page->save();  
            return "Inserted Successfully!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function updatePageData($id) {
        dd($id);
        try {
            if ($id==null) {
                return "ID not found";
            }
            $page = Page::find($id);
            $page->name = $req->name;
            $page->save();
            return "Updated Successfully!";
        } catch (\Exception $e) {
            dd($e);
            return $e->getMessage();
        }
    }
    public function deletePageData($id) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $page = Page::find($id)->delete();
                return "Deleted Successfully!";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
}
