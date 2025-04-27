
<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "config.php";
    $outgoing_id = $_SESSION['id'];
    $incoming_id = mysqli_real_escape_string($conexion, $_SESSION['wid']);
    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN perfil ON perfil.ID_Perfil = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
    $query = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            } else {
                $w=base64_encode($row["Foto"]);
                $output .= '<div class="chat incoming">
                                <img src="data:image/*;base64,'.$w.'">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
    }
    echo $output;
} else {
    header("location: ../login.php");
}
