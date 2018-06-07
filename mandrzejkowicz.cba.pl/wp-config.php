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
define('DB_NAME', 'mandrzejkowicz');

/** MySQL database username */
define('DB_USER', 'mandrzejkowicz');

/** MySQL database password */
define('DB_PASSWORD', 'Maciek130');

/** MySQL hostname */
define('DB_HOST', 'mysql.cba.pl');

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
define('AUTH_KEY',         'J1}]=^Uj<Ix+Cx8hV}Sce1&qmW_IpYt+ON_c?IOq:kY)nnrbBM<vFVL$]@wd#lvg');
define('SECURE_AUTH_KEY',  'iqhE;+DIT9eaviMNL,U8=>3bP!C$DBp8k4r|j(zWkJM}7UnL6Sls/32Uc{<`Q+}0');
define('LOGGED_IN_KEY',    '{*!E%tS. e1cTJ:k_GO4;z5QazMR|EYb-$Ff7X(uCF$z281k?L*Kb~0&hFw:Y6N!');
define('NONCE_KEY',        'l[a{&QU>?PBD!m Wv(ogv_UKLDg<*7F$[MLqH6e[.&Vo~IST 5PB#eEl.2:ds_F&');
define('AUTH_SALT',        '#b12o5vsbf{ HHioe!F@gw k1V!Vv0<o)D/hsN8$Mj@+E5Y.]0j)ls&z>Ht[%8_4');
define('SECURE_AUTH_SALT', ')r?AY7{U{1d;)ft5_z+;6dRp#.[Jr])_]vrd5y{P=$H>cFf<x`xjZY1`!+z4b>V+');
define('LOGGED_IN_SALT',   '/DM.SWHp[5mH20bXXPL+,)|L0H5~SCm^IMtJ=-WH(y^1slE$}XWC$C$2T[XME fa');
define('NONCE_SALT',       ';iUFF~ec/jfe? }QN9<j~BGaD?OBl5g33:3i2Fg>y11Th$l&x%<1>i4A[p []L?6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

define('FS_METHOD', 'direct');
$GLOBALS['_wp_filesystem_direct_method'] = 'relaxed_ownership';


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
