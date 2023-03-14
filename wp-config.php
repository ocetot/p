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
define( 'DB_NAME', 'p' );

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
define( 'AUTH_KEY',         't(u@gWy- A8K>*kYAXwnd2aJjj1@tNrfw$rrw.n7C@$5bpV->r@?@3FoCr|8~ht>' );
define( 'SECURE_AUTH_KEY',  'NS,oGMOb<Q|ZO#h Q(ygigp^xYUEU0aj%tj^^Fv*zlTht@OU2kl9G;c#ZB! _Fn ' );
define( 'LOGGED_IN_KEY',    '[qQ_/KXp[z&6].S&ykV]gt<MYB^P=lJAFVyD|uJIVx|()6BzSsn-6l!dv|%eN|9]' );
define( 'NONCE_KEY',        '_[!U/SL.zfTl:$(iOckHQs@kBh)+!:wfA#KcqCynB>W.VZQkFtc${`)5-hY$xRnz' );
define( 'AUTH_SALT',        'QcK$^dZM=ZT8silc&&`^fYYv*0dYQh}<LjgQM)|Do2QIN|0}e1xXD{|X.>-O,m6m' );
define( 'SECURE_AUTH_SALT', 'L(mI{na^%gt2fCJDo<kove5JfVLN,5@0ci(Nlu*gCi#&q0O;5E?Z;=YAidu;tlkC' );
define( 'LOGGED_IN_SALT',   'Q]m^Pj)yHN3s^^D;S|Z{-|PwKsI7CkmIUV#AnCT<yP.d,Q3G1},Z?0%zmU[M/dq3' );
define( 'NONCE_SALT',       '3&Qjn/==Djc@SY7a,Yf@9c7upt-ql^C*[_v 4%,] 2MubkBk`Kd*^s,AB>Wv(ME8' );

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
