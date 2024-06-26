<?php

namespace App\Http\Controllers;

use App\Models\Testmonial;
use App\Http\Requests\StoreTestmonialRequest;
use App\Http\Requests\UpdateTestmonialRequest;
use Illuminate\Support\Facades\Storage;

class TestmonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testmonials = Testmonial::paginate(config('pagination.count'));

        return view('admin.testmonial.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testmonial.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestmonialRequest $request)
    {
        $validatedData = $request->validated();

        $newImageName = storeImage($request, 'testmonials');

        $validatedData['image'] = $newImageName;

        Testmonial::create($validatedData);

        return to_route('admin.testmonials.index')->with('success', __('keywords.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Testmonial $testmonial)
    {
        return view('admin.testmonial.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testmonial $testmonial)
    {
        return view('admin.testmonial.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestmonialRequest $request, Testmonial $testmonial)
    {
        $validatedData = $request->validated();

        // Update the image if a new image is uploaded
        $newImageName = updateImage($request, 'testmonials', $testmonial);

        // If there is a new image name, update the validated data array
        if ($newImageName) {
            $validatedData['image'] = $newImageName;
        }

        $testmonial->update($validatedData);

        return to_route('admin.testmonials.index')->with('success', __('keywords.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testmonial $testmonial)
    {
        Storage::delete("public/testmonials/$testmonial->image");

        $testmonial->delete();

        return to_route('admin.testmonials.index')->with('success', __('keywords.deleted_successfully'));
    }
}
