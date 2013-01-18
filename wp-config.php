<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'pfanda_new_db');

/** MySQL database username */
define('DB_USER', 'cekelly');

/** MySQL database password */
define('DB_PASSWORD', 'pfaPrinceton');

/** MySQL hostname */
define('DB_HOST', 'mysql.pfanda.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'N:3IV+]LCAwA0F5Wr2YK~;,2r,V|3j87^IQV+9dbTj_+(YU?M<5y|ybv}lCGgU2(');
define('SECURE_AUTH_KEY',  ';/]W<q+jr/Sun(#.({r,t~WPqy|7Kz%9z]V UHfBY.2-=q+|:&-oL:v-z8S}8Ea$');
define('LOGGED_IN_KEY',    'u3D|dR*nw,?nS^kt-W{nLtlsIcm-I0t/!M];vMQ& nkx19?rTX+uBQ7m:l1jN<%c');
define('NONCE_KEY',        '7*Ulz RZFDvf3E~y*lPk/*^V(L##+9cZ>Es0D2tT#oWkkU7D9qjl06DcAA_yOb)~');
define('AUTH_SALT',        'XT3,>ev.Nj-}f~sABUpR38X_N+|}+X!XGZK[e#r|6&*o8>.M+Yms,~ohBz/7u&WZ');
define('SECURE_AUTH_SALT', '7a zPT8~*X5~#2Gl2eV;j??W,ayOYzDwAn%xgLA}^x@JXL!L)rl;y,wL*3?m]VlQ');
define('LOGGED_IN_SALT',   'lcsz?+46X;9DQcx*Buv[n^kSk4-R[&n<jc2bU$9w){xtyf#zv$,!.AI/BaK29UB]');
define('NONCE_SALT',       '@:5!(Z~I0(A??y[G2{Qa>3uMg9]U_aN+&dJSEvEg8)KUg+-=fW5y/dRSsZ[Rtmev');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);


define('WP_SITEURL', 'http://pfanda.com/');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
