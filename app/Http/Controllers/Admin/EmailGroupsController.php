<?php
namespace App\Http\Controllers\Admin;

use App\Models\EmailGroup;
use App\Models\EmailRecipient;
use DB;

class EmailGroupsController extends Controller
{

    protected $willcard = 'email-groups';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:email-groups', ['only' => ['index']]);
        $this->middleware('permission:create email-group', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit email-group', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy email-group', ['only' => ['destroy']]);
    }

    public function index()
    {
        $groups = EmailGroup::all();

        return view('admin.' . $this->willcard . '.index', compact('groups'));
    }

    public function create()
    {
        $group = null;
        $recipients = EmailRecipient::all();

        return view('admin.' . $this->willcard . '.create', [
            'model' => $group,
            'recipients' => $recipients
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'key' => 'required',
            'subject' => 'required'
        ]);

        try {
            DB::transaction(function () use ($data) {
                $group = EmailGroup::create($data);
                $group->recipients()->sync(request('recipients'));
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(EmailGroup $emailGroup)
    {
        $recipients = EmailRecipient::all();

        return view('admin.' . $this->willcard . '.edit', [
            'model' => $emailGroup,
            'recipients' => $recipients
        ]);
    }

    public function update(EmailGroup $emailGroup)
    {
        $data = request()->validate([
            'key' => 'required',
            'subject' => 'required'
        ]);

        try {
            DB::transaction(function () use ($emailGroup, $data) {
                $emailGroup->update($data);
                $emailGroup->recipients()->sync(request('recipients'));
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(EmailGroup $emailGroup)
    {
        $emailGroup->delete();

        success(trans('admin.modules.' . $this->willcard . '.messages.success_destroy'));

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'url' => route('admin.' . $this->willcard . '.index')
            ]);
        } else {
            return redirect()->back();
        }
    }

}
