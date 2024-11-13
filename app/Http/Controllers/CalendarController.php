<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        $calendar = Calendar::create()->name($user->calendar_name);

        foreach (Task::query()->whereNotNull('deadline')->get() as $task) {
            $calendar->event(
                Event::create()
                    ->uniqueIdentifier($task->uuid)
                    ->name($task->title)
                    ->description($task->description ?? '')
                    ->startsAt($task->deadline->subHour())
                    ->endsAt($task->deadline)
            );
        }

        return $calendar->refreshInterval(1)->get();
    }
}
