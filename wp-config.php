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
define('DB_NAME', 'papernestpress');

/** MySQL database username */
define('DB_USER', 'papernestpress');

/** MySQL database password */
define('DB_PASSWORD', 'sunset77');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'x-ti0x:X9x,IJ5,=#>obJ5/^&5=fr)8]F{0H&VdB}X@a;gZIfda[f~`&bY~rxQ.0');
define('SECURE_AUTH_KEY',  '}}3N(Of;FhL*6wF~y4y,]R$Wlr5U.u_1mp6l8ohI2|HfAxO[SMl$Ig 2+}AvJsTY');
define('LOGGED_IN_KEY',    'L/rRuUGj=P6uMfvaPD?JT,.1mk(wR2zf@WmpHz]vti@E+j2s9#@JPzIR[aG83n]E');
define('NONCE_KEY',        'h-K[G3 Nr9T owVD3~57AFyZ%[pHF^*Wp iv8N#ADWO:Z}/plFm,])&{xn>=DmNv');
define('AUTH_SALT',        'uPPpYTzp]+4;[if`=d-D1I?;AqEE)a}s[Dvd+m^7s8s-*BwCpEj1{IEH;ac9C+%H');
define('SECURE_AUTH_SALT', '=Qrszq(==YcByCJ-jH=g@ze8 RgQz&j++kubMzz%$snSdV)}Qxs,(pbh|(^HE57z');
define('LOGGED_IN_SALT',   'pKbgb^U(3nY&nPtDcX`Q#u9%>?F~S|!|Al(Ku(1 ;5v7&-]4O9_<_^dcbJ#?yA6C');
define('NONCE_SALT',       's8wo.PGSCbhC};D] }Oabigud~oTv:f&`,S!G<ON9+3/3*_*OhV9W GP.Nmm+VG|');

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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
