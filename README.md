# Laravel Product Manager

A modern Laravel 11 application featuring authentication and a dynamic product management interface built with Livewire.

## Features

- **Authentication System**: Built with Laravel Breeze, including login, registration, password reset, and email verification
- **Dynamic Product Manager**: A fully reactive Livewire component with:
  - Real-time search across product names and descriptions
  - Category filtering
  - Price range filtering
  - Stock status filtering
  - Multi-field sorting (name, price, category, stock, date)
  - Grid and List view modes
  - Pagination
- **Responsive Design**: Built with Tailwind CSS for a modern, mobile-friendly interface
- **Sample Data**: Comes with 50 pre-seeded products across multiple categories

## Technologies Used

- **Laravel 11**: The latest version of the PHP framework
- **Laravel Breeze**: For authentication scaffolding
- **Livewire 3**: For reactive components without writing JavaScript
- **Tailwind CSS**: For modern, utility-first styling
- **SQLite**: Lightweight database (easily switchable to MySQL/PostgreSQL)

## Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite (or MySQL/PostgreSQL if preferred)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd test_claude
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   # Create SQLite database
   touch database/database.sqlite

   # Run migrations
   php artisan migrate

   # Seed with sample products
   php artisan db:seed --class=ProductSeeder
   ```

6. **Build assets**
   ```bash
   npm run build
   # Or for development with hot reload:
   npm run dev
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

8. **Access the application**
   - Open your browser and visit: `http://localhost:8000`
   - Register a new account or login
   - Navigate to the Products page to see the dynamic interface in action

## Usage

### Product Manager Features

Once logged in, navigate to the "Products" page to access the dynamic product manager:

- **Search**: Type in the search box to filter products by name or description (updates in real-time)
- **Category Filter**: Select a category from the dropdown to view products in that category
- **Price Range**: Set minimum and maximum prices to filter products
- **Stock Status**: Filter by in-stock or out-of-stock items
- **Sorting**: Choose any field to sort by and toggle between ascending/descending
- **View Modes**: Switch between grid view (cards) and list view (detailed rows)
- **Clear Filters**: Reset all filters with one click

All filtering and sorting happens instantly without page reloads, thanks to Livewire!

## Project Structure

```
app/
├── Livewire/
│   └── ProductManager.php          # Main Livewire component
├── Models/
│   ├── Product.php                 # Product model
│   └── User.php                    # User model
database/
├── factories/
│   └── ProductFactory.php          # Factory for generating products
├── migrations/
│   └── *_create_products_table.php # Products table schema
└── seeders/
    └── ProductSeeder.php           # Seeds sample products
resources/
├── views/
│   ├── livewire/
│   │   └── product-manager.blade.php  # Product manager view
│   ├── dashboard.blade.php            # Dashboard view
│   └── layouts/
│       └── navigation.blade.php       # Navigation menu
routes/
└── web.php                         # Application routes
```

## Database Schema

### Products Table

| Column      | Type       | Description                    |
|-------------|------------|--------------------------------|
| id          | bigint     | Primary key                    |
| name        | string     | Product name                   |
| description | text       | Product description (nullable) |
| price       | decimal    | Product price                  |
| category    | string     | Product category               |
| stock       | integer    | Available stock quantity       |
| is_active   | boolean    | Active status (default: true)  |
| created_at  | timestamp  | Creation timestamp             |
| updated_at  | timestamp  | Last update timestamp          |

## Customization

### Adding More Products

You can add more products by running the seeder again or creating them manually:

```bash
# Add 50 more products
php artisan db:seed --class=ProductSeeder

# Or create specific products using tinker
php artisan tinker
>>> \App\Models\Product::factory()->create(['name' => 'Custom Product', 'price' => 99.99]);
```

### Changing Categories

Categories are defined in the `ProductFactory`. To modify them, edit:
`database/factories/ProductFactory.php`

### Switching to MySQL/PostgreSQL

1. Update `.env` file with your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

2. Run migrations:
   ```bash
   php artisan migrate:fresh --seed
   ```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Credits

Built with Laravel, Livewire, and Tailwind CSS.
