<?php
namespace App\Http\Controllers\Admin;

use App\Models\Activity;

class ActivitiesController extends Controller
{

    protected $willcard = 'activities';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:activities', ['only' => ['index']]);
        $this->middleware('permission:show activity', ['only' => ['show']]);
    }

    public function index()
    {
        $activities = Activity::latest()->get();

        return view('admin.' . $this->willcard . '.index', compact('activities'));
    }

    public function show(Activity $activity)
    {
        $subjects = [$activity->subject_type];
        if (strpos($activity->subject_type, 'Translation')) {
            $subjects[] = str_replace('Translation', '', $activity->subject_type);
        } else {
            $subjects[] = $activity->subject_type . 'Translation';
        }

        $activities = Activity::with(['causer'])
            ->where('subject_id', $activity->subject_id)
            ->whereIn('subject_type', $subjects)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.' . $this->willcard . '.show', compact('activities'));
    }
}
