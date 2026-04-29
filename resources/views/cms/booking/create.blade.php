@extends('cms.parent')

@section('title','Create Booking')

@section('content')

<div class="container">

<form>

```
<label>Client</label>
<select id="client_id" class="form-control">
    @foreach($clients as $client)
        <option value="{{ $client->id }}">
            {{ $client->user?->first_name ?? 'No User' }}
        </option>
    @endforeach
</select>

<label>Hall</label>
<select id="hall_id" class="form-control">
    @foreach($halls as $hall)
        <option value="{{ $hall->id }}">{{ $hall->name }}</option>
    @endforeach
</select>

<label>Date</label>
<input type="date" id="booking_date" class="form-control">

<label>Start Time</label>
<input type="time" id="start_time" class="form-control">

<label>End Time</label>
<input type="time" id="end_time" class="form-control">

<button type="button" onclick="storeBooking()" class="btn btn-success mt-3">
    Save
</button>
```

</form>

</div>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
function storeBooking() {

    axios.post('/cms/booking', {
        client_id: document.getElementById('client_id').value,
        hall_id: document.getElementById('hall_id').value,
        booking_date: document.getElementById('booking_date').value,
        start_time: document.getElementById('start_time').value,
        end_time: document.getElementById('end_time').value,
    })
    .then(function (response) {
        alert('Booking saved successfully');
        window.location.href = '/cms/booking';
    })
    .catch(function (error) {
        console.log(error);
        alert('Error while saving booking');
    });

}
</script>

@endsection
