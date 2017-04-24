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
define('DB_NAME', 'test_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         ' 37 NM5Na?w~b4k8 6SQd!F+/b{@SSz%rupk0m2b.IatfPg6e3gW]u,U=N9$1cl5');
define('SECURE_AUTH_KEY',  '`C0-;bvVy9<s W^DR6E&fn#.IbcsJ!8sb:}-X1318b4U&yu&`n?]ti12w. (XklA');
define('LOGGED_IN_KEY',    'bf:Sy$]9mcAF<3Ifr3q%$-cDCmricC6^uv}*7xS7qM1ZqP<vI}[(}hzfKKJ/8o.5');
define('NONCE_KEY',        'IB&k|{.,(sn?]>XX!1_.rJ;.%_}<sWgVYba^c[}B+Lr(ens.WKSe5Q>@-P_ d(xq');
define('AUTH_SALT',        '*U8 <f-1|7<<2kP&WZ^mKR=H8Nnuo.Rja{b5dgM~DFCiqH5,mkg:_6#]Y]%qU~p`');
define('SECURE_AUTH_SALT', '<.((6Gh<LKa(-xWE=@Tj[uO2^nE&8532:Y86v8<$(?wW$7M rQ98m2Q3e5-u%:1z');
define('LOGGED_IN_SALT',   'tvcd2IePWL+YIe*6qgGosaA%oTNxYAI~+anPy:T$L].qRzc])bY&]WYoLnBn&OXV');
define('NONCE_SALT',       '7tFC&*K#Por!#B6!J8VI`747`6z2ln2W_>-5,I)D,YF)MSD8Rn!BN2W2JY(,h*/B');

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
