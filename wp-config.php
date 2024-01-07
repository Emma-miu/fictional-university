<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fictional-uni' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'R;>iiyZ>Z;j#! IHjUd;^c0pB[qJ%n9<raK=D6nUpUwLcS@Tr~xM=i7BVHnxqb]|' );
define( 'SECURE_AUTH_KEY',  '=sOS7d^=N[$3>^fyaTEokjzNaNw!!Ha9X)CT6p(2~9zbelP[~J lSmDjF;+-sS=m' );
define( 'LOGGED_IN_KEY',    '+.Pp$-[U!~6nx<`gaup0;MUyF7WM7pYY3:}uXK`s/~0-2=(C6oS6N4Uy,b!Ham$;' );
define( 'NONCE_KEY',        'T|xv6bdR@cz;_.>vX$s3Xd*1jN 8W3g{#gsnNU|4[jT7@LPz@h aH5KTBbNn`;kW' );
define( 'AUTH_SALT',        'so/^G8C1E,,(~|q@<-{E_jL_h_k%Z}q7}r9k[8gZ*l%R-> *NNyBNBD^.mBh=EGz' );
define( 'SECURE_AUTH_SALT', ')d%sJJg=5v,`v/-cz)cJj/_@}W0Og-n5J~8cU~/XXV{{8R8?n^n5Z9dcP)&@j4iO' );
define( 'LOGGED_IN_SALT',   'm_dI[,SRnq)M3-`hO,kU4 PV2R-!R@j}T=85r$`ZcS6V]7OKG9[(m)1:L~U0S4{d' );
define( 'NONCE_SALT',       '`o9uVn3N(YBEt+5Xr90!CCiweL/T7>@Pb|MXFurX(v ^MtZavR#G?=F7`bf->~5 ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
