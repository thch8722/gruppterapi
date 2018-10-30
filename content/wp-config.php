<?php
/**
 * Baskonfiguration för WordPress.
 *
 * Denna fil innehåller följande konfigurationer: Inställningar för MySQL,
 * Tabellprefix, Säkerhetsnycklar, WordPress-språk, och ABSPATH.
 * Mer information på {@link http://codex.wordpress.org/Editing_wp-config.php 
 * Editing wp-config.php}. MySQL-uppgifter får du från ditt webbhotell.
 *
 * Denna fil används av wp-config.php-genereringsskript under installationen.
 * Du behöver inte använda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i värdena.
 *
 * @package WordPress
 */

// ** MySQL-inställningar - MySQL-uppgifter får du från ditt webbhotell ** //
/** Namnet på databasen du vill använda för WordPress */
define('DB_NAME', 'gruppterapi');

/** MySQL-databasens användarnamn */
define('DB_USER', 'gruppterapi');

/** MySQL-databasens lösenord */
define('DB_PASSWORD', 'iparetppurg');

/** MySQL-server */
define('DB_HOST', 'localhost');

/** Teckenkodning för tabellerna i databasen. */
define('DB_CHARSET', 'utf8');

/** Kollationeringstyp för databasen. Ändra inte om du är osäker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'T+s]@YhTJ0?v7ri#8(b+O;T,1O:RP+e8%D,&P:Eui*[2dE<z4s/}OQO>)078^N=~');
define('SECURE_AUTH_KEY',  '8W)J2faDg)?nqX6KZ_6%>RC1l;$n})~ge+<hVwf!v_Ck.v`j2(U>7xVi/{) >8i6');
define('LOGGED_IN_KEY',    'v=nw0ZYo,Ua;{Dz|=jzb6.#`]=;Nx>+jFFhq}4NJ?pg&3-s~&*Zq>3_C~?Mxr9a>');
define('NONCE_KEY',        ']UK4c#6^0A@KS+}shuF0Q>n,bZ-RAMtQ}dRMQ4`BnyU(p5a>u5Q|[3+-}1g*a`#o');
define('AUTH_SALT',        'y[^lf%9?02Pgbd-/cuHYq%e)L*#-XVr09G~:`$`+u9Z&#Z/4;=2lXFX|RT+.^z(U');
define('SECURE_AUTH_SALT', 'd~>tt`2 n/%:oJc{f#YNc :@{9@fDPma5[cNfs+uX#bp|+.{2T+3vcwws?c;:.qu');
define('LOGGED_IN_SALT',   '#@T##)1%UOu@b1:s*BK=)lcFdcM&^.o#G|h P=@COtzrC*^24|Z7Ln1b6Cn[Bi~*');
define('NONCE_SALT',       's--xu~T}k6ZnLz:4RWgm=7;NJhQ?Q|Ei}]e!+Z)iiWG=z<Jx~Ux-[G{~<IX]L9]k');

/**#@-*/

/**
 * Tabellprefix för WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokstäver och understreck!
 */
$table_prefix  = 'wp_';

/**
 * WordPress-språk, förinställt för svenska.
 *
 * Du kan ändra detta för att ändra språk för WordPress.  En motsvarande .mo-fil
 * för det valda språket måste finnas i wp-content/languages. Exempel, lägg till
 * sv_SE.mo i wp-content/languages och ange WPLANG till 'sv_SE' för att få sidan
 * på svenska.
 */
define('WPLANG', 'sv_SE');

/** 
 * För utvecklare: WordPress felsökningsläge. 
 * 
 * Ändra detta till true för att aktivera meddelanden under utveckling. 
 * Det är rekommderat att man som tilläggsskapare och temaskapare använder WP_DEBUG 
 * i sin utvecklingsmiljö. 
 */ 
define('WP_DEBUG', false);

/* Det var allt, sluta redigera här! Blogga på. */

/** Absoluta sökväg till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');
