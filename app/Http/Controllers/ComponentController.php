<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component;

class ComponentController extends Controller
{
    public function getComponentData(){
        try {
            $component = Component::all();
            return $component;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function addComponentData(Request $req) {
        try {
            $component = new Component;
            $component->name = $req->name;
            $component->page_id = $req->page_id;
            $component->save();
            return "Inserted Successfully!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateComponentData(Request $req,$id) {
        try {
            $component = Component::find($id);
            $component->name = $req->name;
            $component->page_id = $req->page_id;
            $component->save();
            return "Updated Successfully!";
        } catch (\Exception $e) {
            echo("fsdf");
            return $e->getMessage();
        }
    }

    public function deleteComponentData($id) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $component =Component::find($id)->delete();
                return "Deleted Successfully!";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
