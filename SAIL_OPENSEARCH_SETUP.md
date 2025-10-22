# Laravel Sail with OpenSearch - Local Setup Guide

This guide will help you launch the Laravel application locally using Docker with Laravel Sail and OpenSearch.

## Prerequisites

- Docker Desktop installed and running on your system
- Composer installed on your host machine
- Git installed

## What's Included

The Docker setup includes **only** the essential services:
- **Laravel Application** (PHP 8.3)
- **OpenSearch** (latest version) - for search and analytics capabilities

**Note**: No MySQL, Redis, Memcached, or other unnecessary services are included, as per your requirements.

## Environment Configuration

The `.env` file has been configured with the following OpenSearch settings:

```env
# OpenSearch Configuration
OPENSEARCH_HOST=opensearch
OPENSEARCH_PORT=9200
OPENSEARCH_SCHEME=http
OPENSEARCH_USER=
OPENSEARCH_PASSWORD=Admin@123
OPENSEARCH_INDEX_PREFIX="Laravel"

# Sail Configuration
WWWGROUP=1000
WWWUSER=1000
APP_PORT=80
VITE_PORT=5173
```

## Launch Instructions

### 1. Start Docker Containers

Navigate to the project root and run:

```bash
./vendor/bin/sail up
```

Or run in detached mode (background):

```bash
./vendor/bin/sail up -d
```

**First-time startup**: The first time you run this command, Docker will build the application image. This may take 5-10 minutes. Subsequent startups will be much faster.

### 2. Verify Services are Running

Check that both containers are running:

```bash
./vendor/bin/sail ps
```

You should see:
- `laravel.test` - Your Laravel application
- `opensearch` - OpenSearch service

### 3. Access the Application

- **Application**: http://localhost
- **OpenSearch**: http://localhost:9200
- **OpenSearch Dashboards**: Not included (only OpenSearch node)

### 4. Run Database Migrations

If needed, run migrations inside the Sail container:

```bash
./vendor/bin/sail artisan migrate
```

### 5. Install Frontend Dependencies (if needed)

```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

## Common Sail Commands

### Application Management
```bash
# Stop containers
./vendor/bin/sail down

# Stop containers and remove volumes (fresh start)
./vendor/bin/sail down -v

# View logs
./vendor/bin/sail logs

# View logs for specific service
./vendor/bin/sail logs opensearch
```

### Artisan Commands
```bash
# Run any artisan command
./vendor/bin/sail artisan <command>

# Examples:
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan tinker
./vendor/bin/sail artisan db:seed
```

### Composer Commands
```bash
./vendor/bin/sail composer <command>

# Example:
./vendor/bin/sail composer require some/package
```

### NPM Commands
```bash
./vendor/bin/sail npm <command>

# Examples:
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
./vendor/bin/sail npm run build
```

### Testing
```bash
./vendor/bin/sail test
./vendor/bin/sail artisan test
```

## OpenSearch Usage

### Verify OpenSearch is Running

```bash
curl http://localhost:9200
```

You should see JSON response with OpenSearch cluster information.

### Using OpenSearch in Your Application

The OpenSearch connection is configured in `config/database.php`. To use OpenSearch with Eloquent models:

1. **Create a Model that uses OpenSearch**:

```php
<?php

namespace App\Models;

use PDPhilip\OpenSearch\Eloquent\Model;

class SearchableProduct extends Model
{
    protected $connection = 'opensearch';
    protected $index = 'products'; // OpenSearch index name

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'stock',
    ];
}
```

2. **Use the Model**:

```php
// Create/Update
SearchableProduct::create([
    'name' => 'Test Product',
    'description' => 'Product description',
    'price' => 29.99,
    'category' => 'Electronics',
    'stock' => 100,
]);

// Search
$results = SearchableProduct::where('category', 'Electronics')
    ->where('price', '<=', 50)
    ->get();

// Full-text search
$results = SearchableProduct::search('laptop computer')->get();
```

3. **Index Existing Data**:

You can create a command to sync your existing SQLite data to OpenSearch:

```bash
./vendor/bin/sail artisan make:command SyncProductsToOpenSearch
```

## Troubleshooting

### Port Conflicts

If port 80 or 9200 is already in use, update the `.env` file:

```env
APP_PORT=8080
OPENSEARCH_PORT=9201
```

Then restart Sail:

```bash
./vendor/bin/sail down
./vendor/bin/sail up -d
```

### Permission Issues

If you encounter permission errors:

```bash
sudo chown -R $USER:$USER .
```

### OpenSearch Memory Issues

If OpenSearch fails to start with memory errors, you may need to increase Docker's memory limit:
1. Open Docker Desktop
2. Go to Settings → Resources
3. Increase Memory to at least 4GB
4. Apply & Restart

### Clear Everything and Start Fresh

```bash
./vendor/bin/sail down -v
docker system prune -a
./vendor/bin/sail up --build
```

## Shell Alias (Optional)

For convenience, add this to your `~/.bashrc` or `~/.zshrc`:

```bash
alias sail='./vendor/bin/sail'
```

Then you can use:

```bash
sail up
sail artisan migrate
sail composer require package/name
```

## Additional Resources

- [Laravel Sail Documentation](https://laravel.com/docs/11.x/sail)
- [PDPhilip Laravel OpenSearch Documentation](https://opensearch.pdphilip.com/)
- [OpenSearch Documentation](https://opensearch.org/docs/latest/)

## Development Workflow

1. Start Sail: `./vendor/bin/sail up -d`
2. Watch frontend assets: `./vendor/bin/sail npm run dev`
3. Code in your editor
4. Changes are automatically reflected (Laravel hot reload + Vite HMR)
5. Stop when done: `./vendor/bin/sail down`

## Notes

- The application uses **SQLite** for relational data (users, sessions, etc.)
- **OpenSearch** is available for search and analytics features
- All data persists in Docker volumes even after stopping containers
- To completely reset: `./vendor/bin/sail down -v` (removes volumes)
