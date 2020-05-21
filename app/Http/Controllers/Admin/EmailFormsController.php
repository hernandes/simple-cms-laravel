<?php
namespace App\Http\Controllers\Admin;

use App\Models\EmailForm;
use DB;
use Illuminate\Mail\Markdown;

class EmailFormsController extends Controller
{

    protected $willcard = 'email-forms';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:email-forms', ['only' => ['index']]);
        $this->middleware('permission:show email-form', ['only' => ['show']]);
    }

    public function index()
    {
        $forms = EmailForm::latest()->get();

        return view('admin.' . $this->willcard . '.index', compact('forms'));
    }

    public function show(EmailForm $emailForm)
    {
        $markdown = new Markdown(view(), config('mail.markdown'));
        $content = $markdown->render('mail.contact', $emailForm->data);

        return view('admin.' . $this->willcard . '.show', [
            'model' => $emailForm,
            'content' => $content
        ]);
    }
}
