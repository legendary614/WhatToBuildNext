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
define('DB_NAME', 'wpdb');

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
define('AUTH_KEY',         'fEp[-IV[~O~PC^4,Ps,h):E-jAHz+[b99q4&g(ebN3cok-NGU~l-#K&ToXtRmcQ0');
define('SECURE_AUTH_KEY',  '8=g<Ok^dX]vt<.Fftm*{;D|CB[H i67hE$=9L$7,!j+v@r *ttV]oE<OjHQM.NDW');
define('LOGGED_IN_KEY',    '%Kw^4eCcwunA+MAr;2:U_Lj*(=Oy:1&=[)(!kP~Q0GY-u!(&]Q]@A3~y2J-ttLtD');
define('NONCE_KEY',        '.bChM$0.a>JqUe7F)BCs@b(26[9J?R6v}KbsYUt.g}25okVMH)<vnK,naF#YVHZ&');
define('AUTH_SALT',        '-{884&&MncZ{q2[djx6YTKF<%f1YO cJSQ*.B|!zwqW_w45~EF87o_+XJM>RA~GP');
define('SECURE_AUTH_SALT', '%:GY0O$K5oH_OS<UMF|9lz762+#uF8P(D,sM,a%&8Lc;L^boW&r/<wh::l%@nRDY');
define('LOGGED_IN_SALT',   'sZv&P26uN-moqeS/XMoIG!OzvVSwRwY8Y4wdf_m`t2YjfS&g<#>=&o>,umd%zynS');
define('NONCE_SALT',       '#5wdpLyKT/T]v&@+@3?yNqr&4_%?ckK#g#(q%RYt{oq`xrI:A`$wy9ML 2Ox8NE]');

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

