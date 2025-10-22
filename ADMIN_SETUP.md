# Admin User Setup

This application has two types of users:
- **Public Users**: Can view the public shop and browse products
- **Admin Users**: Can access the dashboard, manage products, and use the database manager

## Making a User an Admin

After registering a user account, you need to manually set them as an admin. Here are several ways to do this:

### Method 1: Using Tinker (Recommended)

```bash
php artisan tinker
```

Then run:
```php
$user = App\Models\User::where('email', 'your-email@example.com')->first();
$user->is_admin = true;
$user->save();
```

### Method 2: Using Database Query

**For SQLite:**
```bash
sqlite3 database/database.sqlite "UPDATE users SET is_admin = 1 WHERE email = 'your-email@example.com';"
```

**For MySQL:**
```sql
UPDATE users SET is_admin = 1 WHERE email = 'your-email@example.com';
```

### Method 3: Make First User Admin Automatically

Add this to your `database/seeders/DatabaseSeeder.php`:

```php
public function run(): void
{
    // Make the first user an admin
    $firstUser = \App\Models\User::first();
    if ($firstUser) {
        $firstUser->is_admin = true;
        $firstUser->save();
    }
}
```

Then run:
```bash
php artisan db:seed
```

## Verifying Admin Status

Check if a user is an admin:

```bash
php artisan tinker
```

```php
App\Models\User::where('email', 'your-email@example.com')->first()->is_admin;
// Should return: true
```

## Access Levels

### Public Routes (No Authentication Required)
- `/` - Homepage
- `/shop` - Product catalog
- `/shop/{id}` - Product details

### Admin Routes (Requires Authentication + Admin Status)
- `/dashboard` - Admin dashboard
- `/products` - Product management
- `/database` - Database manager

### User Routes (Requires Authentication Only)
- `/profile` - Profile settings
