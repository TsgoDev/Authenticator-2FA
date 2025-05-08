$(document).ready(function () {
    // Função para exibir alertas de sucesso ou erro
    function showAlert(type, title, message) {
        Swal.fire({
            icon: type,
            title: title,
            text: message,
            confirmButtonText: 'Fechar'
        }).then(function () {
            location.reload(); // Recarrega a página após clicar no botão "Fechar"
        });
    }

    // Evento de submissão do formulário
    $('#tokenForm').submit(function (event) {
        event.preventDefault(); // Evita a submissão normal do formulário

        // Realiza a submissão do formulário usando AJAX
        $.ajax({
            type: 'POST',
            url: $(this).attr('/ConfigToken.php'), // URL de destino
            data: $(this).serialize(),
            dataType: 'json', // Garanta que o jQuery trate a resposta como JSON
            success: function (response) {
                console.log(response); // Para depuração, veja a resposta no console
                showAlert(response.type, response.title, response.message);
            },
            error: function () {
                showAlert('error', 'Erro', 'Ocorreu um problema ao processar sua solicitação.');
            }
        });
    });
});
