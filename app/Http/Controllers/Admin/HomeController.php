<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Comment;
use App\Center;
use App\Service;
use App\Order;
use App\User;
use App\Rate;
use App\Support;
use App\City;
use App\District;
use App\Abuse;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use willvincent\Rateable\Rating;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{

    public function index()
    {
        // $data['centersCount'] = Center::count();
        // $data['usersCount'] = User::whereDoesntHave('roles')->where('is_user',1)->get()->count();
        // // $data['services_app'] = Service::get()->count();
        // $data['completed_orders'] = Order::where('status',3)->count();
        // $data['areas'] = City::count();
        // $data['cities'] = District::count();
        // $data['read_contacts'] = Support::where('is_read',1)->get()->count();
        // $data['notread_contacts'] = Support::where('is_read',0)->get()->count();
        // $data['categoriesCount'] = Category::all()->count();
        $data = [];
        return view('admin.home.index')->with(compact('data'));
    }
}
