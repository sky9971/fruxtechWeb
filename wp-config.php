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
define( 'DB_NAME', 'frux' );

/** Database username */
define( 'DB_USER', 'frux1' );

/** Database password */
define( 'DB_PASSWORD', 'frux@123' );

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
define( 'AUTH_KEY',         'rWK,1*olX@(qa=iwV(wj.r{Xd!4[|JapXc,b4*5.hbpk)JjBbX8yGedy*jN0&ZE!' );
define( 'SECURE_AUTH_KEY',  '<fWx8r(JE?i[kh/H+/6ltpO33@5*C` >,w7IewjI}.#:=Vlc#X*(8^*:+p`B /9(' );
define( 'LOGGED_IN_KEY',    '(A*gt~2k@Dij9n(-t|Gm~0)2M-@mM_3A$,FSbxe%Ab(o$%t81yj!$hCDfu:*E1E]' );
define( 'NONCE_KEY',        '`Bmf(8zLHR6auGYr q.^zeN-QGAO5)[DAa1IB]&|cED9%0gJ!P^HTYc}~@hOz1/C' );
define( 'AUTH_SALT',        '$G]@*vM_}nH(:tB 7^Ep(XhtV-ZrId?J?-0EECiI!TeqQ ?ifw=R}K/sIrnaRuBu' );
define( 'SECURE_AUTH_SALT', '+$^bKiQ/}J>%%~p/)UD1HY6l!2Rp&Qvca& +q`~bW%V jJ<O?EhXosA*LD8cSy{V' );
define( 'LOGGED_IN_SALT',   'kW,-Yxg.QNmAW|`1^EP9$W?|lC.7g/Eb_AwLh(O$]Y[6iMs#RX5%o*LT!d3,20 (' );
define( 'NONCE_SALT',       '~44WBs^avIz2:l5,K:gxbVC{@ZGgYF@3$]SVZ$dvMK.,[7bDwF#|%2@VSXS :,@[' );

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
