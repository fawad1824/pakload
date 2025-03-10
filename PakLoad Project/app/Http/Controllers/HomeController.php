<?php

namespace App\Http\Controllers;

use App\Models\BiddingLoad;
use App\Models\Subscriptions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function processPayment(Request $request)
    {
        // Assuming $plans contains the user id, make sure it's a valid id
        $userId = $request->plans;

        // Fetch user by ID
        $user = User::find($userId);


        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update user's subscription status
        $user->subscriptions = '1'; // Store boolean instead of string "true"
        $user->save();

        // Log the user in (if not already logged in)
        Auth::login($user);  // No need for Auth::attempt if the user is already authenticated

        // Redirect based on the user's role
        switch ($user->role) {
            case 'trucking':
                return redirect()->route('searchLoading');
            case 'manufacturer':
                return redirect()->route('addLoading');
            case 'household':
                return redirect()->route('searchLoading');
            case 'admin':
                return redirect()->route('admin-user-check');
            default:
                return redirect()->route('home');  // Fallback route in case no role is matched
        }
    }


    public function SubscriptionPage($id)
    {
        $user = User::where('id', $id)->first();

        if ($user->role == "trucking") {
            $plans = Subscriptions::where('id', '3')->first();
        }
        if ($user->role == "manufacturer") {
            $plans = Subscriptions::where('id', '1')->first();
        }

        if ($user->role == "household") {
            $plans = Subscriptions::where('id', '4')->first();
        }
        // dd($plans);
        // $subscriptions = Subscriptions::all();
        // dd($subscriptions);
        $model = true;
        return view('livewire.subscriptions.front-end', compact('plans', 'id', 'model', 'user'));
    }

    public function savelocation(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;

        User::where('id', Auth::user()->id)->update([
            'lat' => $lat,
            'lng' => $lng,
        ]);

        return response()->json(['status' => 'success', 'lat' => $lat, 'lng' => $lng]);
    }
    public function getLocation()
    {
        return view('loction');
    }

    public function getTruckLocation(Request $request)
    {
        // Validate the Track ID
        $trac = BiddingLoad::where('trackingnumber', $request->trackID)->where('status','Accept')->first();
        $truck  = User::where('id', $trac->truck_id)->first();
        // Fetch truck based on track ID

        if ($truck) {
            // Return the truck's latitude and longitude
            return response()->json([
                'success' => true,
                'lat' => (float) $truck->lat, // Ensure lat is a float
                'lng' => (float) $truck->lng, // Ensure lng is a float
                'destination_lng' => (float) $trac->destination_lng,
                'destination_lat' => (float) $trac->destination_lat,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Truck not found.'
            ]);
        }
    }
}
