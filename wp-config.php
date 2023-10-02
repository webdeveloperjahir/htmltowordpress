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
define( 'DB_NAME', 'triangle' );

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
define( 'AUTH_KEY',         '2c.-3YH}^om[sr]62y7NL1VmqK8gs[M{p9]utA[^#c/nxupGD&^Wpd(e7_[o2-`q' );
define( 'SECURE_AUTH_KEY',  'QC8sU }NPUGlJpjT@Z1]G#9KjFXt)XmEG`^e`D3e#bd<Kvk8V%Ri6=zc{m{M^/T<' );
define( 'LOGGED_IN_KEY',    'eF]Za+n#-o=.e>BG-9xR *AH}RmW_tPW._th1RkUKR%1c1//*)$FdY^#;jXR~z&)' );
define( 'NONCE_KEY',        '{I#&%N8U,w[2407hALYxRFbt>PP;k3&E$&?3)OO F.RqHl!&Josp`Pjau=C/TwYY' );
define( 'AUTH_SALT',        '8-&@Ap4VBba[!0v|9ZE@xF%(NF55h4kB@vPsERWXh+CbA*1U7[Z7,KTzw3:<0kEz' );
define( 'SECURE_AUTH_SALT', 'C*3,:zC(C>_.k&[W/Lg=!?n9jZ~_HY2{Tl8=43 {wTs3GDmy(Bc!=cq2 a:edq8v' );
define( 'LOGGED_IN_SALT',   'K~ &<Cs^Sk+|q CK5PEgkT?yjU<yBYReHp7h=X`@O`%AqE20s^Uff~;i@sNnNjaX' );
define( 'NONCE_SALT',       '$#RrO;Gk1/g*8t#ESuw0VHbV#~PfK$a&8}eNrS@rxR_`q}S4lipgvg=_KlD&?P2@' );

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
