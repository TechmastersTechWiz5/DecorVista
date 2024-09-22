<div class="form-check form-switch mb-1">
    <input onchange="updateStatusToggle(this)" type="checkbox"
        @checked($status == 1) value="{{ $id }}"
        class="form-check-input" name="status">
    <label class="form-check-label"></label>
</div>
