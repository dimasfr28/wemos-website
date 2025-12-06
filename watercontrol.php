<div class="row">
    <div class="col-8">
        <div class="numbers">
            <p class="text-sm mb-0 text-uppercase font-weight-bold">WATER CONTROL SYSTEM</p>
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 50px; height: 30px;" onchange="ubahstatus(this.checked)"
                        <?php if ($svalve == 1) {
                            echo "checked";
                        }?>
                    >
                    <label class="form-check-label" for="flexSwitchCheckDefault"> <?php if ($svalve == 1) {
                        echo '<span id="status">ON</span>';
                        }else {
                        echo '<span id="status">OFF</span>';
                        }
                    ?></label>
                </div>
            <p class="mb-0 text-success text-sm font-weight-bolder mt-2">Position In
                <span class="text-dark" id="clockvalve"></span> 
            </p>
        </div>
    </div>
    <div class="col-4 text-end">
        <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
            <i class="ni ni-button-power text-lg opacity-10" aria-hidden="true"></i>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>