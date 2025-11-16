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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '%XW#F>(rRZ7H2d;Nm(2T2thv,>BE@%C9YB{Sjk@xX}zICn93BoXzSmm-%mh|#i/X' );
define( 'SECURE_AUTH_KEY',   'HdU1A`ff))<#pCR/2MD-T,=)#^W)kx&vLdtOPp$E)/Xy$pQ>6.%Ng6uWL$eGy`G%' );
define( 'LOGGED_IN_KEY',     '(##R&j++U(DTcVHYIRNA_E+?$dKg3`~-Wc~<6_IE-7K:]:%kQ0Z-.!o4 AxivKL4' );
define( 'NONCE_KEY',         'XMCO+xGK`^Is~Bl}TBg8?~w`Xm]pQ|(gmoJ9G-S]f;Gel1a{d&*c%}^k$ltOT9IP' );
define( 'AUTH_SALT',         'p{?|;H)7YbAAC!5)p$^OjWZ?3z#+={!-.Stz(o1CP!)&sr9B2jyve2-g(SS]MohD' );
define( 'SECURE_AUTH_SALT',  'Fz_TsV1NeSq/0^$|60l-x)9r*]Ru&PC 0#dWI;rogz$c)~;!(I&jqvP+ ,2R]JO6' );
define( 'LOGGED_IN_SALT',    'ze4{J.wxy:E-xu.hx|Q[_1$ypMsX vB ]]&fBby.c?;hlr)[[!yk$R;r+wTdo?m.' );
define( 'NONCE_SALT',        '`N1=Y5Wpd<U_}-/6][X0j[GdC/LUUfK]{:J,zfvg3 j4odUz[XO:Pa)M&}}c~86*' );
define( 'WP_CACHE_KEY_SALT', ']Y7iKNa|gib8T)3wY1ijP9In[Zt|-k1VL,,n^/45k8aR.9xVZCC%>n{c!N#jrJ$+' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
