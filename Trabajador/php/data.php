<?php
while ($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['ID_Perfil']}
                OR outgoing_msg_id = {$row['ID_Perfil']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result = "No hay mensajes disponibles";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if (isset($row2['outgoing_msg_id'])) {
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Tu: " : $you = "";
    } else {
        $you = "";
    }
  
$w=base64_encode($row["Foto"]);
    $output .= '<a href="chat.php?user_id=' . $row['ID_Perfil'] . '">
                    <div class="content">
                    <img src="data:image/*;base64,'.$w.'">
                    <div class="details">
                        <span>' . $row['Nombre1'] . " " . $row['Apellido1'] . '</span>
                        <p>' . $you . $msg . '</p>
                    </div>
                    </div>                </a>';
}
?>