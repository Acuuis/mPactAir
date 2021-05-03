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
define( 'DB_NAME', 'castle' );

/** MySQL database username */
define( 'DB_USER', 'mpactair' );

/** MySQL database password */
define( 'DB_PASSWORD', 'FuNHZLqv.@' );

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
define( 'AUTH_KEY',         'y.H|M{wUVeo={JU)v*d{p|QWg{bXzm(=?*ZWf {xK7t~]M_bEz=-%nGV]+PQb*q;' );
define( 'SECURE_AUTH_KEY',  '/KeXs[atGK>#7CZ75j9=LOP,.|{SPrV3D8S_|^(Y_{pN)UO8O;T6$HpbmEp_5577' );
define( 'LOGGED_IN_KEY',    '2xJtlx[KxOKg^w/Okmmkx~YiM47]NIHcWQ+t9W|JOSY{U}ZBGH#]u@[ys_)%D}%?' );
define( 'NONCE_KEY',        '[78||U.RqlG:`bE(%OY_%|[vn+^dN6LASi3%G*#qTe)DVU5x~dflaLbq#niY~5#M' );
define( 'AUTH_SALT',        'XY5+!3Tt&;^2M->qc&kAl|u8H4@GV4k?>Q%V(+cs`/=0#FM#|&`f`a<G.efI>J-{' );
define( 'SECURE_AUTH_SALT', '5=,Ku(O1JXv1y^OE?f]BZGySVUGS99mk3pu{ :}_+:lcPI#hPQ$O{ysVuxkYHz1 ' );
define( 'LOGGED_IN_SALT',   '6|I41}:#A1[j?kA3j-EWK5q+&TEYv6Y+/-gDOv}2V!2XY]VBX^e1(QRCS.J;eP!g' );
define( 'NONCE_SALT',       ')Arg/Z`yPnaCK!@H] +H*lZ{pYTnucHI-N3Gqz@m2Rqr~%fIq@2_dyjl%sKlp]Sl' );

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
define('FS_METHOD', 'direct');
