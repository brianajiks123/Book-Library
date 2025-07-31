<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    StoreBookRequest,
    UpdateBookRequest
};
use App\Models\{
    Book,
    Category
};
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $query = Book::query()->with('category');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                    ->orWhere('author', 'like', "%$search%")
                    ->orWhere('publisher', 'like', "%$search%");
            });
        }

        if ($request->filled('publication_date')) {
            $query->whereDate('publication_date', $request->publication_date);
        }

        $books = $query->paginate(10);
        $categories = Category::all()->pluck('name', 'id');

        return view('books.index', compact('books', 'categories'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('books.create', compact('categories'));
    }

    // Store a newly created resource in storage.
    public function store(StoreBookRequest $request)
    {
        Book::create($request->validated());
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    // Display the specified resource.
    public function show(Book $book)
    {
        $book->load('category');
        return view('books.show', compact('book'));
    }

    // Show the form for editing the specified resource.
    public function edit(Book $book)
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('books.edit', compact('book', 'categories'));
    }

    // Update the specified resource in storage.
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
