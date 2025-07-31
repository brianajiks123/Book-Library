# Book Library

## Screenshots

![List Category](docs/list_category.png)
![List Book](docs/list_book.png)

## Features

- Add a new book
- Edit an existing book
- Delete a book
- View all books
- Search for a book by title, author, or publisher
- Filter books by category and publication date
- Add a new category
- Edit an existing category
- Delete a category
- View all categories

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/brianajiks123/Book-Library.git
    ```

2. Navigate to the project directory:

    ```bash
    cd Book-Library
    ```

3. Set up the environment variables:

    ```bash
    cp .env.example .env
    ```

    Note: You need to replace the placeholders in the `.env` file with your actual database credentials.

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Install dependencies:

    ```bash
    composer install
    npm install
    ```

6. Run the application:

    ```bash
    npm run dev
    php artisan serve
    ```

7. Access the application at <http://localhost:8000>

## Acknowledgments

- This project was built using [Laravel](https://laravel.com/) and [Tailwind CSS](https://tailwindcss.com/).

## License

This project is licensed under the [MIT License](LICENSE).
