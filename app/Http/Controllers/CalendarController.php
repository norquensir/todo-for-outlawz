<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;

class CalendarController extends Controller
{
    public function __invoke(Request $request, string $userUuid)
    {
        $user = User::findByUuid($userUuid);

        if (!$user) {
            abort(404);
        }

        $events = [];
        foreach (Task::query()->whereNotNull('deadline')->get() as $task) {
            $events[] = Event::create()
                ->uniqueIdentifier($task->uuid)
                ->name($task->title)
                ->description($task->description ?? '')
                ->startsAt($task->deadline->subHour())
                ->endsAt($task->deadline);
        }

        return response(
            Calendar::create()->name($user->calendar_name)->event($events)->refreshInterval(1)->withoutTimezone()->get()
        )->header('Content-Type', 'text/calendar; charset=utf-8');
    }
}
