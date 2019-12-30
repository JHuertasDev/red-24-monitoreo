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
define( 'DB_NAME', 'red-24-monitoreo' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         '7<=}m_c)J/16@:F6<lk1Q3R2PG16KI<4@C4LyRHn*eo><:9A]^bW2044/2,q:r~o' );
define( 'SECURE_AUTH_KEY',  'Pz`&D) =B-50)M,`6:Gc8^o5WgCb<u!YL`b&#ty>7 {e_>hs8{J:Z)A0+EpWM{~>' );
define( 'LOGGED_IN_KEY',    '=d5G1]CDI^W:/O-6;>syxl#Dhm%)5LjYi4I>Gf!G<!6|-Yms`NLKS2S{U4{Ft9*7' );
define( 'NONCE_KEY',        'J*6.[0z=})9@r.Q6%DMYsL2yzD}[TAs|R aQ(9+n+K:K>=s0$13~3CtKe)|x/Fd0' );
define( 'AUTH_SALT',        '1_`js:VSB5 5~2ajX}C4=/LGa_=DB.Z^Po?=k{}Bqq[UxLz.I] 6I0~FVv/`sSZ}' );
define( 'SECURE_AUTH_SALT', 'S~nDL9%&3gZOC-DhHw*=Moe*{_PByBX;JoN}[4 x8VV[KQYD;V}STn^AFX@Ze*CH' );
define( 'LOGGED_IN_SALT',   '_v,^zE_VqpB=;!e!FVafXX06<QShgfilc2Z@OrLz/gA;}:dE)DN/YgTT~;< 2u%G' );
define( 'NONCE_SALT',       'MD#uu?]qWVT*9i7rJ2.L {R,?^QPOWd#b]6KgAT0txlc~@ f3j]J;:>sAh )slR~' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'redwp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
