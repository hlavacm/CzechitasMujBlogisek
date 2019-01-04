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
define('DB_NAME', 'mujblogisek');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'I _biGoIYl_%5sQ]c.K;z0_oD78RWPRW@vm{ZFbuG`p]Mx Y#P`cM.@V&Y,4y6#M');
define('SECURE_AUTH_KEY',  '[fK&3;Y1`IJfIEP6zxuY]^9FNo,KIAv@/O 0y2L+w1J=i-va;+K:dD}:#33@`r;+');
define('LOGGED_IN_KEY',    'U9#j4O>:Ws86mXA<yh:!C=A4pZ7qO~TTG>z%GIbK9n;L4m]]{8P=RAm>7RU/K$O.');
define('NONCE_KEY',        'z=ZYJJ,vrAO.6-_z)$7wc?Dp5YjYMU,(aJYn*,uO?}?z-dl*4;S+Hp>v+T{ESr^}');
define('AUTH_SALT',        '+?CWH].&n/+?ju@:IqjVk4z4e$sG@, ,J5N<3OS:pbJ<IvTpX,jk#+38 v6POpe,');
define('SECURE_AUTH_SALT', 'WTX!P9]Q8Y)ykr6MJ-jl5ZC [/KimLfTpecGHK?3w-7f)xJaC0|]xk|M:Eh,Q!sH');
define('LOGGED_IN_SALT',   'bKLe3Ug|9rh?,d<zuyi~r~69I>hNw9*V@:z2oNNe5HTM:AJ31H0w[8LOi+<]u$uc');
define('NONCE_SALT',       'M==&<1@r~y8)gt@ccu<,XRKBji8|<U*7E3{mtNuv!DtRh`T#nbm&pCeKXZ[8J,ZO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cz_wp_';

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

define('AUTOSAVE_INTERVAL', 300); // seconds
define('WP_POST_REVISIONS', false);

define ('WPLANG', 'cs_CZ');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
