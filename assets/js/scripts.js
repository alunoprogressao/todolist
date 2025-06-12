document.addEventListener("DOMContentLoaded", () => {
    const lista = document.getElementById("listaTarefas");
    const form = document.getElementById("formTarefa");

    function carregarTarefas() {
        fetch('tarefas.php')
            .then(res => res.json())
            .then(tarefas => {
                lista.innerHTML = "";
                tarefas.forEach(t => {
                    const li = document.createElement("li");
                    li.innerHTML = `
                        <input type="checkbox" ${t.concluida ? "checked" : ""} onchange="marcar(${t.id}, this.checked)">
                        <strong>${t.titulo}</strong> - ${t.data}
                        <button onclick="excluir(${t.id})">Excluir</button>
                    `;
                    lista.appendChild(li);
                });
            });
    }

    form.addEventListener("submit", e => {
        e.preventDefault();
        const dados = Object.fromEntries(new FormData(form));
        fetch('tarefas.php', {
            method: 'POST',
            body: JSON.stringify(dados),
            headers: { 'Content-Type': 'application/json' }
        }).then(() => {
            form.reset();
            carregarTarefas();
        });
    });

    window.marcar = function (id, concluida) {
        fetch(`tarefas.php?id=${id}`, {
            method: 'PATCH',
            body: JSON.stringify({ concluida }),
            headers: { 'Content-Type': 'application/json' }
        }).then(carregarTarefas);
    };

    window.excluir = function (id) {
        if (confirm("Excluir esta tarefa?")) {
            fetch(`tarefas.php?id=${id}`, { method: 'DELETE' }).then(carregarTarefas);
        }
    };

    carregarTarefas();
});