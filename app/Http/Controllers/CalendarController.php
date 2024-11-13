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

        $calendar = Calendar::create()->name($user->calendar_name);

        foreach (Task::query()->whereNotNull('deadline')->get() as $task) {
            $calendar->event(
                Event::create()
                    ->name($task->title)
                    ->description($task->description)
                    ->startsAt($task->created_at)
                    ->endsAt($task->deadline)
                    ->transparent()
            );
        }

        return $calendar->refreshInterval(5)->get();
    }
}
