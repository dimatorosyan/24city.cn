<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'brokpric_btz' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'brokpric_btz' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', ';3CF07a-xt' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'brokpric.mysql.tools' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'io~T,U}56_O/W]% 5{#?`rftkBI4Y2:I6A6@b+DMa{[ey>iqG>ap3UyuKWGz&@F1' );
define( 'SECURE_AUTH_KEY',  '7GRSKV&GI&@so>A5$h.53PG66dn(U+A;n[5uoG*gpT4l95!J0I&^[jO4zkl>}t4D' );
define( 'LOGGED_IN_KEY',    'ad~C]=4?{+|_f(yEiG}={R*@_~Up#9r9QUFNi!X.!(;4d <gB+*J4/<Ra{#U&Jtj' );
define( 'NONCE_KEY',        '_r$`}$krGALPh.SeGI3p#1tw[k*JRvrmZZ =q85t72AgR9:P+h>@g;Pf;/85pJNO' );
define( 'AUTH_SALT',        'x4xsB58Wy*#DA!?S0aQ^&^u/l$UB$_J6qk0>&%luAHZ3a=a-r_IJf<b8&h:@HtMH' );
define( 'SECURE_AUTH_SALT', 'kkD.fs6M,Aj/2#m<9Da<IcqxJ-5Lw]ya!Xnpl.,>:PsEm1Af|2L1fD)3}GUBO/K*' );
define( 'LOGGED_IN_SALT',   'j3z=/l@*LT#_{0;Taji_7s;s!}1&r0y1~}b.vLlEwRT,[TZyjVB*$9/01+Bplv7Y' );
define( 'NONCE_SALT',       'M:F|gAvc(U-O}iHXUhj;Th}j3acLL#ICK`/~=tOBX2xUN+3_|#jjg0qU:.S{Xx^*' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'btz2_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
