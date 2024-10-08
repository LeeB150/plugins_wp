<?php
/**
 * Copyright (C) 2014-2020 ServMask Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Kangaroos cannot jump here' );
}

// ==================
// = Plugin Version =
// ==================
define( 'AI1WMDE_VERSION', '3.85' );

// ===============
// = Plugin Name =
// ===============
define( 'AI1WMDE_PLUGIN_NAME', 'all-in-one-wp-migration-dropbox-extension' );

// ============
// = Lib Path =
// ============
define( 'AI1WMDE_LIB_PATH', AI1WMDE_PATH . DIRECTORY_SEPARATOR . 'lib' );

// ===================
// = Controller Path =
// ===================
define( 'AI1WMDE_CONTROLLER_PATH', AI1WMDE_LIB_PATH . DIRECTORY_SEPARATOR . 'controller' );

// ==============
// = Model Path =
// ==============
define( 'AI1WMDE_MODEL_PATH', AI1WMDE_LIB_PATH . DIRECTORY_SEPARATOR . 'model' );

// ===============
// = Export Path =
// ===============
define( 'AI1WMDE_EXPORT_PATH', AI1WMDE_MODEL_PATH . DIRECTORY_SEPARATOR . 'export' );

// ===============
// = Import Path =
// ===============
define( 'AI1WMDE_IMPORT_PATH', AI1WMDE_MODEL_PATH . DIRECTORY_SEPARATOR . 'import' );

// =============
// = View Path =
// =============
define( 'AI1WMDE_TEMPLATES_PATH', AI1WMDE_LIB_PATH . DIRECTORY_SEPARATOR . 'view' );

// ===============
// = Vendor Path =
// ===============
define( 'AI1WMDE_VENDOR_PATH', AI1WMDE_LIB_PATH . DIRECTORY_SEPARATOR . 'vendor' );

// ==================================
// = Redirect Create App Folder URL =
// ==================================
define( 'AI1WMDE_REDIRECT_CREATE_URL', 'https://redirect.wp-migration.com/v1/dropbox/create' );

// ===================================
// = Redirect Create Full Access URL =
// ===================================
define( 'AI1WMDE_REDIRECT_CREATE_FULL_URL', 'https://redirect.wp-migration.com/v1/dropbox-full/create' );

// ========================
// = Redirect Refresh URL =
// ========================
define( 'AI1WMDE_REDIRECT_REFRESH_URL', 'https://redirect.wp-migration.com/v1/dropbox/refresh' );

// ====================================
// = Redirect Refresh Full Access URL =
// ====================================
define( 'AI1WMDE_REDIRECT_REFRESH_FULL_URL', 'https://redirect.wp-migration.com/v1/dropbox-full/refresh' );

// ===========================
// = Default File Chunk Size =
// ===========================
define( 'AI1WMDE_DEFAULT_FILE_CHUNK_SIZE', 4 * 1024 * 1024 );

// ===============================
// = Minimal Base Plugin Version =
// ===============================
define( 'AI1WMDE_MIN_AI1WM_VERSION', '7.84' );

// ===============
// = Purchase ID =
// ===============
define( 'AI1WMDE_PURCHASE_ID', 'bb66c870-e9e1-458c-8c04-8c2cca8860e0' );
