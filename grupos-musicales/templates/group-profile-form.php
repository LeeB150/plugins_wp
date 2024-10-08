<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_group_profile'])) {
    if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
        $uploaded_file = $_FILES['photo'];
        
        // Verifica si el archivo es una imagen
        $valid_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($uploaded_file['type'], $valid_types)) {
            // Obteniendo la extensión del archivo
            $file_extension = pathinfo($uploaded_file['name'], PATHINFO_EXTENSION);

            // Crear un nombre único usando el ID del grupo
            global $wpdb;
            $user_id = get_current_user_id();
            $group_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$wpdb->prefix}gm_groups WHERE user_id = %d", $user_id));

            // Verifica si el ID del grupo se obtuvo correctamente
            if (!$group_id) {
                echo '<div class="gm-error">No se pudo obtener el ID del grupo.</div>';
                return;
            }

            $new_filename = $group_id . '.' . $file_extension;

            // Establecer la ruta completa donde se guardará la imagen
            $upload_dir = plugin_dir_path(__FILE__) . '../assets/images/musical-groups-images/';
            $new_file_path = $upload_dir . $new_filename;

            // Verificar si la carpeta existe, si no, crearla
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Mover el archivo a la carpeta deseada
            if (move_uploaded_file($uploaded_file['tmp_name'], $new_file_path)) {
                // Guardar la URL en la base de datos
                $new_file_url = plugins_url('assets/images/musical-groups-images/' . $new_filename, __FILE__);

                $update_result = $wpdb->update(
                    "{$wpdb->prefix}gm_groups",
                    ['photo' => $new_file_url],
                    ['id' => $group_id]
                );

                if ($update_result !== false) {
                    echo '<div class="gm-success">Imagen subida y guardada exitosamente.</div>';
                } else {
                    echo '<div class="gm-error">Error al actualizar la base de datos.</div>';
                }
            } else {
                echo '<div class="gm-error">Error al mover el archivo.</div>';
            }
        } else {
            echo '<div class="gm-error">Tipo de archivo no permitido. Solo se permiten imágenes JPEG, PNG o GIF.</div>';
        }
    } else {
        echo '<div class="gm-error">Por favor, selecciona una imagen.</div>';
    }
}
?>



<form method="POST" action="" enctype="multipart/form-data" id="gm-group-profile-form">
    <?php wp_nonce_field('gm_group_profile_action', 'gm_group_profile_nonce'); ?>
    <div class="form-container">
        <div class="form-header">
            <i class="fas fa-music"></i>
        </div>
        <div class="form-group">
            <label for="name">Nombre artístico</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="region">Zona geográfica</label>
            <input type="text" name="region" id="region" required>
        </div>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" required>
        </div>
        <div class="form-group">
            <label for="photo">Fotografía</label>
            <input type="file" name="photo" id="photo" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="email">Email de contacto</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <input type="submit" name="submit_group_profile" value="Guardar">
        </div>
        <?php if (!empty($gm_errors)): ?>
            <div class="gm-error">
                <?php echo $gm_errors; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($gm_success)): ?>
            <div class="gm-success">
                <?php echo $gm_success; ?>
            </div>
        <?php endif; ?>
    </div>
</form>

<!-- Importar CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo esc_url(plugin_dir_url(__FILE__) . '../assets/css/group-profile-form.css'); ?>">

<!-- Importar JavaScript -->
<script src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../assets/js/group-profile-form.js'); ?>"></script>