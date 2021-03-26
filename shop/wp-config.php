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
define('DB_NAME', 'lalanii_shop');

/** MySQL database username */
define('DB_USER', 'cwa_haseeb');

/** MySQL database password */
define('DB_PASSWORD', 'Haseeb123#');

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
define('AUTH_KEY',         'UZ2JbVwWw%l,e7Zr|=PuFVVW79GSgQ)!{%ZUO69`p1wkn:sm5X1alZ~$e/%-jRMm');
define('SECURE_AUTH_KEY',  'rG]}HT/M5A~JM3y)UAP{ET~H58*m54u*9!7: QHE-jC_WO(V%*DI&t1m3(xXYZ(M');
define('LOGGED_IN_KEY',    '`i*_bA&xk^)WhzV;Vx!<{~z[2C{gxC amXfNxytZ,1w^=+`A<OwkG]]x>{Kj5^?.');
define('NONCE_KEY',        'b,)QE_5lkF5@j=[Dauoq=~HytpOf P!d`@uS<Co7]BWrVT|7xkD`8mz!p1UY<G;`');
define('AUTH_SALT',        'u6TR1#S[qxjI*#0;KSx|CHLC,`577xR;@8Mwr?G_gX12h8uV8%@A$TjujzH.F|jc');
define('SECURE_AUTH_SALT', 'u |86.MH>^[qE2,L]`0WJ!{mxRCAd;?hE|%XihJCFZISa{<D{K9EXl5DO:i60JL+');
define('LOGGED_IN_SALT',   'Gi^tO^EDD^J5,brS&;ZGQZ*$,k?H?gap-[~AS8mis{i:D^[qO}V{Gg(|IqvMOb5]');
define('NONCE_SALT',       'm#MuZmQ#(nUXAM8kv3 ]0?a%,%SZ)a1Lq;ir]S$U5NcbbnlJl4/O2(`9Tf)w4;_G');

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
