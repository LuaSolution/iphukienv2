@foreach ($list_data as $data)
    <option value="{{ $data->id }}">{{ $data->name }}</option>
@endforeach