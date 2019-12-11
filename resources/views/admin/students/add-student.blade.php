<select name="klass" id="klass">
    @foreach($klasses as $klass)
        <option value="{{ $klass->id }}">{{ $klass->name }}</option>
    @endforeach
</select>