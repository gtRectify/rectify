<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rectify_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '}3((V*qS|-CSSx4YRX0H*MdbDe685sdket_K9F0w1%wAjH}Kc8b<A^gm!|B7(~@#' );
define( 'SECURE_AUTH_KEY',  'BG{]4CVu~h%gfBH]_gZuy<1N|tZ}K `8felt/VR_D9BU{HsMk@uEnQU7G/X(:!C,' );
define( 'LOGGED_IN_KEY',    '?bYFhqI{pPT3,8`N{Fo]04.9 @HvQAre12c41_2:k}D*yn9VFtHIFQW>aLt6KtY0' );
define( 'NONCE_KEY',        '|:-0Hsi7%;^k>i6Q)!Cro.{qw~vw$nZcXnI)oLc0s1ZHYw}U8cz7>dj@ZoWTKP+i' );
define( 'AUTH_SALT',        'zz~d+W9W;,Kd,Cq_h~A5L%h/W(c4hY#UXVj}0uGvy+nvf.&;fH(~,_s(^ky!yfZ<' );
define( 'SECURE_AUTH_SALT', '&Tz$gWBcPzMl#d6<A,{AO&/X!%?|y-i%AIX#%xG}y{C34mchWOj*p+*#`!pm>L9:' );
define( 'LOGGED_IN_SALT',   '+y)ipJ)lbI(vRCGigm^D!Q7<l[bi%v2>}E}QiP:.5?}nn6sT<o^fXxdu|D#Y,Sbo' );
define( 'NONCE_SALT',       '4WAq#j#VoHl!/ng=lPFg(W4am@@jX@<7HdNNwO._?B%Q!uYNJ*kH*:Cmz]Qo*XfM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'r3ct_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
