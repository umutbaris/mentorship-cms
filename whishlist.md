# CMS Project

This project is a web application that is used to create and manage products content.

## Applications

The project contains 3 applications:

  - Admin Panel: A user can manage products, categories, etc.
  - Frontend Layer: A visitor can show the products, categories, etc.
  - Service Layer: Represents the products data which are added by admin. Only avaiable from frontend layer. Works as RESTfull Service.

### Admin Panel

  - User Management Module
    - Login/Logout
    - Create/update/delete users
    - Set users role by admin: admin/editor
  - Product Module
    - Create/update/delete product
  - Category Module 
    - Create/update/delete category

### Frontend Layer

 - Homepage: Which includes categories and search input.
 - Category detail page: Which represents the products of selected category
 - Search page: User can search product. 
 - Product detail: Which are accessable from category detail page and search results page.

### Service Layer
 RESTfull principles must be considered during the service layer development. 
 - Get products: Gets all active products.
 - Get product: Gets only one product by the product id/slug.
 - Get categories: Gets all active categories. 
 - Get category: Gets only one category by the category id/slug.
 - Search products: Gets products by the search terms like title, etc.

### Objects 

 * Users
    * Id
    * Email
    * Password: Must be hashed.
    * Name
    * Surname
    * Status: active, passive, deleted, etc.
    * Created date
    * Updated date
 * Products
    * Id 
    * Title
    * Description
    * Price
    * Price currency: TL, Euro, Dollar
    * Color: Blue, red, green, yellow, etc.
    * Image: Original, thumbnail 1, thumbnail 2, etc.
    * Status: active, passive, deleted, etc.
    * Created date
    * Updated date
* Categories
    * Title
    * Status: active, passive, deleted, etc.
    * Created date
    * Updated date

This topic can be updated during the analysis and development.

### Tech

This applications uses a number of open source projects to work properly:

* [Symfony] - Symfony is a set of reusable PHP components
* [MySQL] - MySQL is a freely available open source Relational Database Management System (RDBMS) that uses Structured Query Language
* [Composer]: Composer is a tool for dependency management in PHP.
* [React] - A JavaScript library for building user interfaces
* [Twitter Bootstrap] - great UI boilerplate for modern web apps
* [Docker] - Docker is a computer program that performs operating-system-level virtualization also known as containerization.


   [Symfony]: <https://symfony.com/>
   [MySQL]: <https://www.mysql.com/>
   [Composer]: <https://getcomposer.org/>
   [React]: <https://reactjs.org/>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [Docker]: <https://www.docker.com/>
   
### Infrastructure
Each layer must have its own container.
* Admin container
* Frontend container
* Service container
* Nginx container
* Database container

