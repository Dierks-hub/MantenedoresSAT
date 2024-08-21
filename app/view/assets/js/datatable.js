new DataTable(".tablita", {
  layout: {
    topStart: "buttons",
  },
  dom: "Bfrtip",
  buttons: [
    {
      extend: "copy",
      className: "btn-primary",
      text: '<i class="bi bi-clipboard"></i>',
    },
  ],
  bottomEnd: {
    paging: {
      firstLast: false,
    },
  },
  ajax: "",
  searching: true,
  ordering: true,
  language: {
    url: "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json",
  },
});
