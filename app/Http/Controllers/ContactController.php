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
    /*-------------end-------------*/

    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index(
    ) {
        return view('User.contact.index');
    }
    /*-------------end-------------*/

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
    /*-------------end-------------*/


    /**
     * Summary of contactLists
     * @return \Illuminate\Contracts\View\View
     */
    public function contactLists()
    {
        $contacts = Contact::query()->latest()->simplePaginate(10);
        return view('Admin.contact.lists', compact('contacts'));
    }
    /*-------------end-------------*/


    /**
     * Summary of show
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Contact $contact)
    {
        return view('Admin.contact.show', compact('contact'));
    }
    /*-------------end-------------*/


}
