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
define('DB_NAME', 'database_name_here');

/** MySQL database username */
define('DB_USER', 'username_here');

/** MySQL database password */
define('DB_PASSWORD', 'password_here');

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
define('AUTH_KEY',         '_$e)y[lia#%Hgf0GAQGUIWsea~V%|1dhbB=m!}d1wr+`?dE3BDiZjE}lB9G7g^ZC');
define('SECURE_AUTH_KEY',  ')3R<Q:sJr&pqI+h[$KXzP?hh+}Sn3Wiu%+6yJ/WBD!UQm6mVa_98=aU~ullbW ~O');
define('LOGGED_IN_KEY',    'x4X|+HykZ_F?hXq5i`8pXq9JclJAb}~)4P:$Qs`xcFADJ`K+{p![)SryBZI)do+W');
define('NONCE_KEY',        'e3OrCcY%G%[wH9A+hVc+Nq0MEHUk#j#+m$WA|Qs?0ThUSmwp|~|UScy<x60or!=)');
define('AUTH_SALT',        '94hF*{G4g5$D`mV74Enj/4_Q1#w3bk`S]ga?6g}-n|T=?&yVTp6)`|+M579d}Gm#');
define('SECURE_AUTH_SALT', 's$h/e[6v[6nsie#-X%>38=)Ag7g9fG(n?+EM!~-rP(n@GAYVs}$=.v3c]W{jN5}u');
define('LOGGED_IN_SALT',   'qof_9|I8--{~ /XD}E|#rPjT>tY ~sE5wNFB{&o%IiA20s[w{/;ERj+wvb-pASwy');
define('NONCE_SALT',       'vP1Ny^7*Inq8W<TmS(9/__mj]|mEk{M,>q-)oLu[YHfgq`)q;2!ci0qR+p(JF`A=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'guiaconstanza_';

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
define('WP_DEBUG', true);

/**
 * Site URLs to enable multiple developers from the same datbase
 * (change to your URLs)
 */
define('WP_HOME',    'http://localhost/guiaconstanza');
define('WP_SITEURL', 'http://localhost/guiaconstanza');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
