<div>
    {{-- tar pake if --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input single-checkbox" id="option1">
                        <label class="form-check-label" for="option1">Tatang acumalaka</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input single-checkbox" id="option1">
                        <label class="form-check-label" for="option1">Tatang acumalaka</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input single-checkbox" id="option1">
                        <label class="form-check-label" for="option1">Tatang acumalaka</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input single-checkbox" disabled id="option1">
                        <label class="form-check-label text-danger" for="option1"><del>Tatang acumalaka</del></label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input single-checkbox" id="option1">
                        <label class="form-check-label" for="option1">Tatang acumalaka</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.single-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    document.querySelectorAll('.single-checkbox').forEach(function(cb) {
                        if (cb !== checkbox) {
                            cb.checked = false;
                        }
                    });
                }
            });
        });
    </script>
</div>
