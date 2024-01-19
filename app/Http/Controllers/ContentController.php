<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function getContentData(){
        try {
            $content = Content::all();
            return $content;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function addContentData(Request $req) {
        try {
            $content = new Content;
            $content->position = $req->position;
            $content->autoplay = $req->autoplay;
            $content->add_button = $req->add_button;
            $content->autoplay_interval = $req->autoplay_interval;
            $content->heading = $req->heading;
            $content->show_page_indicator = $req->show_page_indicator;
            $content->enable_infinite_scroll = $req->enable_infinite_scroll;
            $content->overlay_page_indicator = $req->overlay_page_indicator;
            $content->viewport_fraction = $req->viewport_fraction;
            $content->height = $req->height;
            $content->aspect_ratio = $req->aspect_ratio;
            $content->images = json_encode($req->images);
            $content->save();
            return "Inserted Successfully!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function updateContentData($id, Request $req) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $Content = Content::find($id);
                $Content->position = $req->position;
                $Content->autoplay = $req->autoplay;
                $Content->add_button = $req->add_button;
                $Content->autoplay_interval = $req->autoplay_interval;
                $Content->heading = $req->heading;
                $Content->show_page_indicator = $req->show_page_indicator;
                $Content->enable_infinite_scroll = $req->enable_infinite_scroll;
                $Content->overlay_page_indicator = $req->overlay_page_indicator;
                $Content->viewport_fraction = $req->viewport_fraction;
                $Content->height = $req->height;
                $Content->aspect_ratio = $req->aspect_ratio;
                $Content->images = json_encode($req->images);
                $Content->save();
                return "Updated Successfully!";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteContentData($id) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $Content =Content::find($id)->delete();
                return "Deleted Successfully!";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
