<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ContactController extends Controller implements HasMiddleware
{
    /**
     * Summary of middleware
     * @return Middleware[]
     */
    public static function middleware()
    {
        return [
            new Middleware(['admin'], except: ['index', 'store']),
        ];
    }

    //index
    public function index(
    ) {
        return view('User.contact.index');
    }

    public function store(Request $request)
    {
        $fileds = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:255',
            'message' => 'required',
        ]);

        $contact = new Contact([...$fileds, 'user_id' => auth()->user()->id]);
        $contact->save();

        return back()->with('success', 'Your Contact information successfully send to admin !');
    }

    // contact lists

    public function contactLists()
    {
        $contacts = Contact::query()->latest()->simplePaginate(10);
        return view('Admin.contact.lists', compact('contacts'));
    }

    // show
    public function show(Contact $contact)
    {
        return view('Admin.contact.show', compact('contact'));
    }

}
