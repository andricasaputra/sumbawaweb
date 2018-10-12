<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

use App\Models\AdminWeb\EventModel as Event;

class EventController extends Controller
{

	public function index()
	{
		$events = Event::orderBy('created_at', 'desc')->get();
		return view('adminwebskp.events.index')->with('events', $events);
	}

	public function create()
	{
		return view('adminwebskp.events.create');
	}

	public function store(Request $request)
	{
		$request->validate([

			'title' => 'required|min:7',
			'color' => 'required',
			'start_date' => 'required',
			'end_date' => 'required'

		]);

		$events = new Event;

		$events->title = $request->title;
		$events->color = $request->color;
		$events->start_date = $request->start_date;
		$events->end_date = $request->end_date;

		$events->save();

		return redirect()
		->route('events.index')
		->with('success','Agenda Kegiatan Berhasil Ditambah!');
	}

	public function show($id)
	{
		$events = Event::find($id);
		return view('adminwebskp.events.show')->with('events', $events);
	}

	public function edit($id)
	{
		$events = Event::find($id);
		return view('adminwebskp.events.edit')->with('events', $events);
	}

	public function update(Request $request, $id)
	{
		$request->validate([

			'title' => 'required|min:7',
			'color' => 'required',
			'start_date' => 'required',
			'end_date' => 'required'

		]);

		$events = Event::find($id);

		$events->title = $request->title;
		$events->color = $request->color;
		$events->start_date = $request->start_date;
		$events->end_date = $request->end_date;

		$events->save();

		return redirect()
		->route('events.index')
		->with('success','Agenda Kegiatan Berhasil Diubah!');
	}

	public function destroy($id)
	{
		Event::destroy($id);

        return redirect(route('events.index'))
        ->with('success', 'Data Berhasil Dihapus!');
	}

    public function calendar()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date .' +1 day'),
                    null,
                 [
                     'color' => $value->color,
                     'url' => route('events.show', $value->id)
                 ]
                );
            }

        }
        $calendar = Calendar::addEvents($events);
        return view('adminwebskp.events.fullcalendar', compact('calendar'));
    }
}
