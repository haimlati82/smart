<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'smart');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'cud62p>a1}JU~y!Bu~}-bUb2bXLC;G VJeUMsfebLA|j{8R8@nt(m;M=i!?H3[.{');
define('SECURE_AUTH_KEY',  '</!3p7)MPLxW1#Y[l8~?#vfYYcJ@KKSrn|-A^~RTS,K9fMX{v~JrL7N^<oaLc ap');
define('LOGGED_IN_KEY',    '&Z0r10`?yxA+!qxpoZ]+f;q#y^Xxir-M1vD|w_c$8/(xb_BN#|k I-:5ydM3:>k4');
define('NONCE_KEY',        ';TQ`D?rofi}qnhMz~BJL<G;cucq~`x)~YxP~W-ET$VL F3mygNowek-piQ&$j:gs');
define('AUTH_SALT',        'NW;Szbd8i-XT3L+&*/M|5R:-D_WUM,4&!F#|2S=] S/x&D>-v}!G3rrt)5:d9;W1');
define('SECURE_AUTH_SALT', 'zJb[QZy >{Fa55uwEdu}O7EYjI1ay30gDd^cQ@n`ck7e&A3O2}|m@:?E7,g}=b!S');
define('LOGGED_IN_SALT',   'Ke.;?+8h+$O[2f(8>qA2a2QK-OUA^f.kyd>y+/ZF-iYe}$NX?lT}t2yG#f/f50+R');
define('NONCE_SALT',       'hg,Y+jBkI79.5k~w5*hQ{ZLx]+#1PvG#yJv#o(1b*DEs>1Z|z-B%MWmIwca-Y3e+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
