<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class ScheduleActivitiesController extends Controller
{
    public $appiontments = [
        [
            'model'      => '\\App\\Models\\Event',
            'date_field' => 'date',
            'field'      => 'title',
            'route'      => 'admin.events.show',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->appiontments as $source) {
            $appointments = Event::where('isRemove', 0)
                                ->get();              
            foreach ($appointments as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }
                $events[] = [
                    'title' => 'Title: '.$model->{$source['field']},
                    'start' => $crudFieldValue, 
                    'url'   => route($source['route'], $model->id),
                    'backgroundColor' => '#008C1F',
                    'borderColor'    => '#008C1F',
                ];
            }
        }
        

        return view('admin.schedule_activities', compact('events'));
    }
}
