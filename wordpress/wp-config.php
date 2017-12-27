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
define('DB_NAME', 'Ruben_wordpress');

/** MySQL database username */
define('DB_USER', 'Rubenwordpress');

/** MySQL database password */
define('DB_PASSWORD', 'Zita20068187');

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
define('AUTH_KEY',         'y,CEH&|091nd#lUAAnZ>lq2b.J4>[Bo^Q^mf9I:dOo4F%gOul=UxbgSk9mb<dvHj');
define('SECURE_AUTH_KEY',  'YMzbCY1a +ojeoy_ul=8:kL,.QLO#yM0SB]`O;{B3%:0eOy((Q:hN.Q@eViJgdAc');
define('LOGGED_IN_KEY',    '1gP1GP#&9Jlmt56MudO);gqio^56.l:yNu6N.WE.LqM=Gi(;}z*|IlF1u?F$J_#l');
define('NONCE_KEY',        '.hq7`18U]UCc3Qp {C)1`f9&fO7b8UjYj~Qfr)/j9kSh[g}f^8#mL!6BI&3;kA(y');
define('AUTH_SALT',        '}<O+3?>-1[ZtLL)u`H.Nb]Kb^s2icl>(7zYRpc@(ca[0i]L&yi}) VQ)UAw!CTn=');
define('SECURE_AUTH_SALT', '~6eDzd^Zs)t`OuUF7ifU!s)3{f{-QSv&p+hQAe=]3>@~C+2<A`l{.=m]+_Lf`h(X');
define('LOGGED_IN_SALT',   'f#Ybm]U0m$)3^YFkmmBw*l!%TC?_#[`[N5T=2|5ZNI+>Cxu|2nupF7>U)HIH`#3s');
define('NONCE_SALT',       '40l6UbE=tihwNj230F!rMM%nuX3Ay[nGDfBnx7&M1f]A~UR0i3/dMN]PeIhg%}E;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
