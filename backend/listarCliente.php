<?php
require 'conexao.php';

// Buscar todos os clientes
$sql = "SELECT * FROM clientes ORDER BY id_clientes ASC"; // ou DESC se quiser do mais recente
$result = mysqli_query($conexao, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_clientes'] . "</td>";
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['telefone']) . "</td>";
        echo "<td>" . htmlspecialchars($row['endereco']) . "</td>";
        echo "<td> 
                <button class='btn btn-sm btn-primary editarBtn' 
                    data-bs-toggle='modal' 
                    data-bs-target='#editarModal'
                    data-id='" . $row['id_clientes'] . "' id='123'>
                        Editar
                        </button>
                        <button class='btn btn-sm btn-danger excluirBtn'data-id='" . $row['id_clientes'] . "'>Excluir</button>
                    </td>";
        echo "</tr>";

    }
} else {
    echo "<tr><td colspan='6'>Nenhum cliente cadastrado.</td></tr>";
}

// Fechar conexão
mysqli_close($conexao);
?>