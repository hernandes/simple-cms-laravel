<?php
namespace App\Http\Controllers\Web;

use App\Mail\ContactMail;
use App\Models\EmailForm;
use App\Models\EmailGroup;
use App\Models\Page;
use Caffeinated\Flash\Facades\Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;
use Uploader;

class ContactController extends Controller
{

    public function index()
    {
        $page = Page::where('key', 'contact')->firstOrFail();
        $page->configSeo();

        return view('web.pages.contact', compact('page'));
    }

    public function send()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|cellphone_ddd',
            'message' => 'required'
        ];

        if (env('RECAPTCHA_SITE_KEY')) {
            $rules['g-recaptcha-response'] = 'required|recaptcha:contact';
        }

        request()->validate($rules);

        $group = EmailGroup::first();
        $attachements = [];

        if ($group->recipients->isEmpty()) {
            $this->message(trans('web.pages.contact.message_without_recipients'));
        } else {
            $data = request()->except(['g-recaptcha-response']);

            try {
                if (request()->has('file')) {
                    Uploader::uploadToPublic()->toFolder('attachements')->upload('file', function ($file) use (&$attachements) {
                        $attachements[] = $file;
                    });
                }

                DB::transaction(function () use ($group, $data, $attachements) {
                    EmailForm::create([
                        'name' => request('name'),
                        'email' => request('email'),
                        'ip' => request()->getClientIp(),
                        'data' => $data,
                        'email_group_id' => $group->id,
                        'attachments' => join("\n", $attachements)
                    ]);

                    Mail::send(new ContactMail($group, $data));
                });

                if (request()->ajax()) {
                    return response()->json([
                        'success' => true,
                        'message' => trans('web.pages.contact.message_success')
                    ]);
                }

                Flash::success(trans('web.pages.contact.message_success'));

                return redirect()->back()->withInput([]);
            } catch(\Exception $ex) {
                $this->message($ex->getMessage());
            }
        }

        return redirect()->back();
    }

    protected function message($message)
    {
        if (request()->ajax()) {
            response()->json([
                'success' => true,
                'message' => $message
            ]);
        }

        Flash::error($message);
    }
}
