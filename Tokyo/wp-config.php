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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tokyo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'oK,w4|UI-)?;H/K3jWqG:]j pamtdrxK+Utd>jc)~d&~GE1`Q;2v3EfrOfC@0A!R' );
define( 'SECURE_AUTH_KEY',  'Iw7:0kiQ%$1J/qm!4)sP`=[E/0waK,hfYL+pDm!-YZVf]ALht;+p<^~-+8o1yYUV' );
define( 'LOGGED_IN_KEY',    'Nu:rzs9;l$0*C#l}!Y0D.k_h+`ls7>hh&l9Z}s!e9>?Atdn]R]EtY-slFSuf9@Oi' );
define( 'NONCE_KEY',        '8R;N,e>PtTXt<pg87t?=O{Gdu3[m<~Q hvT|HG|3ZFB6%sA1HO;u!-v|Z7J==0Ph' );
define( 'AUTH_SALT',        '.W.YJt}r*2OBd9uw([ys5m<,9h;hf#LfCB|+Ij@~x@4tU3bTLLYAeXhd^1,XVx%P' );
define( 'SECURE_AUTH_SALT', 'BT*S|,LJtm+<ufAGaf}CU}izlbX`LCf#z{GHPm%NZOJ>gJ ars`2m4ZAX8r6{nLr' );
define( 'LOGGED_IN_SALT',   'w>1vVTK=mg>wZ=K:^5s+TM{qq(vc)r>HZa`gAov_nSfW@xb%|y,I7s<X8l=by$4/' );
define( 'NONCE_SALT',       'V :I(n4H/b^J`?lgKF1lFvKp>+j*;4<&.>OS|NAo>zH|o8q=Nd%Qo#o.JZ7vjm5J' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
