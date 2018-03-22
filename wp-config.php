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
define('DB_NAME', 'lurnglie_wp384');

/** MySQL database username */
define('DB_USER', 'lurnglie_wp384');

/** MySQL database password */
define('DB_PASSWORD', 'i8[pS53!I5');

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
define('AUTH_KEY',         'dvnlolnwzsdjkjamrlkr2scdv2wvxxeym3ec0g5j57aszh2qjrsqq5nma1w98kg1');
define('SECURE_AUTH_KEY',  '3fpthy38tfyqmmcp1euzlsxpagvba23dk9i0kqhtcm194mgcwsktlgwn2s3zdbto');
define('LOGGED_IN_KEY',    'ul5nr0w8asapb8b4vu4tl2d7mi8ikihf0drvoj3uhswwsg3uv5rv5i5sf3lmox33');
define('NONCE_KEY',        'josba6yuufl4wbi29uxxw6rrssxd6pzecjnpdsain6cgqgdobmwku5cowulsqtgl');
define('AUTH_SALT',        'bghcy5kfu6lzezr114pdbz67u7nlis13r8dh91qau7xoqevnvgedzc5trx1guaug');
define('SECURE_AUTH_SALT', 'mh39sreh3xvd6zcycpyf0q6rkitqtlqhed56yoxljgszjbt3w0an8x4o2qhhasvi');
define('LOGGED_IN_SALT',   'njia5ud8rlqaar11faajelju24vzfltvr95ouf6ebhtzzgacjk4vi6rx1cihosy6');
define('NONCE_SALT',       'pv2i9kngwpf7erjaibln77srulcmxneapfddjlyfwvqf6pgp51zhwya4evhiw1vh');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpcv_';

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
