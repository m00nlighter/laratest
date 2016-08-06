# Laravel test app
### Installation
```sh
php artisan migrate
php artisan db:seed --class=RolesAndPermissionsSeeder
```
RolesAndPermissionsSeeder
Create 4 default roles (client model manager admin)
Create permissions for admin users and roles
Create default user admin@admin.com 123456 and
attach admin role