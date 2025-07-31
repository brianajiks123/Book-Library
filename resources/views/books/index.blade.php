@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="bg-white shadow overflow-auto sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex flex-col sm:flex-row justify-between items-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4 sm:mb-0">Books</h3>
            <a href="{{ route('books.create') }}"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Add
                Book</a>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
            <form method="GET" action="{{ route('books.index') }}" class="mb-6">
                <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 lg:grid-cols-3 sm:gap-x-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category_id" id="category_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">All Categories</option>
                            @foreach ($categories as $id => $name)
                                <option value="{{ $id }}" {{ request('category_id') == $id ? 'selected' : '' }}>
                                    {{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="publication_date" class="block text-sm font-medium text-gray-700">Publication
                            Date</label>
                        <input type="date" name="publication_date" id="publication_date"
                            value="{{ request('publication_date') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Filter</button>
                </div>
            </form>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sm:px-6">
                                Title</th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sm:px-6 hidden sm:table-cell">
                                Author</th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sm:px-6 hidden md:table-cell">
                                Category</th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sm:px-6 hidden lg:table-cell">
                                Publisher</th>
                            <th scope="col"
                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sm:px-6 hidden xl:table-cell">
                                Publication Date</th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider sm:px-6">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($books as $book)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6">
                                    <div class="font-medium">{{ $book->title }}</div>
                                    <div class="sm:hidden mt-1 text-gray-600">
                                        <div>{{ $book->author }}</div>
                                        <div>{{ $book->category->name }}</div>
                                        <div>{{ $book->publisher }}</div>
                                        <div>{{ $book->publication_date }}</div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 hidden sm:table-cell">
                                    {{ $book->author }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 hidden md:table-cell">
                                    {{ $book->category->name }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 hidden lg:table-cell">
                                    {{ $book->publisher }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 hidden xl:table-cell">
                                    {{ $book->publication_date }}</td>
                                <td
                                    class="px-4 py-4 text-sm font-medium sm:px-6 flex flex-col sm:flex-row justify-center gap-2">
                                    <a href="{{ route('books.show', $book) }}"
                                        class="text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="{{ route('books.edit', $book) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-sm text-gray-500 text-center sm:px-6">No books
                                    found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
