<?php
if (!is_user_logged_in() || !current_user_can('gm_group')) {
    echo '<p>No tienes permiso para acceder a esta página.</p>';
    return;
}

global $wpdb;
$current_user_id = get_current_user_id();
$group_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$wpdb->prefix}gm_groups WHERE user_id = %d", $current_user_id));

if (!$group_id) {
    echo '<p>No se encontró un grupo asociado al usuario actual.</p>';
    return;
}

// Obtener todas las disponibilidades creadas por el grupo musical junto con la información del contrato (si existe)
$availabilities = $wpdb->get_results($wpdb->prepare("
    SELECT a.*, c.contractor_name 
    FROM {$wpdb->prefix}gm_availabilities a 
    LEFT JOIN {$wpdb->prefix}gm_contracts c ON a.id = c.availability_id 
    WHERE a.group_id = %d
", $group_id));

if (empty($availabilities)) {
    echo '<p>No se encontraron disponibilidades para tu grupo musical.</p>';
    return;
}

$availabilities_json = json_encode($availabilities);
?>

<div id="musical-group-calendar" data-availabilities='<?php echo esc_attr($availabilities_json); ?>'>
    <div>
        <label for="availability-filter">Mostrar:</label>
        <select id="availability-filter">
            <option value="all">Todas</option>
            <option value="available">Disponibles</option>
            <option value="contracted">Contratadas</option>
        </select>
    </div>
    <div id="calendar-header">
        <span id="prev-month" role="button" tabindex="0">‹</span>
        <span id="calendar-month-year"></span>
        <span id="next-month" role="button" tabindex="0">›</span>
    </div>
    <div id="calendar-days">
        <span>Lu</span><span>Ma</span><span>Mi</span><span>Ju</span><span>Vi</span><span>Sa</span><span>Do</span>
    </div>
    <div id="calendar-dates"></div>
</div>

<div id="availability-popup" class="popup" role="dialog" aria-labelledby="popup-title" aria-hidden="true">
    <div class="popup-content">
        <span class="close-popup" role="button" tabindex="0">&times;</span>
        <div id="popup-content"></div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo esc_url(plugin_dir_url(__FILE__) . '../assets/css/calendar-musical-group.css'); ?>">
<script>
    var ajaxurl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';
    var availabilities = <?php echo $availabilities_json; ?>;
    var gm_availability_nonce = '<?php echo wp_create_nonce('gm_availability_action'); ?>'; // Agrega esta línea
</script>
<script src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../assets/js/calendar-musical-group.js'); ?>"></script>