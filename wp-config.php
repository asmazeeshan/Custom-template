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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'custom-template_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'qM{mp!(@;Qye Xr/2mv1+[E<&R&;-OT/=)#*7u-t>X>B(>L%&B)H$T[(DCQQ,4=&' );
define( 'SECURE_AUTH_KEY',  'hRACm#DvLbd?@KhJhvcvX?(&Y.3v0&/C7uZF?NjO5Q)1k:W8bCBVJxrJJi@G$?HK' );
define( 'LOGGED_IN_KEY',    'QnB+o9RI}4%.mW*aI{=HVeVO1bb!_d63BA`:Davig._%)Awq83h_|I|vj6@T5*|n' );
define( 'NONCE_KEY',        ' P&(P7m%vY?TYF{O3/`$r30)RmapRLaN2a)Gg`(^1%kGx8;lqe]|%Agz2Yl=|a4Y' );
define( 'AUTH_SALT',        'G|,GS3LZNuwxR:bXY+oT=JPG#c3zVd[?Oc?lc!!~.cn_qZ%[%dN,Az+U2t+q>fK>' );
define( 'SECURE_AUTH_SALT', '{WO[iI|J-55gD4I^jQ.z~^[`*+AN)6(2IN.c7`?X*Y2Nm44c2r;4?8|g<ZMZ{kF[' );
define( 'LOGGED_IN_SALT',   ';UKP6j4X(<aS5dOj&UVL08GrUkKx[9w[fX@WwQ1_Q@7(JZYk#02!0O|O[bD6w+1t' );
define( 'NONCE_SALT',       '@5T>5Q-eGYI{MXUKC<fguOx+j6=6Y:xZ$&OGC-jOaZ1&XWq?yZtzDQq1qk/1UtjE' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
