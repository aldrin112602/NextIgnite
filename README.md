# NextIgnite

NextIgnite is a light-weight PHP framework designed for building full-stack web applications. It aims to provide a simple and efficient structure to help you quickly develop robust web applications with ease.

## Features available or to be Implemented

- **MVC Architecture**: Clean separation of concerns with a Model-View-Controller architecture.
- **Routing**: Simple and flexible routing system.
- **ORM**: Built-in Object-Relational Mapping for database interactions.
- **Templating**: Easy-to-use templating engine.
- **Middleware**: Support for middleware to handle requests and responses.
- **Validation**: Comprehensive validation library.

## Installation

To install NextIgnite, you can use Composer:

```bash
composer require nextIgnite/nextIgnite
```

## Getting Started

1. **Create a new project directory:**

   ```bash
   mkdir my-nextIgnite-app
   cd my-nextIgnite-app
   ```

2. **Install NextIgnite using Composer:**

   ```bash
   composer require nextIgnite/nextIgnite
   ```

3. **Create a basic application structure:**

   ```bash
   ├── app
   │   ├── Controllers
   │   ├── Models
   │   ├── Views
   ├── public
   │   ├── index.php
   ├── routes
   │   ├── web.php
   ├── .env
   ├── composer.json
   └── README.md
   ...more
   ```

4. **Configure your application:**

   - Update the `.env` file with your environment settings.
   - Define your routes in `routes/web.php`.

5. **Start building your application:**

   - Create controllers in the `app/Controllers` directory.
   - Create models in the `app/Models` directory.
   - Create views in the `app/Views` directory.


## License

NextIgnite is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
