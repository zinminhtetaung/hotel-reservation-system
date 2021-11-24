@component('mail::message')

<h2>Booking Information(Confirmed)</h2>
      <p>Dear {{ $data['customer_name'] }} ,<br>
        Your reservation from {{ $data['check_in'] }}
        to {{ $data['check_out'] }} at Relax.com is confirmed.<br>

      For More Information,feel free to contact us
      tel: +959401245003

@component('mail::button', ['url' => 'http://localhost:8000'])
Vistit Our Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent