<div class="form-group">
    <label for="name">Device Name:</label>
    <input type="text" class="form-control 
        @error('name') is-invalid @enderror" name="name" id="name" 
        value="{{ old('name', optional($device ?? null)->name) }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="description">Description:</label>
    <input type="text" class="form-control" name="description" id="description" 
        value="{{ old('description', optional($device ?? null)->description) }}"></textarea>
</div>
<br>
