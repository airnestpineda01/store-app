# Shared Hosting Deployment Notes

This project is prepared for shared hosting environments such as DreamHost where Node.js build steps are not available.

## Recommended structure

1. Upload the Laravel project outside the public web root when possible.
2. Point the domain or subdomain document root to the project's `public/` directory.
3. If the host only allows `public_html`, place the contents of `public/` inside `public_html` and update `index.php` paths if needed.

## Before going live

1. Update `.env` with real MySQL credentials.
2. Set `APP_ENV=production`.
3. Set `APP_DEBUG=false`.
4. Run `php artisan config:cache`.
5. Run `php artisan route:cache`.
6. Run `php artisan view:cache`.

## Assets

No Node.js build is required.

- Tailwind CSS loads from CDN.
- Local CSS and JS are served directly from `public/css/app.css` and `public/js/app.js`.
