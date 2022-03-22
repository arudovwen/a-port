<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        return Testimonial::all();
    }

    public function store(Request $request)
    {

        $testimonial = new Testimonial();
        $testimonial->title = $request->title;
        $testimonial->text = $request->text;

        $testimonial->save();
        return $testimonial;
    }
    public function update(Testimonial $testimonial, Request $request)
    {

        if ($request->has('title') && $request->filled('title')) {
            $testimonial->title = $request->title;
        }
        if ($request->has('text') && $request->filled('text')) {
            $testimonial->text = $request->text;
        }


        $testimonial->save();
        return $testimonial;
    }


    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return response('ok');
    }
}
