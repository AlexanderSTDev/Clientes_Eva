<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Pedidos</h5>

                <div class="table-responsive">
                    <button type="button" onclick="cargaPedidos()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_pedido">
                        Nuevo Pedido
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombres</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Productos</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cantidad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_pedidos">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_pedido" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_pedidos">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Pedidos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="ID_pedido" id="ID_pedido">

                    <div class="form-group">
                        <label for="ID_cliente">Clientes</label>
                        <select name="ID_cliente" id="ID_cliente" class="form-control">
                            <option value="0">Seleccione a un cliente</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Producto">Nombre del producto</label>
                        <input type="text" required class="form-control" id="Producto" name="Producto" placeholder="Ingrese el nombre del producto">
                    </div>

                    <div class="form-group">
                        <label for="Cantidad">Cantidad</label>
                        <input type="text" required class="form-control" id="Cantidad" name="Cantidad" placeholder="Ingrese la cantidad">
                    </div>

                    <div class="form-group">
                        <label for="Fecha_pedido">Fecha</label>
                        <input type="text" required class="form-control" id="Fecha_pedido" name="Fecha_pedido" placeholder="Ingrese la fecha Ejemplo: 2023-12-01">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="pedidos.js"></script>