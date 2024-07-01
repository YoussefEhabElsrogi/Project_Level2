<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Message;
use App\Models\Subscriber;
use App\Models\Team;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index', get_defined_vars());
    }
    public function about()
    {
        return view('front.about', get_defined_vars());
    }
    public function service()
    {
        return view('front.service', get_defined_vars());
    }
    public function contact()
    {
        return view('front.contact', get_defined_vars());
    }
    public function subscriberStore(StoreSubscriberRequest $request)
    {
        $validatedData = $request->validated();

        Subscriber::create($validatedData);

        return back()->with('subscriber_success_msg', 'Subscribed Successfully');
    }
    public function contactStore(StoreMessageRequest $request)
    {
        $validatedData = $request->validated();

        Message::create($validatedData);

        return back()->with('success', 'Your Message sent Successfully');
    }
}
