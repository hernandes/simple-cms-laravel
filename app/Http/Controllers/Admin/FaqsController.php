<?php
namespace App\Http\Controllers\Admin;

use App\Models\Faq;

class FaqsController extends Controller
{

    protected $willcard = 'faqs';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:faqs', ['only' => ['index']]);
        $this->middleware('permission:create faq', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit faq', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy faq', ['only' => ['destroy']]);
        $this->middleware('permission:reorder faq', ['only' => ['reorder']]);
    }

    public function index()
    {
        $faqs = Faq::ordered()->get();

        return view('admin.' . $this->willcard . '.index', compact('faqs'));
    }

    public function create()
    {
        $faq = null;

        return view('admin.' . $this->willcard . '.create', [
            'model' => $faq
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'question' => 'required',
            'answer' => 'required',
            'active' => 'boolean'
        ]);

        try {
            Faq::create($data);

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Faq $faq)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $faq
        ]);
    }

    public function update(Faq $faq)
    {
        $data = request()->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $data['active'] = request()->has('active');

        try {
            $faq->update($data);

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

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

    public function reorder()
    {
        Faq::setNewOrder(array_values(request('order')));
    }

}
