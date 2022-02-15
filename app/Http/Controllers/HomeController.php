<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use App\Models\Order;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index($localization = 'en'){
        App::setlocale($localization);
        $books = EBook::all(); 
        return view('home',['books'=>$books]);
    }

    public function bookDetail($id, $localization='en'){
        App::setlocale($localization);
        $book = EBook::where('ebook_id',$id)->first();
        return view('bookDetail',['book'=>$book]);
    }

    public function rent($id, $book_id, $localization='en'){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        App::setlocale($localization);
        $newOrder = new Order();
        $newOrder->account_id = $id;
        $newOrder->ebook_id = $book_id;
        $newOrder->order_date = $date;
        $newOrder->save();
        return redirect("/cart/$id/$localization");
    }
    
}
