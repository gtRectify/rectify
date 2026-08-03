# Rectify Custom Theme

A professional, modern WordPress theme built from scratch for the Rectify website.

## Features

- **Responsive Design**: Works perfectly on all devices (mobile, tablet, desktop)
- **Clean Code**: Well-organized, documented PHP and CSS
- **Customization Ready**: Easy to modify and extend
- **Widget Support**: Multiple widget areas (sidebar, footer)
- **Navigation Menus**: Two configurable menus (primary and footer)
- **Custom Logo**: Theme logo customization support
- **Post Thumbnails**: Featured image support for posts and pages
- **Comments**: Full comment functionality
- **Accessibility**: WCAG compliant HTML structure
- **SEO Friendly**: Proper semantic HTML markup
- **Mobile Optimized**: Touch-friendly interface

## File Structure

```
rectify-custom/
├── style.css                  # Main stylesheet
├── functions.php              # Theme setup and functionality
├── header.php                 # Header template
├── footer.php                 # Footer template
├── index.php                  # Main template (fallback)
├── single.php                 # Single post template
├── page.php                   # Page template
├── archive.php                # Archive template
├── search.php                 # Search results template
├── 404.php                    # Error page template
├── comments.php               # Comments template
├── template-parts/            # Template parts
│   ├── content.php            # Post/content template part
│   ├── content-page.php       # Page template part
│   └── content-none.php       # No content found template part
├── js/
│   └── main.js                # Main JavaScript file
└── languages/                 # Translation files
```

## Installation

1. Copy the `rectify-custom` folder to `/wp-content/themes/`
2. Go to WordPress Admin Dashboard
3. Navigate to Appearance → Themes
4. Find "Rectify Custom" and click "Activate"

## Configuration

### Setting Up Menus

1. Go to Appearance → Menus
2. Create a new menu (e.g., "Main Menu")
3. Add items to your menu
4. Under "Display location", select "Primary Menu"
5. Click Save

### Widget Areas

The theme includes the following widget areas:

- **Primary Sidebar**: Shown on blog, archives, and single posts
- **Footer Widget Area 1, 2, 3**: Shown in the footer

To add widgets:
1. Go to Appearance → Widgets
2. Drag widgets to your desired area

### Custom Logo

1. Go to Appearance → Customize
2. Click "Site Identity"
3. Upload your logo image
4. Set the logo height

## Customization

### Changing Colors

Edit `style.css` and modify the color values:
- Primary color: `#0073aa`
- Text color: `#333`
- Background: `#f9f9f9`

### Adding Custom Fonts

Add Google Fonts or custom fonts in `header.php` or `functions.php`:

```php
wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' );
```

### Modifying Templates

Edit the PHP template files in the root directory to customize the layout.

## Support

For questions or issues, refer to the WordPress Theme Handbook:
https://developer.wordpress.org/themes/

## License

This theme is released under the GPL v2 or later license.
