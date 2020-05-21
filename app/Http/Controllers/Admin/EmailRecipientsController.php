<?php
namespace App\Http\Controllers\Admin;

use App\Models\EmailGroup;
use App\Models\EmailRecipient;
use DB;

class EmailRecipientsController extends Controller
{

    protected $willcard = 'email-recipients';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:email-recipients', ['only' => ['index']]);
        $this->middleware('permission:create email-recipient', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit email-recipient', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy email-recipient', ['only' => ['destroy']]);
    }

    public function index()
    {
        $recipients = EmailRecipient::all();

        return view('admin.' . $this->willcard . '.index', compact('recipients'));
    }

    public function create()
    {
        $recipient = null;
        $groups = EmailGroup::all();

        return view('admin.' . $this->willcard . '.create', [
            'model' => $recipient,
            'groups' => $groups
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        try {
            DB::transaction(function () use ($data) {
                $recipient = EmailRecipient::create($data);
                $recipient->groups()->sync(request('groups'));
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(EmailRecipient $emailRecipient)
    {
        $groups = EmailGroup::all();

        return view('admin.' . $this->willcard . '.edit', [
            'model' => $emailRecipient,
            'groups' => $groups
        ]);
    }

    public function update(EmailRecipient $emailRecipient)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        try {
            DB::transaction(function () use ($emailRecipient, $data) {
                $emailRecipient->update($data);
                $emailRecipient->groups()->sync(request('groups'));
            });

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(EmailRecipient $emailRecipient)
    {
        $emailRecipient->delete();

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
