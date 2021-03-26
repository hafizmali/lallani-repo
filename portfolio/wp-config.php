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
define('DB_NAME', 'lalanii_portfolio');

/** MySQL database username */
define('DB_USER', 'dbmaster');

/** MySQL database password */
define('DB_PASSWORD', 'L@l@n11DB');

/** MySQL hostname */
define('DB_HOST', '107.180.10.147');

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
define('AUTH_KEY',         'R~:u)%)3y1{Ec>DpsW=}7lqzB>EIW$k<C<Y`>4xJ}e|SEil74e{`Q<~Url|`@<Om');
define('SECURE_AUTH_KEY',  'jwad}V73r:.urcKX@w b+pV<C64%@]6vYi(KhlQZwb>h^dldlv7HPDE._OclM1p2');
define('LOGGED_IN_KEY',    '[;$v8M]7X,IJfX-{}jYZxhd@n_~ RyJA2ncOdRO[dR_9DDiMH%j#|6M@o%TkR6a-');
define('NONCE_KEY',        'l(J%bT9*:l7S-Ks+IpjXe*uam8s= w4CtJL,KWoW?5=s +LfOb(RNQwh/%w^<2[5');
define('AUTH_SALT',        '7joiD6,XMFh7,SiTTy{[ys!_*SC?hQlAEf9X9{m7n`An<@p@M1`of SSA3Ux:qvU');
define('SECURE_AUTH_SALT', 'FuhO0j4YAV1[|h`gG5jJQ4LYRlX[#$MbV51JUjuh^cY65OPWVxlhUS!/qGud+28C');
define('LOGGED_IN_SALT',   'M6C;pJudNuTb4,A]Ai*loR,|/]Np`[yo$RjK=%;Jz<V:2(!;G(>gnMijV0,$+m`-');
define('NONCE_SALT',       'k@3NdvP2Os]4fh7%,j5s)9vn/z9G^x/Zsa,LotXNE6jpWQU>;C.8Aww.K6t#e^{/');

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
