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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'chillyourmind');

/** MySQL database username */
define('DB_USER', 'bon_ral');

/** MySQL database password */
define('DB_PASSWORD', 'dexter2898');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'v.66a~}4VgZ&F$6Pn%_KW,2%y5ZnjkhzRQ>b!QxW@;G-T6@_x;0N/_4kJD<7ESRL');
define('SECURE_AUTH_KEY',  '>a-O[S%Hk!h6OY{%zpM:?^OoBV=UabQ*X.dNFJBa;wa!B[K(3NEc|/KCDz#p~HEP');
define('LOGGED_IN_KEY',    '4d{[=Sg;^wE5oD*0oIlpp{&T!-9:L%f>tr1d}TfG,hNQoE?F;[T$*I,Di}#-)X}/');
define('NONCE_KEY',        'AwXO=6;Rf#.=YP_i= zi=cpdcExR^Gzgy<X#c~T=3z|4<.&#ZNCVK,)T>`T=Q&RO');
define('AUTH_SALT',        'lBg&c./]>HOolRy&M=K@2J-3Fp6bgv8d]Lf{|ojekRj#4D5&0eDE>7Qjn|O:bH5P');
define('SECURE_AUTH_SALT', ':kChgE`kGG4Fvio4:on>}0o]k}V!|]E(qt7(=C?1CvXhx|1Rm3>u* 74GSI#T2L{');
define('LOGGED_IN_SALT',   '9K@ !*<C!#m>/|rE)}R!M,d~&8;ES{H*])>CY4.lJ;$2/81yPf6&Cya+9jYvoRvd');
define('NONCE_SALT',       ',~nCI-4[Hc3/TsN`edee(*(z#U/mf?wx&bm#lbT2<:)SGe>gA]LrLhM#A<]I;7jn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
