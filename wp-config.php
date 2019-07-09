<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mastercash_web');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

/*define('DB_NAME', 'masterca_web');
define('DB_USER', 'masterca_admin');
define('DB_PASSWORD', 'vX^C?g_$JFpH');*/

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3kyvaxqvsccxo9g7cs5bmppi2eyj15akvgq08aneyhtgfanx2yi7lsplfdkt25g3');
define('SECURE_AUTH_KEY',  '1famrj5icizt8zlem0scyn5p5z2sodf53k63vmtfifbqhwxom8buxt4i7kuwww6x');
define('LOGGED_IN_KEY',    'raebbb70rhf3xoi2qoibsitpalkafvf4jr9qnnlgcz3jxwbw60csk0sf2bp03x1g');
define('NONCE_KEY',        'byo6mou75hzinz92ds3p2emrreptmjiawpcpzdswnnmzgbmlnlq6q3bsm03mctzy');
define('AUTH_SALT',        'anchoszdrlxdbrpihq27qwdmn2ikcyo4w8rsqhfwqolawypr7wydnvdmdt8fvpxa');
define('SECURE_AUTH_SALT', 'dzua27h0umfiv5xcmiprppirrd6yugugmijbjx9urtrbzfzxktyv4zv71m0ysy5p');
define('LOGGED_IN_SALT',   'gobkrnv9bo3wjzxeycz8dkmqdnou0qg9uyk0pkyriaegbcayunfbkjcs3efgi6hy');
define('NONCE_SALT',       'tkbqm5biwzczi7xkcmj0vggrg3fab2n2al6trc6alqp7tmgmvevtkavmadadst6w');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wppl_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
