<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;

class CalendarController extends Controller
{
    public function __invoke(Request $request, User $user)
    {
        $tasks = Task::query()
            ->withoutGlobalScope('check_owner')
            ->where('user_id', $user->id)
            ->whereNotNull('deadline')
            ->get();

        $events = [];
        foreach ($tasks as $task) {
            $events[] = Event::create($task->title)
                ->uniqueIdentifier($task->uuid)
                ->description($task->description ?? '')
                ->startsAt($task->deadline)
                ->fullDay();
        }

        return response(
            Calendar::create($user->calendar_name)
                ->event($events)
                ->refreshInterval(5)
                ->productIdentifier('norquensir/todo-for-outlawz')
                ->get()
        )->header('Content-Type', 'text/calendar');
    }
}
