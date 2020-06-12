<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Threads;
use App\Category;
use Auth;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Image;
use File;

class ThreadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $threads = Threads::all();
        return view('threads.index')->withThreads($threads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('threads.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'title'         => 'required|min:3|max:255',
            'description'   => 'required|min:3',
            'category_id'   => 'required|numeric',
            'author_id' => 'required',
            'thumbnail' => 'image|nullable|max:1999',
        ]);

        // Handling File (Thumbnail) Upload
        if($request->hasFile('thumbnail'))
        {
            $image = $request->file('thumbnail');
            $filename = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if($request->has('thumbnail_manipulation')) {
                $watermark = Image::make(public_path('/images/watermark.png'))->fit(75);
                Image::make($image)->fit(400, 200)->blur(5)->greyscale()->insert($watermark, 'top-right')->save( public_path('/images/thumbnails/' . $filename));
            } else {
                Image::make($image)->fit(400, 200)->save( public_path('/images/thumbnails/' . $filename));
            }

            $validatedData['thumbnail'] = $filename;
        }

        Threads::create($validatedData);
        return redirect()->route('threads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Threads $thread
     * @return Response
     */
    public function show(Threads $thread)
    {
        return view('threads.show')->withThread($thread);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Threads $thread
     * @return Response
     */
    public function edit(Threads $thread)
    {
        if ($thread->author_id != Auth::id()) {
            return redirect()->back();
        }
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('threads.edit')->withThread($thread)->withCategories($categories);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Threads $thread
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, Threads $thread)
    {
        $validatedData = $this->validate($request, [
            'title'         => 'required|min:3|max:255',
            'description'   => 'required|min:3'
        ]);

        $thread->update($validatedData);

        return redirect()->route('threads.show', $thread);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $thread = Threads::find($id);
        $thread->delete();
        // Deleting file (thumbnail) from storage
        if ($thread->thumbnail !== null) {
            $file = public_path('/images/thumbnails/' . $thread->thumbnail);

            if (File::exists($file)) {
                //Deleting existing image file
                unlink($file);
            }
        }
        return redirect()->route('threads.index');
    }
}
