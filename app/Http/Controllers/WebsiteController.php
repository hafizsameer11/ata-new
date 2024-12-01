<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Country;
use App\Models\Plantour;
use App\Models\Blog;
use Illuminate\Http\Request;
use Carbon\Carbon;
// import Request

class WebsiteController extends Controller
{

    public function filterSerach(Request $request)
    {
        $destinationId = $request->input('destination'); // destination_id filter
        $priceRange = $request->input('price'); // price range filter (like "1000-2000")
        $memberCount = $request->input('member'); // number of members filter
        $one_day = $request->input('tour');

        // Start with the base query
        $query = Tour::query();

        // Apply the destination filter if it's not empty
        if ($destinationId) {
            $query->where('country_id', $destinationId);
        }


        // Apply the price range filter if it's not empty
        if ($priceRange) {
            $priceRangeArray = explode('-', $priceRange);
            $minPrice = $priceRangeArray[0];
            $maxPrice = $priceRangeArray[1];
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Apply the member filter if it's not empty
        if ($memberCount) {
            $query->where('max_member', $memberCount);
        }
        if ($one_day) {
            $query->where('one_day', 1);
        }


        // Get the filtered tours
        $tours = $query->get();

        // Return the view with filtered tours
        $name = 'Search';
        return view('Website.Free&easy.index', compact('name', 'tours'));
    }



    public function home()
    {
        $tours = Tour::with('images', 'country')->where('one_day', 0)->limit(5)->get();
        $destinations = Country::with('tours')->where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
        // get latest one tour
        $latest_tour = Tour::with('images', 'country')->where('one_day', 0)->latest()->first();
        // return $latest_tour ;
        return view('Website.home.hero.main', compact('tours', 'destinations', 'latest_tour'));
    }

    public function productView(string $id)
    {
        $decode_id = base64_decode($id);
        $tour = Tour::with('images', 'plans', 'country')->find($decode_id);
        $tours = Tour::with('images', 'plans', 'country')
            ->whereBetween('date', [
                Carbon::now()->addDays(2)->toDateString(),
                Carbon::now()->addDays(7)->toDateString()
            ])->limit(6)->orderBy('date', 'DESC')
            ->get();
        return view('Website.Product.view', compact('tour', 'tours'));
    }

    public function countries()
    {
        $countries = Country::with('tours')->where('status', 1)->orderBy('id', 'DESC')->limit(12)->get();
        return response()->json($countries);
    }

    public function filterTour($id)
    {
        $decode_id = base64_decode($id);
        $tours = Tour::with('images', 'plans', 'country')->where('country_id', $decode_id)->paginate(10);
        // get single name of country
        $name = Country::find($decode_id)->name;
        return view('Website.Free&easy.index', compact('tours', 'name'));
    }

    public function freeEasy()
    {
        $tours = Tour::with('images', 'plans', 'country')->where('one_day', 1)->orderBy('id', 'DESC')->paginate(10);
        $name = "Free & Easy";
        return view('Website.Free&easy.index', compact('tours', 'name'));
    }


    public function destination()
    {
        $destinations = Country::where('status', 1)->orderBy
        ('id', 'DESC')->limit(15)->get();
        return view('Website.destinations.index', compact('destinations'));
    }

    public function news()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(10);
        return view('Website.News.News', compact('blogs'));
    }
    public function getAvailableTimes(Request $request)
    {
        $date = $request->query('date');
        $times = Plantour::where('date', $date)->pluck('time')->first();
        return response()->json($times);
    }
}
