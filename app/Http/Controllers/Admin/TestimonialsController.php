<?php
namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;

class TestimonialsController extends Controller
{

    protected $willcard = 'testimonials';

    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:testimonials', ['only' => ['index']]);
        $this->middleware('permission:create testimonial', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit testimonial', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy testimonial', ['only' => ['destroy']]);
    }

    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.' . $this->willcard . '.index', compact('testimonials'));
    }

    public function create()
    {
        $testimonial = null;

        return view('admin.' . $this->willcard . '.create', [
            'model' => $testimonial
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'body' => 'required',
            'active' => 'boolean'
        ]);

        try {
            Testimonial::create(request()->all());

            success(trans('admin.modules.' . $this->willcard . '.messages.success_create'));

            return redirect(route('admin.' . $this->willcard . '.index'));
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $testimonial
        ]);
    }

    public function update(Testimonial $testimonial)
    {
        request()->validate([
            'name' => 'required',
            'body' => 'required',
            'active' => 'boolean'
        ]);

        request()->merge([
            'active' => request()->has('active')
        ]);

        try {
            $testimonial->update(request()->all());

            success(trans('admin.modules.' . $this->willcard . '.messages.success_update'));

            return redirect()->back();
        } catch (\Exception $ex) {
            error($ex->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

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

    public function upload()
    {
        request()->validate([
            'image' => 'required|image|max:512'
        ]);

        return to_json(Testimonial::upload('testimonials'));
    }

}
