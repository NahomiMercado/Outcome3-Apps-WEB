# Halcon - Evidence 3

This project is the continuation of Evidence 1 for the web application **Halcon**, a construction material distributor that needs a system to automate internal processes and provide public order tracking.

## Main objective
Develop the logical part of the application using Laravel and best programming practices.

## Features implemented

### Public module
- Home page with order tracking form
- Search by:
  - Customer Number
  - Invoice Number
- Display order status
- If the order is **Delivered**, show delivery evidence photo
- If the order is **In process**, show current status and date

### Protected module
- Authentication system with Laravel Breeze
- Dashboard with navigation links
- User management:
  - List active and inactive users
  - Create users
  - Edit users
  - Assign role/department
  - Change active/inactive status

### Orders module
- List all orders from latest to oldest
- Create orders
- Edit orders
- View order details
- Change order status
- Upload evidence photos:
  - Loaded photo
  - Delivered photo
- Logical delete of orders
- Archived orders list
- Restore archived orders

### Database and logic
- Models with relationships
- Migrations with primary and foreign keys
- Seeders for testing data
- Status history log for orders
- Role-based structure

## Main entities
- Role
- User
- Customer
- Order
- OrderPhoto
- OrderStatusHistory

## Technologies used
- Laravel
- PHP
- MySQL
- Blade
- Laravel Breeze
- Tailwind CSS

## Default admin user
- Email: admin@halcon.com
- Password: 0102030405060708

## Best programming practices applied
- MVC architecture
- Eloquent relationships
- Input validation
- Authentication middleware
- Logical deletion with SoftDeletes
- Organized controllers and views
- Seeders for test data
- Status change history
- Separation of public and protected modules

## Notes
This project follows the requirements defined in Evidence 1, including public tracking, role-based access, evidence upload, order life cycle, and logical deletion.

## Repository update
This repository was updated to include the logical implementation of the system required for Learning Outcome 2.
