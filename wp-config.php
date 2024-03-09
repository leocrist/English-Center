<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'english_center' );

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
define( 'AUTH_KEY',         'acC7*QEeXL,O9@N#up:HUKVf+%:&( `K6WLWO5*(F:I~ZoIRD6:t<W_IFu t9a3B' );
define( 'SECURE_AUTH_KEY',  '457I$)`[=VVn)_07P3+^Cl4r EAfS+CW+[4|26Biq}>twGl{*Y>EA0xXZ[^):^l@' );
define( 'LOGGED_IN_KEY',    ']^q7z{ h<Er]dObXeO~[PuG&Wv>Yjdqpi/71jcqt<bCY_iLj&S+AlO9pcI6^`)..' );
define( 'NONCE_KEY',        '8T}M2,[.f0c;saO`^>xh=.F%m;.-q`Lg[ w$leQG($21pMzv..Su:&l#5WnNxRd$' );
define( 'AUTH_SALT',        'W`~PlL?DhXZE3nC{gb{|U`K2h,4s{~o2GLwQ$)j&]I0*}EZ/Xv,e-];<CT72P<?e' );
define( 'SECURE_AUTH_SALT', 'gR946v,[#bjJB9iFMc&%q?nu%iTlSv4FpBF,^(.mg1zbe!z;:;k6p5[W)ks<)Sel' );
define( 'LOGGED_IN_SALT',   'Sy@OMa>Ii|8P]9`f+s`PWD767|J/jkn#xy,10J(= hMyU.Z@|F}$D1qs.}{rG/@=' );
define( 'NONCE_SALT',       'FJ%!`Wmsb7zOlcs$.V{ijYZd#LPq7&</%2hx8}UBLm!c_m(9G#L>M!^6wdn5[rR9' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
define('FS_METHOD','direct');
define( 'UPLOADS', 'wp-content/uploads' );
/** Sets up WordPress vars and included files. */
require_once (ABSPATH . 'wp-settings.php');