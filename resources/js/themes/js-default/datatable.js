$('.c_table').dataTable({
    select: false,
    'language': {
        'lengthMenu': 'Exibindo _MENU_ registros por página',
        'zeroRecords': 'Nenhum registro encontrado',
        'info': 'Exibindo página _PAGE_ de _PAGES_',
        'infoEmpty': 'Nenhum registro disponível.',
        'infoFiltered': 'Filtrado de _MAX_ registros totais',
        'search': 'Pesquise',
        "paginate": {
            "first": "Primeira",
            "last": "Ultima",
            "next": "Próxima",
            "previous": "Anterior"
        },
    }
});