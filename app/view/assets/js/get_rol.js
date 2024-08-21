$(document).ready(function () {
    ShowLoader();
    $('#miTabla').DataTable({
        "searching":false,
        "lengthChange": false,
        "language": {
            url: "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json",
        },
        "ajax": {
            "url": "https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=ver_subconcepto&concepto=0012",
            "type": "GET",
            "dataType": "JSON",
            "dataSrc": function (response) {
                return response.datosTabla;
            }
        },
        "columns": [
            { "data": "descripcion_concepto" }, 
            { 
                "data": null,
                "render": function (row) {
                    let rolesWithoutEdit = ["admision", "aranceles y cobranzas"];
                    let shouldHideEditButton = rolesWithoutEdit.includes(row.descripcion_concepto.toLowerCase());
                    
                    return shouldHideEditButton
                        ? ""
                        : `
                            <div class="btn-group ">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit" data-role-id="${row.codigo_concepto}">
                                    <i class="bi bi-pen"></i>
                                </button>
                            </div>
                        `;
                }
            }
        ],
        "drawCallback": function () {
            HideLoader();
        },
        "error": function () {
            console.error("Error al obtener los datos");
            HideLoader();
        }
        
    });
  
    let cachedRoleViews = {};
    let allAvailableViews = [];
  
    function fetchAllViews() {
        return $.ajax({
          url: "https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=ver_subconcepto&concepto=0011",
          type: "GET",
          success: function (response) {
            allAvailableViews = response.datosTabla;
            console.log(
              "Vistas disponibles (allAvailableViews):",
              allAvailableViews
            );
          },
          error: function () {
            console.error("Error al obtener todas las vistas disponibles");
          },
        });
      }
    
      function loadRoleViews(roleId) {
          ShowLoader(); 
          showLoadingState();
          $.ajax({
            url: `https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=vistasxrol&rol=${roleId}`, // API route for fetching views assigned to a role
            dataType: "JSON",
            type: "GET",
            success: function (response) {
                console.log("Respuesta del servidor para vistas del rol:", response);
    
                // Extraer el array de vistas asignadas al rol desde el objeto response
                let roleViews = response.datosTabla[roleId];
                if (!roleViews) {
                    console.error(`No se encontraron vistas para el rol con ID ${roleId}`);
                    showErrorState("No se encontraron vistas para este rol.");
                    HideLoader();
                    return;
                }
    
                // Validar que roleViews tenga el formato esperado
                if (Array.isArray(roleViews)) {
                    // Mapear para obtener los IDs correctos
                    roleViews = roleViews.map(v => ({
                        codigo_concepto: v.codvista, // Usamos codvista en lugar de codigo_concepto
                        descripcion_concepto: v.titulo_vista // Usamos titulo_vista en lugar de descripcion_concepto
                    }));
                }
                // Cachear las vistas del rol
                cachedRoleViews[roleId] = roleViews;
                renderRoleViews(roleViews);
                HideLoader();
            },
            error: function () {
                console.error("Error al obtener las vistas asignadas al rol");
                showErrorState("Error al obtener las vistas asignadas al rol.");
                HideLoader();
            },
          });
      }
    
      function renderRoleViews(roleViews) {
        const availableViews = $("#availableViews");
        const selectedViews = $("#selectedViews");
    
        availableViews.empty();
        selectedViews.empty();
    
        // Normalizar los IDs de las vistas asignadas al rol
        const assignedViewIds = new Set(
          roleViews.map((v) => String(v.codigo_concepto))
        );
    
        // Depurar los IDs asignados
        console.log("IDs de vistas asignadas al rol:", [...assignedViewIds]);
    
        // Recorrer todas las vistas disponibles
        allAvailableViews.forEach((view) => {
          const viewId = String(view.codigo_concepto);
    
          let listItem = `
                <li class="list-group-item" data-view-id="${viewId}">
                    ${view.descripcion_concepto}
                    <input class="form-check-input float-end" type="checkbox" aria-label="Select view">
                </li>
            `;
    
          // Verificar si la vista está asignada al rol
          if (assignedViewIds.has(viewId)) {
            selectedViews.append(listItem); // Vistas asignadas
          } else {
            availableViews.append(listItem); // Vistas no asignadas
          }
        });
        addItemClickHandlers();
      }
    
      // Agregar eventos de clic a los ítems de la lista
      function addItemClickHandlers() {
        $("#availableViews .list-group-item")
          .off("click")
          .on("click", function () {
            toggleItemSelection($(this));
          });
    
        $("#selectedViews .list-group-item")
          .off("click")
          .on("click", function () {
            toggleItemSelection($(this));
          });
      }
    
      // Alternar selección del ítem al hacer clic
      function toggleItemSelection(listItem) {
        const checkbox = listItem.find("input");
        checkbox.prop("checked", !checkbox.prop("checked"));
        listItem.toggleClass("selected"); // Añade o quita una clase para manejar el estilo de selección
      }
    
      // Mover ítems seleccionados a la lista de seleccionados
      function moveToSelected() {
        $("#availableViews .list-group-item.selected").each(function () {
          moveItemToSelected($(this));
        });
      }
    
      // Mover ítems seleccionados a la lista de disponibles
      function moveToAvailable() {
        $("#selectedViews .list-group-item.selected").each(function () {
          moveItemToAvailable($(this));
        });
      }
    
      // Función para mover un ítem a la lista de seleccionados
      function moveItemToSelected(listItem) {
        listItem.removeClass("selected");
        listItem.remove();
        $("#selectedViews").append(listItem);
        listItem.find("input").prop("checked", false);
        addItemClickHandlers(); // Re-agregar eventos
      }
    
      // Función para mover un ítem a la lista de disponibles
      function moveItemToAvailable(listItem) {
        listItem.removeClass("selected");
        listItem.remove();
        $("#availableViews").append(listItem);
        listItem.find("input").prop("checked", false);
        addItemClickHandlers(); // Re-agregar eventos
      }
    
      // Mostrar estado de carga
      function showLoadingState() {
        $("#availableViews").html(
          ' <div class="d-flex justify-content-center"> <div class="spinner-border text-center text-primary m-5" role="status"> <span class="visually-hidden">Loading...</span></div></div>'
        );
        $("#selectedViews").html(
          ' <div class="d-flex justify-content-center"> <div class="spinner-border text-center text-primary m-5" role="status"> <span class="visually-hidden">Loading...</span></div></div>'
        );
        ShowLoader();
      }
    
      // Mostrar estado de error
      function showErrorState() {
        $("#availableViews").html(
          '<li class="list-group-item">No se pudieron cargar las vistas. Intente nuevamente más tarde.</li>'
        );
        $("#selectedViews").html(
            '<li class="list-group-item">No se pudieron cargar las vistas. Intente nuevamente más tarde.</li>'
          );
        HideLoader();
      }
    
      // Manejar el clic en el botón de mover a seleccionadas
      $("#moveToSelected").click(function () {
        moveToSelected();
      });
    
      // Manejar el clic en el botón de mover a disponibles
      $("#moveToAvailable").click(function () {
        moveToAvailable();
      });
    
      // Cargar vistas al hacer clic en el botón de un rol específico
      $(document).on("click", ".btn-group .btn-primary", function () {
        let roleId = $(this).data("role-id");
        loadRoleViews(roleId);
      });
    
      // Cargar todas las vistas disponibles inicialmente
      fetchAllViews().then(() => {
        // Puedes iniciar alguna acción aquí si lo deseas
      });
  });