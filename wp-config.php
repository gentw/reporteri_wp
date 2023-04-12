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
define( 'WP_AUTO_UPDATE_CORE', false );
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'reporteri_webnew' );

/** Database username */
define( 'DB_USER', 'gent' );

/** Database password */
define( 'DB_PASSWORD', 'fr33d0m' );

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
define( 'AUTH_KEY',         'cEc:eXKf~XT ~`W^Ua-*hO+lt7f@W^+~Ft&)f>[wzK%+sll#l}@Ln-{n}&/jvtbI' );
define( 'SECURE_AUTH_KEY',  'XjNR0% 1v8hq9#Q_#Z5rFHg%/wh .KWKNUi2y%5I>YoXQs<0AF#f>$3%SLO$ok0u' );
define( 'LOGGED_IN_KEY',    '@.4 ~Oz10~L:T/Rg{pJ3U` EyJqLUo~=<*x/vrri=:_SW~14jgImJKL+RtFnm%+7' );
define( 'NONCE_KEY',        'oZE(*&a#Lu+Zz:tKbxO#)]j+qJq`VH7O[ Wf,1{r=~L1|Q@c0 4q*@]?]O>eE8_@' );
define( 'AUTH_SALT',        '|<=v~N#DpBl59#]2?e4Rj?V+;j:;RSU5eF1HF%VF6Mc[*kg{2$@ BfXdxBFXSDD@' );
define( 'SECURE_AUTH_SALT', 'vAo^9QAy@:dj<VfC6|!k}sO@VF?ZOl a]S.tBfQl8r%,?eRE{-j:J[Ix1`3m5k44' );
define( 'LOGGED_IN_SALT',   '7aUfG_(x/@u(HNj><|{GTBiPa}Crk8WxI:1fD0u_3pMXzB|%}^U&eFrGEFo9aXqw' );
define( 'NONCE_SALT',       'J1RT{3d*}rNrz#:|23dKUmb$npHPp(,k(sNLps#b^I`HM[CP>(_hn~M%24TG:Z<g' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'rep23orteri_';

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
