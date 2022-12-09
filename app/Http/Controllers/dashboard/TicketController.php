<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class TicketController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $tickets = Ticket::where(function($q) use ($request) {

            return $q->when($request->search, function($query) use ($request){

                return $query->where('user_id', 'like', '%' . $request->search . '%')
                ->orwhere('priority', 'like', '%' . $request->search . '%')
                ->orwhere('type', 'like', '%' . $request->search . '%')
                ->orwhere('status', 'like', '%' . $request->search . '%')
                ->orwhere('subject', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(5);
        return view('dashboard.tickets.index',compact('tickets'));

    }//end if index

    public function create()
    {
        return view('dashboard.tickets.create');
    }//end of create

    public function store(Request $request)
    {
        
        $request->validate([
            'priority' => 'required',
            'type' => 'required',
            'subject' => 'required',
            'details' => 'required',
        ]);

        $requests_data = $request->except(['image']);

        if($request->image) {

            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/ticket_images/' . $request->image->hashName()));

            $requests_data['image'] = $request->image->hashName(); 

        }

        ticket::create($requests_data);
        $activity = Activity::all()->last();
        return redirect()->route('dashboard.tickets.index');


    }//end of store


    public function edit(ticket $ticket)
    {

        if ($ticket->status == 'new') {
            DB::table('tickets')->where('id',$ticket->id)->update(['status' => 'in_progress']);
        };
        return view('dashboard.tickets.edit', compact('ticket'));

    }//end of edit

    public function update(Request $request, ticket $ticket)
    {
       
        $ticket->update($request->all());
        $activity = Activity::all()->last();
        return redirect()->route('dashboard.tickets.index');
    }//end of update

    public function destroy(ticket $ticket)
    {
        //
    }//end of destroy
}
