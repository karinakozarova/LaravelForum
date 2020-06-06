<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pagination = config('constants.categories.pagination');

        $categories = Category::with('children')->whereNull('parent_id');
        $allCategories = $categories->get();
        $categories = $categories->paginate($pagination);

        return view('categories.index')->with([
            'categories' => $categories,
            'allCategories' => $allCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
            'name' => 'required|min:3|max:255|string',
            'description' => 'required|min:3|max:255|string',
            'parent_id' => 'sometimes|nullable|numeric'
        ]);
        $validatedData['author_id'] = Auth::id();
        Category::create($validatedData);

        return redirect()->route('category.index')->withSuccess('You have successfully created a Category!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, Category $category)
    {
        if ($category->author_id != Auth::id()) {
            return redirect()->back();
        }

        $validatedData = $this->validate($request, [
            'name' => 'required|min:3|max:255|string',
            'description' => 'required|min:3|max:255|string'
        ]);

        $category->update($validatedData);

        return redirect()->route('category.index')->withSuccess('Category was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        if ($category->children) $category->children()->delete();
        $category->delete();

        return redirect()->route('category.index')->withSuccess('Category was deleted.');
    }
}
