$(document).ready(function () {
  $.ajax({
    url: "https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=5&concepto=0012",
    dataType: "JSON",
    type: "GET",
  
    success: function (response) {
      let roles = response.datosTabla;
      let tablita = $(".tablita tbody");
  
      roles.forEach((rol) => {

        let rolesWithoutEdit = ["administrador", "admision", "aranceles y cobranzas"];
        let shouldHideEditButton = rolesWithoutEdit.includes(rol.descripcion_concepto.toLowerCase());
  
        let fila = `
          <tr data-role-id="${rol.codigo_concepto}">
            <td>${rol.descripcion_concepto}</td>
            <td>
              <div class="btn-group">
                ${
                  shouldHideEditButton
                    ? '' 
                    : `<button class="btn btn-primary btn-sm mx-2" data-bs-toggle="modal" data-bs-target="#ModalEdit" data-role-id="${rol.codigo_concepto}">
                         <i class="bi bi-pen"></i>
                       </button>`
                }
              </div>
            </td>
          </tr>
        `;
        tablita.append(fila);
      });
  
      $(".btn-group button").on("click", function () {
        let roleId = $(this).data("role-id");
      });
    },
  
    error: function () {
      console.error("Error al obtener los datos");
    },
  });
  
  
    let cachedRoleViews = {}; 
    let allAvailableViews = [];

    function fetchAllViews() {
        return $.ajax({
            url: "https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=5&concepto=0011", // API route for fetching all available views
            dataType: "JSON",
            type: "GET",
            success: function (response) {
                allAvailableViews = response.datosTabla;
            },
            error: function () {
                console.error("Error al obtener todas las vistas disponibles");
            }
        });
    }

    function loadRoleViews(roleId) {
        if (cachedRoleViews[roleId]) {
            
            renderRoleViews(cachedRoleViews[roleId]);
        } else {
            showLoadingState();
            $.ajax({
                url: `https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=7&rol=${roleId}`, // API route for fetching views assigned to a role
                dataType: "JSON",
                type: "GET",
                success: function (response) {
                    let roleViews = response.datosTabla;

                    
                    cachedRoleViews[roleId] = roleViews;

                    renderRoleViews(roleViews);
                },
                error: function () {
                    console.error("Error al obtener las vistas asignadas al rol");
                    showErrorState();
                }
            });
        }
    }

    function renderRoleViews(roleViews) {
        const availableViews = $("#availableViews");
        const selectedViews = $("#selectedViews");

        availableViews.empty();
        selectedViews.empty();

        
        const assignedViewIds = new Set(roleViews.map(v => v.codigo_concepto));

        
        allAvailableViews.forEach((view) => {
            let listItem = `
                <li class="list-group-item" data-view-id="${view.codigo_concepto}">
                    ${view.descripcion_concepto}
                    <input class="form-check-input float-end" type="checkbox" aria-label="Select view">
                </li>
            `;

            if (assignedViewIds.has(view.codigo_concepto)) {
                selectedViews.append(listItem); 
            } else {
                availableViews.append(listItem); 
            }
        });
    }

    function showLoadingState() {
        $("#availableViews").html('<li class="list-group-item">Cargando vistas...</li>');
        $("#selectedViews").empty(); 
    }

    function showErrorState() {
        $("#availableViews").html('<li class="list-group-item">No se pudieron cargar las vistas. Intente nuevamente más tarde.</li>');
    }

    
    $("#moveToSelected").click(function () {
        $("#availableViews .list-group-item input:checked").each(function () {
            let listItem = $(this).closest(".list-group-item");
            $("#selectedViews").append(listItem);
            $(this).prop('checked', false);
        });
    });

    
    $("#moveToAvailable").click(function () {
        $("#selectedViews .list-group-item input:checked").each(function () {
            let listItem = $(this).closest(".list-group-item");
            $("#availableViews").append(listItem);
            $(this).prop('checked', false); 
        });
    });

    
    $(document).on("click", ".btn-group .btn-primary", function () {
        let roleId = $(this).data("role-id");
        loadRoleViews(roleId);
    });

    fetchAllViews().then(() => {
    });
      
});
