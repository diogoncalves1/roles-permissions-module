function modalDelete(id) {
    modalAlert("Tem a certeza que quer apagar?", tryDelete, id);
}

function tryDelete(id) {
    var url = window.location.pathname + "/" + id;

    $.ajax({
        url: url,
        type: "DELETE",
        success: function (response) {
            console.log(response);
            successToast(response.message);
            $("#table").DataTable().ajax.reload();
        },
        error: function (error) {
            if (error.status == 403) {
                console.log(error.responseJSON);
                errorToast(error.responseJSON.message);
            } else errorToast("Erro na tentativa.");
        },
    });
}
