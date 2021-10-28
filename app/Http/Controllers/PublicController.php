<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function __construct()
    {

        $this->middleware('locale');
        
    } 
    public function index() {
        $announcements = Announcement::where('is_accepted',true)->orderBy('updated_at', 'desc')->take(5)->get();
        return view('home', compact('announcements'));
    }

    public function announcementsByCategory($name, $category_id) {
        $category = Category::find($category_id);
        $announcements = $category->announcements()->where('is_accepted',true)->orderBy('updated_at', 'desc')->paginate(5);
        return view('public.announcements', compact('category', 'announcements'));
    }

    public function show(Announcement $announcement){
        return view('public.detail', compact('announcement'));
    }

    public function announcementsSearch(Request $request) {
        $q = $request->input('q');
        $announcements = Announcement::search($q)->where('is_accepted', true)->get();
        return view('/search_results', compact('q', 'announcements'));
    }

    public function locale($locale) {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}